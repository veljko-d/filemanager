<?php

namespace App\Http\Controllers;

use App\Http\Requests\File\CreateFileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileController
 *
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    public function store(CreateFileRequest $request)
    {
        $validation = $request->validated();

        $path = Storage::putFile('Prvi', $validation['file_to_upload']);

        /*$data = [
            'name'    => $getFile->getClientOriginalName(),
            'ext'     => $getFile->getClientOriginalExtension(),
            'size'    => $getFile->getSize(),
            'user_id' => Auth::id()
        ];*/

        return redirect()->home();
    }

    public function show($id)
    {
        // ...

        return Storage::download('file.jpg');
    }


    public function destroy($id)
    {
        $file = File::findOrFail($id);

        Storage::delete($file->name);

        File::destroy($id);
    }
}
