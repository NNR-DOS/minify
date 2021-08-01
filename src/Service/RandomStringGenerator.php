<?php


namespace App\Service;


class RandomStringGenerator
{
    /**
     * Provides a string the length of the argument.
     *
     * @param int $len
     * @return string
     */
    public function generate(int $len): string
    {
        $chars = 'abcdefghilkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ12345689';
        $result = '';
        for ($i = 0; $i < $len; $i++) {
            $pos = mt_rand(0, strlen($chars) - 1);
            $result .= substr($chars, $pos, 1);
        }
        return $result;
    }
}