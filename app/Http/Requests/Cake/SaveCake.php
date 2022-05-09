<?php

namespace App\Http\Requests\Cake;

use Illuminate\Foundation\Http\FormRequest;

class SaveCake extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'weight' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'available_quantity' => ['required', 'numeric'],
        ];
    }
}
