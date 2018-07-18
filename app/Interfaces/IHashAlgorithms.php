<?php

namespace App\Interfaces;

interface IHashAlgorithms
{
    /**
     * @param array $options
     * @return $this
     */
    public function useBcryptWorkFactor($options = ['rounds' => 12]);
    /**
     * @param array $options
     * @return $this
     */
    public function useArgon2WorkFactor($options = ['memory' => 1024, 'time' => 2, 'threads' => 2]);
}