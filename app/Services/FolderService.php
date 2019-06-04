<?php

namespace App\Services;

use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class FolderService
 *
 * @package App\Services
 */
class FolderService
{
    public function all()
    {
        return Folder::with(['files'])->noParent()->paginate(50);
    }

    public function create(array $data)
    {
        if ($data['parent_id']) {
            $path = $this->getFolderPath($data['parent_id']) . $data['folder_name'];

            Storage::makeDirectory($path);
        } else {
            Storage::makeDirectory($data['folder_name']);
        }

        $folder = [
            'name'      => $data['folder_name'],
            'user_id'   => Auth::id(),
            'parent_id' => $data['parent_id'],
        ];

        Folder::create($folder);
    }

    public function find($id)
    {
        return Folder::findOrFail($id);
    }

    public function delete($id)
    {
        $folder = Folder::findOrFail($id);

        if ($folder->parent) {
            $path = $this->getFolderPath($folder->parent->id) . $folder->name;

            Storage::deleteDirectory($path);
        } else {
            Storage::deleteDirectory($folder->name);
        }

        Folder::destroy($id);
    }

    /**
     * @param $id
     *
     * @return string
     */
    protected function getFolderPath($id)
    {
        $parent = Folder::findOrFail($id);
        $path = $parent->name . '/';

        if ($parent->parent) {
            return $this->getFolderPath($parent->parent->id) . $path;
        } else {
            return $path;
        }
    }
}
