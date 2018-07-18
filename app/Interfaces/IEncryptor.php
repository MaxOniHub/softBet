<?php

namespace App\Interfaces;

interface IEncryptor
{
    public function encrypt($value);

    public function decrypt($encryptedValue);

}