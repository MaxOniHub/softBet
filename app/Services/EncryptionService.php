<?php

namespace App\Services;

use App\Helpers\Encryptor;
use App\Interfaces\IEncryptor;
use Illuminate\Support\Facades\Hash;

/**
 * Class EncryptionService
 * @package App\Services
 */
class EncryptionService implements IEncryptor
{
    /**
     * @var Encryptor
     */
    private $encryptor;

    /**
     * EncryptionService constructor.
     * @param Encryptor $encryptor
     */
    public function __construct(Encryptor $encryptor)
    {
        $this->encryptor = $encryptor;
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