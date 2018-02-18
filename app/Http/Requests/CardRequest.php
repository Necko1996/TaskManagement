<?php

namespace App\Http\Requests;

class CardRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|min:5',
            'status' => 'required|integer',
        ];

        $this->changeRulesByMethod('POST', $rules, [
            'board_id' => 'required|integer',
        ]);

        return $rules;
    }
}
