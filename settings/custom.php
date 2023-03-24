<?php
    function encrypt_ams($plaintext){
        $key = "ZYXoXHx0QoFUEx3De3sYgoAnA4Uz0Xpfs27PPbziKpUOMXqTVqzdAyzSjCHHn1zz+Csl+6oFYTEkvAelQiJriQ==";
        // $plaintext = "message to be encrypted";
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );

        return $ciphertext;
    }

    function decrypt_ams($ciphertext){
        $key = "ZYXoXHx0QoFUEx3De3sYgoAnA4Uz0Xpfs27PPbziKpUOMXqTVqzdAyzSjCHHn1zz+Csl+6oFYTEkvAelQiJriQ==";
        $c = base64_decode($ciphertext);
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        if (hash_equals($hmac, $calcmac))// timing attack safe comparison
        {
            return $original_plaintext;
        }
        else {
            return false;
        }
    }
?>