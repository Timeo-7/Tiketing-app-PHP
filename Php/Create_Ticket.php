<?php

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




if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "INSERT INTO ticket (title, client, users, statut, facturable, `date`) VALUES (:title, :client, :users, :statut, :facturable, :date)";
    $stmt = $pdo->prepare($sql);


    try {
    $stmt->execute([
        ":title"   => $_POST["ticket-title"],
        ":client"   => $_POST["ticket-client"],
        ":users"   => 0,
        ":statut"   => 0,
        ":facturable" => isset($_POST["facturable"]) ? 1 : 0,
        ":date" => $_POST["date"]
    ]);
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
    
}

header("location:../pages/Forms-Ticket.php");

?>