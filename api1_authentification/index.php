<?php

include("db_connection.php");
include("jwt_utils.php");

$date = new DateTimeImmutable();
$expire_at = $date->modify('+6 minutes')->getTimestamp(); 

$headers = array('alg'=>'HS256', 'typ'=>'JWT');
$payload = array(
    'iat'=>$data,
    'username'=>'ryan',
    'role'=>'admin',
    'exp'=>$expire_at
);

$jwt = generate_jwt($headers, $payload, 'secresecret');

echo $jwt;
echo "\n";
echo is_jwt_valid($jwt, 'secresecret');


?>