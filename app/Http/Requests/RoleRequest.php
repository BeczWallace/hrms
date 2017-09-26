<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
        switch($this->method())
		{
			case 'POST':
			{
				return [
					'role' => 'required|min:2|unique:roles,role'
				];
			}
			case 'PATCH':
			{
				return [
					'role' => 'required|min:2|unique:roles,role,'.$this->get('id')
				];
			}
		}
    }
}
