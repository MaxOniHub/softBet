<?php

namespace App\Services;

use Illuminate\Http\Request;

class TransactionSearchFilter
{
    /** @var TransactionDataFetcherService  */
    private $DataFetcher;

    /**
     * TransactionSearchFilter constructor.
     * @param TransactionDataFetcherService $dataFetcherService
     */
    public function __construct(TransactionDataFetcherService $dataFetcherService)
    {
        $this->DataFetcher = $dataFetcherService;

    }

    public function search(Request $request)
    {
        return $this->DataFetcher
            ->setOffset($request->get('offset'))
            ->setLimit($request->get('limit'))
            ->setAmount($request->get('amount'))
            ->fetch();
    }

}