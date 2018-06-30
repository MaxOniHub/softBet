<?php

namespace App\Services;

use App\Helpers\Encryptor;
use Illuminate\Support\Facades\Hash;

/**
 * Class EncryptionService
 * @package App\Services
 */
class EncryptionService
{
    /**
     * @var Hash
     */
    private $hasher;

    /**
     * @var Encryptor
     */
    private $encryptor;

    private $hashOptions = [];

    /**
     * HashService constructor.
     * @param Hash $hash
     * @param Encryptor $encryptor
     */
    public function __construct(Hash $hash, Encryptor $encryptor)
    {
        $this->hasher = $hash;
        $this->encryptor = $encryptor;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function useBcryptWorkFactor($options = ['rounds' => 12])
    {
        $this->hashOptions = $options;
        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function useArgon2WorkFactor($options = ['memory' => 1024, 'time' => 2, 'threads' => 2])
    {
        $this->hashOptions = $options;
        return $this;
    }

    /**
     * @param $value
     * @return string
     */
    public function makeHash($value)
    {
        if (!empty($options)) {
            return $this->hasher::make($value, $options);
        }

        return $this->hasher::make($value);
    }

    public function verifyHash($unhashed_value, $hashed_value)
    {
        return $this->hasher::check($unhashed_value, $hashed_value);
    }

    public function encrypt($value)
    {
        return $this->encryptor::encrypt($value);
    }


    public function decrypt($encryptedValue)
    {
        return $this->encryptor::decrypt($encryptedValue);
    }

}