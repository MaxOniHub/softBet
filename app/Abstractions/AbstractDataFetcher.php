<?php

namespace App\Abstractions;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractEntityService
 * @package App\Abstractions
 */
abstract class AbstractDataFetcher
{
    /** @var Model **/
    protected $repository;

    /**
     * AbstractDataFetcher constructor.
     * @param Model $repository
     */
    public function __construct(Model $repository)
    {
        $this->repository = $repository;
    }

    public function setRepository(Model $repository)
    {
        $this->repository = $repository;
    }

    public function setLimit($limit = 25)
    {
        if ($limit) {
            $this->repository = $this->repository->limit($limit);
        }
        return $this;
    }

    public function setOffset($offset = 0)
    {
        if ($offset) {
            $this->repository = $this->repository->offset($offset);
        }
        return $this;
    }

    /**
     * @return Model
     */
    public function getRepository()
    {
        return $this->repository;
    }

    public function fetch()
    {
        return $this->repository->get();
    }

    public function fetchFirst()
    {
        return $this->repository->first();
    }
}