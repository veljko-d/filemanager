<?php

namespace App\Services;

use App\Repositories\File\FileRepositoryInterface;
use App\Repositories\Folder\FolderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileService
 *
 * @package App\Services
 */
class FileService
{
    /**
     * @var FileRepositoryInterface
     */
    private $fileRepository;

    /**
     * @var FolderRepositoryInterface
     */
    private $folderRepository;

    /**
     * @var FolderService
     */
    private $folderService;

    /**
     * FileService constructor.
     *
     * @param FileRepositoryInterface   $fileRepository
     * @param FolderRepositoryInterface $folderRepository
     * @param FolderService             $folderService
     */
    public function __construct(
        FileRepositoryInterface $fileRepository,
        FolderRepositoryInterface $folderRepository,
        FolderService $folderService
    ) {
        $this->fileRepository = $fileRepository;
        $this->folderRepository = $folderRepository;
        $this->folderService = $folderService;
    }

    /**
     * @param array $data
     */
    public function store(array $data)
    {
        $folder = $this->folderRepository->show($data['folder_id']);
        $path = $folder->name;

        if ($folder->parent) {
            $path = $this->folderService->getFolderPath($folder->parent->id) . $path;
        }

        $path = Storage::putFile($path, $data['file_to_upload']);

        $file = [
            'name'      => pathinfo($path, PATHINFO_FILENAME),
            'ext'       => pathinfo($path, PATHINFO_EXTENSION),
            'size'      => Storage::size($path),
            'user_id'   => Auth::id(),
            'folder_id' => $folder->id,
        ];

        $this->fileRepository->create($file);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function download($id)
    {
        $file = $this->fileRepository->show($id);
        $folder = $this->folderRepository->show($file->folder_id);

        $path = $folder->name . '/' . $file->name . '.' . $file->ext;

        if ($folder->parent) {
            $path = $this->folderService->getFolderPath($folder->parent->id) . $path;
        }

        return Storage::download($path);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $file = $this->fileRepository->show($id);
        $folder = $this->folderRepository->show($file->folder_id);

        $path = $folder->name . '/' . $file->name . '.' . $file->ext;

        if ($folder->parent) {
            $path = $this->folderService->getFolderPath($folder->parent->id) . $path;
        }

        Storage::delete($path);

        $this->fileRepository->destroy($id);
    }
}
