<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'type_id' => ['required', 'exists:item_types,id'],
            'brand' => ['required', 'string', 'max:30'],
            'description' => ['nullable', 'string'],
            'quantity' => ['required', 'numeric'] 
        ];
    }
}
