<?php

namespace App\Services;

use App\Helpers\Encryptor;
use App\Interfaces\IEncryptor;
use App\Interfaces\IHasher;
use Illuminate\Support\Facades\Hash;

/**
 * Class EncryptionService
 * @package App\Services
 */
class SecurityService
{
    /**
     * @var IHasher
     */
    private $hasher;

    /**
     * @var IEncryptor
     */
    private $encryptor;

    /**
     * SecurityService constructor.
     * @param IHasher $hash
     * @param IEncryptor $encryptor
     */
    public function __construct(IHasher $hash, IEncryptor $encryptor)
    {
        $this->hasher = $hash;
        $this->encryptor = $encryptor;
    }

    /**
     * @param $value
     * @return string
     */
    public function makeHash($value)
    {
        return $this->hasher->makeHash($value);
    }

    public function verifyHash($unhashed_value, $hashed_value)
    {
        return $this->hasher->verifyHash($unhashed_value, $hashed_value);
    }

    public function useArgon2WorkFactor()
    {
        return $this->hasher->useArgon2WorkFactor();
    }

    public function encrypt($value)
    {
        return $this->encryptor->encrypt($value);
    }

    public function decrypt($encryptedValue)
    {
        return $this->encryptor->decrypt($encryptedValue);
    }

}