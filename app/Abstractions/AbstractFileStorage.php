<?php

namespace App\Abstractions;

use Illuminate\Support\Facades\Storage;

/**
 * Class AbstractFileStorage
 * @package App\Abstractions
 */
abstract class AbstractFileStorage
{
    protected $storage;

    protected $file_name;

    protected $prefix_file_name = '';

    protected $target_folder;

    /**
     * AbstractFileStorage constructor.
     * @param Storage $storageDriver
     */
    public function __construct(Storage $storageDriver)
    {
        $this->storage = $storageDriver;
    }

    public function toFile($data)
    {
        return true;
    }

    public function setPrefixFileName($prefix)
    {
        $this->prefix_file_name = $prefix;
    }

    public function getPrefixFileName()
    {
        return $this->prefix_file_name;
    }

    public function setTargetFolder($target_folder)
    {
        $this->target_folder = $target_folder;
    }

    public function getTargetFolder()
    {
        return $this->target_folder;
    }

    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
    }

    public function getFileName()
    {
        return $this->file_name;
    }
}