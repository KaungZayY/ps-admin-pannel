<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'item_name' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'item_condition' => 'required|string',
            'item_type' => 'required|string',
            'status' => 'nullable|integer',
            'item_photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'country_code' => 'required|string',
            'phone_number' => 'required|string|max:255',
            'owner_name' => 'required|string|min:2|max:255',
            'address' => 'required|string',
        ];
    }
}
