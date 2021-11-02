<?php

namespace App\Http\Requests\Padideh\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreWasteOrderHead extends FormRequest
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
            'pasmand_id' => 'nullable|numeric',
            'name' => 'nullable|string|max:50',
            'vahed' => 'nullable|string|max:50',
            'weight' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'address_id' => 'nullable|numeric',
        ];
    }
}
