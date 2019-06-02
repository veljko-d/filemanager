<?php

namespace App\Http\Requests\Folder;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class UpdateFolderRequest
 *
 * @package App\Http\Requests
 */
class UpdateFolderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'          => 'required|exists:folders,id',
            'folder_name' => 'required|min:1|max:50',
            //'parent_id'   => 'exists:folders,id',
        ];
    }
}
