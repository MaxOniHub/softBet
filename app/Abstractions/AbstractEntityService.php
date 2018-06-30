<?php

namespace App\Abstractions;

use App\Interfaces\IEntity;
use App\Interfaces\IEntityService;

/**
 * Class AbstractEntityService
 * @package App\Abstractions
 */
abstract class AbstractEntityService implements IEntityService
{
    /**
     * @var IEntity
     */
    protected $entity;

    /**
     * AbstractEntityService constructor.
     * @param IEntity $entity
     */
    public function __construct(IEntity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param IEntity $entity
     */
    public function setEntity(IEntity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return IEntity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    public function findById($id)
    {
        $this->entity = $this->entity::find($id);

        return $this->entity;
    }
}