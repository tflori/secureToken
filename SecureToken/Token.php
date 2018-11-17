<?php

namespace SecureToken;

/**
 * Class Token
 *
 * Generates tokens
 *
 * @package SecureToken
 * @author Thomas Flori <thflori@gmail.com>
 */
class Token
{
    public static function generate($bitLength = 256, $base = 62)
    {
        // get random binary data
        $tokenBin = openssl_random_pseudo_bytes(floor($bitLength / 8));

        // use native function for hex conversion
        if ($base === 16) {
            return bin2hex($tokenBin);
        }

        if ((int)$base > 64 || (int)$base < 2) {
            $base = 62;
        }

        return Binary::toBase($tokenBin, (int)$base);
    }
}
