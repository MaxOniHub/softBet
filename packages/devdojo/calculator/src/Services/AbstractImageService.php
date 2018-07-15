<?php

namespace Devdojo\Calculator\Services;

abstract class AbstractImageService implements IImageService
{

    protected $type;

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}