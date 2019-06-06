<?php

namespace App\Repositories\Folder;

use App\Models\Folder;

/**
 * Class FolderRepository
 *
 * @package App\Repositories\User
 */
class FolderRepository implements FolderRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Folder::noParent()->paginate(50);
    }

    /**
     * @param array $data
     *
     * @return mixed|void
     */
    public function store(array $data)
    {
        Folder::create($data);
    }

    /**
     * @param $id
     *
     * @return Folder|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function show($id)
    {
        return Folder::with(['parent', 'children', 'files'])
            ->where('folders.id', $id)
            ->firstOrFail();
    }

    /**
     * @param array $data
     * @param       $id
     *
     * @return mixed|void
     */
    public function update(array $data, $id)
    {
        Folder::where('id', $id)->update($data);
    }

    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function destroy($id)
    {
        Folder::destroy($id);
    }
}
