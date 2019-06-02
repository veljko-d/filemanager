<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateFileRequest
 *
 * @package App\Http\Requests\File
 */
class CreateFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file_to_upload' => 'required|file|max:4096',
            //'folder_id'      => 'required|exists:folders,id',
        ];
    }
}
