<?php

namespace App\Services;

use App\Interfaces\IHasher;
use Illuminate\Support\Facades\Hash;

/**
 * Class HashService
 * @package App\Services
 */
class HashService implements IHasher
{
    protected $hasher;

    protected $hashOptions = [];

    public function __construct(Hash $hash)
    {
        $this->hasher = $hash;
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
}