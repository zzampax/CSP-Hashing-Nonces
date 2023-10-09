<?php
    $nonce = base64_encode(openssl_random_pseudo_bytes(32));
    // remove spaces from $nonce
    $nonce = str_replace('+', 'A', $nonce);
    header("Location: final.php?nonce=$nonce");
?>