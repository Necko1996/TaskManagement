<?php

namespace App\Http\Requests\Team;

use App\Http\Requests\Request;

class UserTeamRequest extends Request
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
            'email' => 'required|email',
            'team_id' => 'required',
        ];
    }
}
