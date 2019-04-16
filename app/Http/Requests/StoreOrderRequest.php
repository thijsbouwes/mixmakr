<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'machine_id'        => 'required|integer|distinct|exists:machines,id',
            'drinks'            => 'required|array',
            'drinks.*.id'       => 'required|integer|distinct|exists:drinks,id',
            'drinks.*.quantity' => 'required|integer|min:1|max:5'
        ];
    }
}
