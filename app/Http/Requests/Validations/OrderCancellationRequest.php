<?php

namespace App\Http\Requests\Validations;

use App\Customer;
use App\Http\Requests\Request;

class OrderCancellationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user() instanceof Customer) {
            return $this->route('order')->customer_id == $this->user()->id;
        }

        return $this->route('order')->shop_id == $this->user()->merchantId();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Request::merge([
            'shop_id' => $this->route('order')->shop_id,
            'customer_id' => $this->user()->id,
        ]);

        if ( $this->action == 'return') {
            Request::merge(['return_goods' => 1]);
        }

        return [
            'cancellation_reason_id' => 'required|integer',
            'items' => 'required_without:all_items|array',
        ];
    }

   /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cancellation_reason_id.required' => trans('theme.cancellation_reason_required'),
            'items.required_without' => trans('theme.select_cancel_items_required'),
        ];
    }
}
