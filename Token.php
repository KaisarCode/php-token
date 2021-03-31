<?php
Class Token {
    
    // Generate key
    static function generateKey($length = 8) {
        $pool = array_merge(range(0,9),
        range('a', 'z'), range('A', 'Z'));
        $key = '';
        for($i=0; $i < $length; $i++) {
            $key .= $pool[mt_rand(0, count($pool) - 1)];
        }
        return $key;
    }
    
    // Generate token
    static function generateToken() {
        if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
            $token = bin2hex(random_bytes(16));
        } else {
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);
        }
        return $token;
    }
}
