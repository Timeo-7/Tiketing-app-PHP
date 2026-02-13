<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
// Inclusion de la classe TicketForm
require_once './ProjectForm.php';

function dd($a) {
    echo("<pre>");
    echo("<code>");
    var_dump($a);
    die();
    echo("</code>");
    echo("</pre>");
}

//Connexion BDD
$dsn = "mysql:host=localhost:3306;dbname=tickets_db;charset=utf8mb4";
$user = "root";
$password = "root";


try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}


$errors = [];
$success = false;
// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $projectForm = new ProjectForm($_POST);
    
    
    if ($projectForm->save($pdo)) {
        header("location:../pages/Projects-List.php");
        exit();
    } else {
        $errors = $projectForm->getErrors();
    }
}



?>