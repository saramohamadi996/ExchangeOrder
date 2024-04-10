<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreExchangeOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'source_currency' => ['required', 'in:layer,tether,bitcoin'],
            'target_currency' => ['required', 'in:layer,tether,bitcoin', 'different:source_currency'],
            'amount' => ['required', 'numeric', 'gt:0'],

        ];
    }
}
