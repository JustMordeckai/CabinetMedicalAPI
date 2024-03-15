<?php

include('jwt_utils.php');

function AuthentificationAPI($login, $mdp) {
    include('connection_bd.php');

    try {
        $sql = "SELECT auth.id_auth, auth.role 
                FROM user_auth_v2 as auth 
                WHERE login = :login AND mdp = :mdp";

        // Paramètre SQL
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':mdp', $mdp);

        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $date = new DateTimeImmutable();
                $expire_at = $date->modify('+6 minutes')->getTimestamp(); 
                $role = $stmt->fetch()['role'];
                $headers = array('alg'=>'HS256', 'typ'=>'JWT');
                $payload = array(
                    'iat'=>$date,
                    'username'=>$login,
                    'role'=>$role,
                    'exp'=>$expire_at
                );

                $jwt = generate_jwt($headers, $payload, 'eEMKZ3mw9SB3G6gx3ayLcRxQD9zb6Ex3ayLcRxQD9zb6EeEMKZ3mw9SB3G6g');

                return json_encode([
                    'success' => "Compte valide",
                    'token' => $jwt,
                ]);
            } else {
                return json_encode([
                    'error' => "Compte invalide",
                    'error_id' => "LMDPINV",
                ]);
            }
        } else {
            return json_encode([
                'error' => "Impossible de vérifier vos informations d'authentification, veuillez réessayer ultérieurement.",
                'error_id' => "STME"
            ]);
        }
    } catch (PDOException $e) {
        return json_encode([
            'error' => "Impossible de vérifier vos informations d'authentification, veuillez réessayer ultérieurement.", 
            'message' => $e->getMessage(),
            'error_id' => "PDOE",
        ]);
    }
}

function ValidTokenAPI() {
    $jwt = get_bearer_token();
    if (is_jwt_valid($jwt, 'eEMKZ3mw9SB3G6gx3ayLcRxQD9zb6Ex3ayLcRxQD9zb6EeEMKZ3mw9SB3G6g')) {
        $payloadArray = get_payload_token($jwt);
        return json_encode([
            'success' => "Token valide",
            'username' => $payloadArray['username'],
            'role' => $payloadArray['role'],
        ]);
    } else {
        return json_encode([
            'error' => "Token expiré ou invalide.",
            'error_id' => "TEXP",
        ]);
    }
}

?>