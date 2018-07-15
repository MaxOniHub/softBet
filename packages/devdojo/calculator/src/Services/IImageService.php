<?php

namespace Devdojo\Calculator\Services;

interface IImageService
{
    public function processImage(array $conf);

    public function setType(string $type);

    public function getType(): string;
}