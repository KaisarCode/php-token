<?php
Class Token {
    
    // Pseudo-random string
    static function rndStr($len = 8, $chr = '') {
        if (!$chr) {
            $chr .= '0123456789';
            $chr .= 'abcdefghijklmnopqrstuvwxyz';
            $chr .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        } $chl = strlen($chr);
        $str = '';
        for ($i = 0; $i < $len; $i++) {
            $str .= $chr[rand(0, $chl - 1)];
        } return $str;
    }
    
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
