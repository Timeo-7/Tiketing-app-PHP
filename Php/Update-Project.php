<?php
require_once "ProjectForm.php";

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

//Recupere ID
if (isset($_GET["edit"])) {

    $sql = "SELECT * FROM project WHERE id=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id" => $_GET["edit"]
    ]);
}

$project = $stmt->fetch();

$errors = [];
$success = false;

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    $ProjectForm = new ProjectForm($_POST);
    


    if ($ProjectForm->update($pdo, $project["id"])) {

        header("location:../pages/Project.php?id=".$project['id']);
    } else {
        $errors = $ProjectForm->getErrors();
    }
}



?>