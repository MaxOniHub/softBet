<?php

namespace App\Services;
use App\Abstractions\AbstractFileStorage;
use Carbon\Carbon;

/**
 * Class FileStorageService
 * @package App\Services
 */
class JSONFileStorageService extends AbstractFileStorage
{
    /**
     * @param $data
     * @return bool
     */
    public function toFile($data)
    {
        if ($this->isJson($data)) {
            $this->storage::makeDirectory($this->getTargetFolder());

            $this->storage::put($this->getFileName().'.json', $data);
            return true;
        }
        return false;
    }

    public function getFileName()
    {
        $date = Carbon::now();
        return $this->getTargetFolder() . '/' . $this->getPrefixFileName() . $date->toDateString();
    }

    private function isJson($arg)
    {
        return is_string($arg) && json_decode($arg);
    }
}