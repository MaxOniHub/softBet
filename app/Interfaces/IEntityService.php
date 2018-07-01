<?php

namespace App\Interfaces;

interface IEntityService extends IRepository
{
    public function setEntity(IEntity $entity);

    public function getEntity();

    public function load($request);

    public function create();

    public function update();

    public function delete();
}