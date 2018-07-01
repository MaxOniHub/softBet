<?php namespace App\Transformer;

use League\Fractal\TransformerAbstract;

/**
 * Class TransactionTransformer
 * @package App\Transformer
 */
class TransactionTransformer extends TransformerAbstract
{
    /**
     * @param $transaction
     * @return array
     */
    public function transform($transaction)
    {
        return [
            'transactionId' => $transaction->id,
            'customerId' => $transaction->user_id,
            'date' => $transaction->date,
            'amount' =>
                [
                    'value' => $transaction->amount,
                    'currency' => $transaction->currency
                ],
        ];
    }
}