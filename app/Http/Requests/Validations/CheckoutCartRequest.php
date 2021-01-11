<?php

namespace App\Http\Requests\Validations;

use Auth;
use App\Http\Requests\Request;

class CheckoutCartRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return crosscheckCartOwnership($this, $this->route('cart'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // crosscheckAndUpdateOldCartInfo($this, $this->route('cart')); // Update cart info

        $rules = [];
        if ( ! Auth::guard('customer')->check() ) {
            $unique_ck = $this->has('create-account') ? '|unique:customers' : '';

            $rules['email'] =  'required|email|max:255' . $unique_ck;
            $rules['password'] =  'required_with:create-account|nullable|confirmed|min:6';
        }

        if( 'saved_card' != $this->payment_method )
            $rules['payment_method'] = ['required', 'exists:payment_methods,id,enabled,1'];

        return $rules;
    }
}
