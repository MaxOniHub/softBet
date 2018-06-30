<?php

namespace App\Helpers;

use Illuminate\Contracts\Encryption\DecryptException;

/**
 * Class Encryptor
 * @package App\Helpers
 */
class Encryptor
{

    /**
     * @param string $value
     * @return string
     */
    public static function encrypt($value)
    {
        return encrypt($value);
    }

    /**
     * @param $encryptedValue
     * @return bool|mixed
     */
    public static function decrypt($encryptedValue)
    {
        try {
            return  decrypt($encryptedValue);
        } catch (DecryptException $e) {
            return false;
        }
    }
}