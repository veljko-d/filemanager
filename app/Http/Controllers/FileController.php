<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

/**
 * Class FileController
 *
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    public function store(Request $request)
    {
        $validation = $request->validate([
            'file'      => 'required|file|max:8192',
            'folder_id' => 'required|exists:folder,id',
        ]);

        $file      = $validation['photo'];
        $extension = $file->getClientOriginalExtension();

        $path      = $file->storeAs('photos', $filename);
    }

    public function destroy($id)
    {
        //
    }
}
