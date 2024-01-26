<?php

namespace App\Http\Requests;

use App\Models\CrmCustomer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateCrmCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_customer_edit');
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
                'nullable',
            ],
            'status_id' => [
                'integer',
                'exists:crm_statuses,id',
                'nullable',
            ],
            'a_b_stock' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(CrmCustomer::A_B_STOCK_SELECT, 'value')),
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
            'withdraw_account' => [
                'string',
                'nullable',
            ],
            'last_withdraw_time' => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'withdraw_amount' => [
                'numeric',
                'nullable',
            ],
            'belong_id' => [
                'integer',
                'exists:users,id',
                'nullable',
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
                'nullable',
            ],
            'mm_strategy' => [
                'string',
                'nullable',
            ],
            'mm_mutiple' => [
                'numeric',
                'nullable',
            ],
            'trade_strategy' => [
                'string',
                'nullable',
            ],
            'trade_multiple' => [
                'numeric',
                'nullable',
            ],
            'leverage' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'predict_rebate' => [
                'numeric',
                'nullable',
            ],
            'total_profit' => [
                'numeric',
                'nullable',
            ],
            'day_profit' => [
                'numeric',
                'nullable',
            ],
            'total_volume' => [
                'numeric',
                'nullable',
            ],
            'balance' => [
                'numeric',
                'nullable',
            ],
            'equity' => [
                'numeric',
                'nullable',
            ],
            'floating' => [
                'numeric',
                'nullable',
            ],
            'order_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'missing' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'connect_status' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(CrmCustomer::CONNECT_STATUS_SELECT, 'value')),
            ],
            'comment' => [
                'string',
                'nullable',
            ],
            'archive_status' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(CrmCustomer::ARCHIVE_STATUS_RADIO, 'value')),
            ],
        ];
    }
}
