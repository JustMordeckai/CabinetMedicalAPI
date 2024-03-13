<?php

// include("db_connection.php");
// include("jwt_utils.php");

// $date = new DateTimeImmutable();
// $expire_at = $date->modify('+6 minutes')->getTimestamp(); 

// $headers = array('alg'=>'HS256', 'typ'=>'JWT');
// $payload = array(
//     'iat'=>$data,
//     'username'=>'ryan',
//     'role'=>'admin',
//     'exp'=>$expire_at
// );

// $jwt = generate_jwt($headers, $payload, 'secresecret');

// echo $jwt;
// echo "\n";
// echo is_jwt_valid($jwt, 'secresecret');

// echo "INDEX ";
// echo $_SERVER['REQUEST_METHOD'];
// echo $_SERVER['REQUEST_URI'];

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

switch ($method || $uri) {
    case ($method == 'POST' && $uri == "/authentification"):
        header('Content-Type: application/json');
        echo json_encode(['error' => "POST API"]);
        break;
    case ($method == 'GET'):
        header('Content-Type: application/json');
        echo json_encode(['error' => "GET API"]);
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => "We cannot find what you're looking for."]);
        break;
}

?>