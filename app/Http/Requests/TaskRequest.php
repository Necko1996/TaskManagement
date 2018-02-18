<?php

namespace App\Http\Requests;

class TaskRequest extends Request
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
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'priority' => 'required|integer',
            'card_id' => 'required|integer',
        ];

        $this->changeRulesByMethod('POST', $rules, [
            'board_id' => 'required|integer',
        ]);

        return $rules;
    }
}
