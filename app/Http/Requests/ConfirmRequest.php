<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConfirmRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|integer|min:1000|max:9999',
            'key' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'service' => [
                'required',
                Rule::in(['sms', 'telegram', 'email'])
            ],
        ];
    }
}
