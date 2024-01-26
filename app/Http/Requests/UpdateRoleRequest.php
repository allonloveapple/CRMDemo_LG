<?php

namespace App\Http\Requests;

use App\Models\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('role_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'permissions' => [
                'required',
                'array',
            ],
            'permissions.*.id' => [
                'integer',
                'exists:permissions,id',
            ],
            'customer_visible' => [
                'required',
                'in:' . implode(',', Arr::pluck(Role::CUSTOMER_VISIBLE_RADIO, 'value')),
            ],
            'customer_field_visible' => [
                'string',
                'nullable',
            ],
        ];
    }
}
