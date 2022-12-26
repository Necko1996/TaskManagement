<?php

namespace App\Http\Requests\Card;

use App\Http\Requests\Request;

class CardRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->email_verified_at;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'status' => 'required|integer',
        ];
    }
}
