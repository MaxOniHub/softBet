<?php

namespace App\Http\Requests;

/**
 * Class CreateCustomerRequest
 * @package App\Http\Requests
 */
class CreateTransactionRequest extends BaseFormRequest
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
            'date' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
            'currency' => 'required',
        ];
    }


}
