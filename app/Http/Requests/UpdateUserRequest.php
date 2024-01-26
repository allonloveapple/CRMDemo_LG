<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:4',
                'required',
                'unique:users,name,' . request()->route('user')->id,
            ],
            'password' => [
                'nullable',
            ],
            'user_name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'nullable',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'status' => [
                'required',
                'in:' . implode(',', Arr::pluck(User::STATUS_RADIO, 'value')),
            ],
        ];
    }
}
