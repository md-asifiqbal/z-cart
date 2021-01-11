<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class AdminUpdateMerchantPasswordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $merchant = \App\Merchant::find($this->route('merchant'));

        if(! $merchant) return false;

        return $this->user()->can('update', $merchant);
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