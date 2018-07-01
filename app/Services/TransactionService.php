<?php

namespace App\Services;

use App\Abstractions\AbstractEntityService;
use App\Models\Transaction;

/**
 * Class TransactionService
 * @package App\Services
 */
class TransactionService extends AbstractEntityService
{

    /** @var Transaction **/
    protected $entity;

    /**
     * TransactionService constructor.
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
        parent::__construct($transaction);

    }

    public function load($request)
    {
        $this->entity->fill($request->all());
    }

    public function create()
    {
        return $this->store();
    }

    public function update()
    {
        return $this->store();
    }

    protected function store()
    {
        return $this->entity->save();
    }

    public function delete()
    {
        $this->entity->setIsDeletedAttribute(true);
        return $this->store();
    }
}