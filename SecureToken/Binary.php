<?php

namespace SecureToken;

/**
 * Class Binary
 *
 * Helper class for binary data.
 *
 * @package SecureToken
 * @author Thomas Flori <thflori@gmail.com>
 */
class Binary
{
    /**
     * Converts binary data to string in $targetBase.
     *
     * Maximum targetBase is 64. It's compatible to base64 but without trailing '='. We suggest base 62 to be url save.
     *
     * @param string $binary
     * @param int    $targetBase
     * @return string
     */
    public static function toBase($binary, $targetBase)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/';

        $decimal = '0';
        foreach (str_split($binary) as $byte) {
            $decimal = bcadd(bcmul($decimal, '256'), ord($byte));
        }

        if (10 == $targetBase) {
            return $decimal;
        }

        $length = 0;
        $result = '';
        do {
            $length++;
        } while (bccomp(bcpow($targetBase, $length), $decimal) !== 1);

        for ($pos = $length - 1; $pos > 0; $pos--) {
            $factor = bcpow($targetBase, $pos);
            $result .= $chars{bcdiv($decimal, $factor, 0)};
            $decimal = bcmod($decimal, $factor);
        }
        $result .= $chars{(int)$decimal};

        return $result;
    }
}
