<?php

namespace App\Http\Requests\Validations;

use Auth;
use App\Http\Requests\Request;

class AdminCustomerUpdatePasswordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $customer = \App\Customer::find($this->route('customer'));

        if(! $customer) return false;

        return $this->user()->can('update', $customer);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'password' =>  'required|confirmed|min:6',
        ];
    }
}