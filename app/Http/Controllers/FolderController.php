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
        $folders = Folder::with(['files'])->noParent()->paginate(50);

        return view('folders.index', compact('folders'));
    }

    public function store(CreateFolderRequest $request)
    {
        $validation = $request->validated();

        if ($validation['parent_id']) {
            $parent = Folder::findOrFail($validation['parent_id']);
            $path = $parent->name . '/'. $validation['folder_name'];

            Storage::makeDirectory($path);
        } else {
            Storage::makeDirectory($validation['folder_name']);
        }

        $data = [
            'name'      => $validation['folder_name'],
            'user_id'   => Auth::id(),
            'parent_id' => $validation['parent_id'],
        ];

        Folder::create($data);

        return redirect()->back();
    }

    public function show($id)
    {
        $folder = Folder::findOrFail($id);
        //dd($folder->parent);

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

    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);

        if ($folder->parent) {
            $path = $folder->parent->name . '/' . $folder->name;
            Storage::deleteDirectory($path);
        } else {
            Storage::deleteDirectory($folder->name);
        }

        Folder::destroy($id);

        return redirect()->back();
    }
}
