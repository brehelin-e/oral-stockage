<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$jsonFile = 'results.json';

// Créer le fichier s'il n'existe pas
if (!file_exists($jsonFile)) {
    file_put_contents($jsonFile, json_encode(['results' => []]));
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Lire les résultats
        $data = json_decode(file_get_contents($jsonFile), true);
        echo json_encode($data);
        break;
        
    case 'POST':
        // Ajouter un nouveau résultat
        $input = json_decode(file_get_contents('php://input'), true);
        $data = json_decode(file_get_contents($jsonFile), true);
        
        if (!isset($data['results'])) {
            $data['results'] = [];
        }
        
        $data['results'][] = $input;
        file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
        
        echo json_encode(['success' => true, 'message' => 'Résultat ajouté']);
        break;
        
    case 'DELETE':
        // Effacer tous les résultats
        file_put_contents($jsonFile, json_encode(['results' => []], JSON_PRETTY_PRINT));
        echo json_encode(['success' => true, 'message' => 'Données effacées']);
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Méthode non autorisée']);
        break;
}
?>