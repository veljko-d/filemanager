<?php

namespace App\Http\Controllers;

use App\Http\Requests\File\CreateFileRequest;
use App\Services\FileService;

/**
 * Class FileController
 *
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    /**
     * @var FileService
     */
    private $fileService;

    /**
     * FileController constructor.
     *
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;

        $this->middleware('auth')->only([
            'store',
            'destroy'
        ]);
    }

    /**
     * @param CreateFileRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateFileRequest $request)
    {
        $this->fileService->store($request->validated());

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->fileService->destroy($id);

        return redirect()->back();
    }
}
