<?php

namespace App\Http\Requests;

use App\Models\CrmDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreCrmDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_document_create');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'integer',
                'exists:crm_customers,id',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
                'in:' . implode(',', Arr::pluck(CrmDocument::TYPE_SELECT, 'value')),
            ],
            'document_file' => [
                'array',
                'nullable',
            ],
            'document_file.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'photo' => [
                'array',
                'nullable',
            ],
            'photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
