<?php

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

switch ($method || $uri) {
    case ($method == 'POST' && $uri == "/api/authentification"):
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);

        if (!empty($data['login']) && !empty($data['mdp'])) {
            echo AuthentificationAPI($data['login'], $data['mdp']);
        } else {
            echo json_encode(['error' => "Les informations d'authentification sont incorrectes"]);
        }
        
        break;
    case ($method == 'GET' && str_contains($uri, '/api/authentification')):
        header('Content-Type: application/json');
        preg_match_all('/\/api\/authentification\/[\s\S]+/', $uri, $matches);
        echo var_dump($matches);
        // echo ValidTokenAPI($jwt);
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => "We cannot find what you're looking for."]);
        break;
}

?>