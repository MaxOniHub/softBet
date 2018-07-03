<?php namespace App\Transformer;

use League\Fractal\TransformerAbstract;

/**
 * Class TransactionsSummaryTransformer
 * @package App\Transformer
 */
class TransactionsSummaryTransformer extends TransformerAbstract
{
    /**
     * @param $summary
     * @return array
     */
    public function transform($summary)
    {
        return [
            'transactions' => $summary->transactions,
            'total' => $summary->total,
            'date' => $summary->date,
            'currency' => $summary->currency
        ];
    }
}