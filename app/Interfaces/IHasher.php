<?php

namespace App\Interfaces;

/**
 * Interface IHasher
 * @package App\Interfaces
 */
interface IHasher extends IHashAlgorithms
{
    /**
     * @param $value
     * @return string
     */
    public function makeHash($value);

    /**
     * @param $unhashed_value
     * @param $hashed_value
     * @return mixed
     */
    public function verifyHash($unhashed_value, $hashed_value);
}