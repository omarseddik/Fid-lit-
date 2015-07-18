<?php

namespace Richflor\Http\Requests;

use Richflor\Http\Requests\Request;

class StoreUserPostRequest extends Request
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
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|unique:clients|max:255',
            'cin' => 'required|unique:clients|max:255'
        ];
    }
}
