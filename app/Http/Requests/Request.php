<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Change rules by method.
     *
     * @param  string  $method
     * @param  array  $rules
     * @param  array  $additionalRules
     * @return array
     */
    protected function changeRulesByMethod($method, array $rules, array $additionalRules)
    {
        if ($this->method == $method) {
            return array_union($rules, $additionalRules);
        }

        return $rules;
    }
}
