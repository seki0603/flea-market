<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payment_method' => ['required', 'in:コンビニ支払い,カード支払い'],
            'ship_postal_code' => ['required', 'regex:/^\d{3}-\d{4}$/'],
            'ship_address' => ['required'],
            'ship_building' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'payment_method.required' => '支払方法を選択してください',
            'ship_address' => '配送先住所を選択してください'
        ];
    }
}
