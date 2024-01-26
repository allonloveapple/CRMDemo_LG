<?php

namespace App\Http\Requests;

use App\Models\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('permission_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'permission_name' => [
                'string',
                'nullable',
            ],
            'parent_id' => [
                'integer',
                'exists:permissions,id',
                'nullable',
            ],
        ];
    }
}
