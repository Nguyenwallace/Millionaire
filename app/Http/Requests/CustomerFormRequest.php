<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
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
            //
			'name'=>'required|min:6',
			'address'=>'required|min:9',
			'email'=>'required|email|unique:customers,email|min:6',
			'telephone'=>'required'
        ];
    }
	
	public function messages()
	{
		return [
			'email.required' => 'Bạn quên nhập Email rồi kìa!',
			'email.unique' => 'Email này đã có người khác dùng rồi',
		];
	}
}
