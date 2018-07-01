<?php namespace App\Transformer;

use App\Helpers\Encryptor;
use League\Fractal\TransformerAbstract;

/**
 * Class CustomerTransformer
 * @package App\Transformer
 */
class CustomerTransformer extends TransformerAbstract
{
    /**
     * @param $customer
     * @return array
     */
    public function transform($customer)
    {
        return [
            'customerId' => $customer->id,
            'name' => $customer->name,
            'email' => $customer->email,
            /*'card_number' => Encryptor::decrypt($customer->card_number_hash)*/
        ];
    }
}