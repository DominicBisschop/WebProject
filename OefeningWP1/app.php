<?php

require_once 'src/autoload.php';
use \model\EvenementRepository;
use \view\EvenementView;
use \controller\EvenementController;

$user = 'root';
$password = '';
$database = 'monkeybusiness';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=localhost:8081;dbname=$database",
                   $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);

    $EvenementRepository = new EvenementRepository($pdo);
    $EvenementView = new EvenementView();
    $EvenementController = new EvenementController($EvenementRepository, $EvenementView);

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $EvenementController->handleFindEvenementById($id);
} catch (Exception $e) {
    echo 'cannot connect to database';
}
