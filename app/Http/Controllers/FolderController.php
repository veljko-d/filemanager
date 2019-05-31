<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
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
        $folders = Folder::all();

        return view('folders.index', compact('folders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Storage::makeDirectory();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Storage::deleteDirectory();
    }
}
