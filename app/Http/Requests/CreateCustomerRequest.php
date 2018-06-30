<?php

namespace App\Http\Requests;

/**
 * Class CreateCustomerRequest
 * @package App\Http\Requests
 */
class CreateCustomerRequest extends BaseFormRequest
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
            'email' => 'email|unique:users',
            'name' => 'required',
            'cnp' => 'required',

            'cnp.billing_info' => 'required',
            'cnp.billing_info.address_line1' => 'required',
            'cnp.billing_info.city' => 'required',
            'cnp.billing_info.state' => 'required',
            'cnp.billing_info.postal_code' => 'required',

            'cnp.card_payment_info' => 'required',
            'cnp.card_payment_info.card_number' => 'required',
            'cnp.card_payment_info.expiration_date' => 'required',
            'cnp.card_payment_info.security_code' => 'required',
            'cnp.card_payment_info.card_issuer' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cnp.billing_info.required' => 'The billing_info is required',
            'cnp.billing_info.address_line1.required' => 'The address_line1 is required',
            'cnp.billing_info.city.required' => 'The city is required',
            'cnp.billing_info.state.required' => 'The state is required',
            'cnp.billing_info.postal_code.required' => 'The postal_code is required',

            'cnp.card_payment_info.expiration_date.required'  => 'The expiration_date is required',
            'cnp.card_payment_info.security_code.required'  => 'The security_code is required',
            'cnp.card_payment_info.card_number.required'  => 'The card_number is required',
            'cnp.card_payment_info.card_issuer.required'  => 'The card_issuer is required',
        ];
    }


}
