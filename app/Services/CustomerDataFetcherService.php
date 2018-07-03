<?php

namespace App\Services;

use App\User;

class CustomerDataFetcherService
{
    /**
     * @var User
     */
    private $repository;

    public function setRepository(User $user)
    {
        $this->repository = $user;
    }

    public function getUsersTransactions()
    {
        return $this->repository->transactions()->active()->get();
    }

    public function getUsersTransaction($transaction_id)
    {
        return $this->repository->transactions()->active()->where('id', $transaction_id)->first();
    }
}