<?php

namespace App\Http\Requests\Folder;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateFolderRequest
 *
 * @package App\Http\Requests\Folder
 */
class CreateFolderRequest extends FormRequest
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
            'folder_name' => 'required|min:1|max:50',
            //'parent_id'   => 'exists:folders,id',
        ];
    }
}
