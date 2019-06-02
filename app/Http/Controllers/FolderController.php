<?php

namespace App\Http\Controllers;

use App\Http\Requests\Folder\CreateFolderRequest;
use App\Http\Requests\Folder\UpdateFolderRequest;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class FolderController
 *
 * @package App\Http\Controllers
 */
class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::with(['files'])->paginate(10);

        return view('folders.index', compact('folders'));
    }

    public function store(CreateFolderRequest $request)
    {
        $validation = $request->validated();

        Storage::makeDirectory($validation['folder_name']);

        $data = [
            'name'      => $validation['folder_name'],
            'user_id'   => Auth::id(),
            'parent_id' => $validation['parent_id'],
        ];

        $folder = Folder::create($data);

        return redirect()->home();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateFolderRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);

        Storage::deleteDirectory($folder->name);

        Folder::destroy($id);

        return redirect()->home();
    }
}
