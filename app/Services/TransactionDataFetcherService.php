<?php

namespace App\Services;

use App\Abstractions\AbstractDataFetcher;
use App\Models\Transaction;

/**
 * Class TransactionDataFetcherService
 * @package App\Services
 */
class TransactionDataFetcherService extends AbstractDataFetcher
{

    /**
     * TransactionDataFetcherService constructor.
     * @param Transaction $repository
     */
    public function __construct(Transaction $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->repository->user()->get();
    }

    /**
     * @param $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        if ($amount) {
            $this->repository = $this->repository->where('amount', $amount);
        }
        return $this;
    }

    public function fetch()
    {
        return $this->repository->active()->get();
    }
}