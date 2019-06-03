<?php

namespace App\Http\Controllers;

use App\Http\Requests\Folder\CreateFolderRequest;
use App\Http\Requests\Folder\UpdateFolderRequest;
use App\Services\FolderService;

/**
 * Class FolderController
 *
 * @package App\Http\Controllers
 */
class FolderController extends Controller
{
    /**
     * @var FolderService
     */
    private $folderService;

    /**
     * FolderController constructor.
     *
     * @param FolderService $folderService
     */
    public function __construct(FolderService $folderService)
    {
        $this->folderService = $folderService;

        $this->middleware('auth')->only([
            'store',
            'edit',
            'update',
            'destroy'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $folders = $this->folderService->all();

        return view('folders.index', compact('folders'));
    }

    /**
     * @param CreateFolderRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateFolderRequest $request)
    {
        $this->folderService->create($request->validated());

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $folder = $this->folderService->find($id);

        return view('folders.show', compact('folder'));
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateFolderRequest $request, $id)
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
        $this->folderService->delete($id);

        return redirect()->back();
    }
}
