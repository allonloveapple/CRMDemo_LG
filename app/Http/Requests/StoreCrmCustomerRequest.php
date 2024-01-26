<?php

namespace App\Http\Requests;

use App\Models\CrmCustomer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreCrmCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_customer_create');
    }

    public function rules()
    {
        return [
            'platform' => [
                'string',
                'required',
            ],
            'platform_type' => [
                'required',
                'in:' . implode(',', Arr::pluck(CrmCustomer::PLATFORM_TYPE_SELECT, 'value')),
            ],
            'trade_account' => [
                'string',
                'required',
            ],
            'password' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'last_deposit_time' => [
                'date_format:' . config('project.datetime_format'),
                'required',
            ],
            'deposit_amount' => [
                'numeric',
                'required',
            ],
            'ib' => [
                'string',
                'required',
            ],
            'second_ib' => [
                'string',
                'required',
            ],
            'bonus' => [
                'string',
                'required',
            ],
            'rebate' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'mobile' => [
                'string',
                'required',
            ],
            'vps' => [
                'string',
                'required',
            ],
            'vps_account' => [
                'string',
                'required',
            ],
            'vps_password' => [
                'required',
            ],
            'comment' => [
                'string',
                'nullable',
            ],
        ];
    }
}
