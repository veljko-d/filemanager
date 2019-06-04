<?php

namespace App\Services;

use App\Repositories\Folder\FolderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class FolderService
 *
 * @package App\Services
 */
class FolderService
{
    /**
     * @var FolderRepositoryInterface
     */
    private $folderRepository;

    /**
     * FolderService constructor.
     *
     * @param FolderRepositoryInterface $folderRepository
     */
    public function __construct(FolderRepositoryInterface $folderRepository)
    {
        $this->folderRepository = $folderRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->folderRepository->index();
    }

    /**
     * @param array $data
     */
    public function store(array $data)
    {
        $path = $data['folder_name'];

        if ($data['parent_id']) {
            $path = $this->getFolderPath($data['parent_id']) . $path;
        }

        Storage::makeDirectory($path);

        $folder = [
            'name'      => $data['folder_name'],
            'user_id'   => Auth::id(),
            'parent_id' => $data['parent_id'],
        ];

        $this->folderRepository->store($folder);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->folderRepository->show($id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $folder = $this->folderRepository->show($id);
        $path = $folder->name;

        if ($folder->parent) {
            $path = $this->getFolderPath($folder->parent->id) . $path;
        }

        Storage::deleteDirectory($path);

        $this->folderRepository->destroy($id);
    }

    /**
     * @param $id
     *
     * @return string
     */
    protected function getFolderPath($id)
    {
        $parent = $this->folderRepository->show($id);
        $path = $parent->name . '/';

        if ($parent->parent) {
            return $this->getFolderPath($parent->parent->id) . $path;
        }

        return $path;
    }
}
