<?php

// dd = debug & die
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


// 3 : on récupère les films pour les afficher dans le tableau
    $sql = "SELECT * FROM project";
    $stmt = $pdo->query($sql);
    $tickets = $stmt->fetchAll();
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    
     <header>
        <div class="logo">
            <a href="./Dashboard.php">
                <img src="../assets/img/Logo.png" alt="Logo de moi hyper bg">
            </a>
        </div>
        <h2>Welcome Maxence Gautier-Grall</h2>
        <nav>
            <a href="./Dashboard.php">Dashboard</a>
            <a href="./Projects-List.php">Projects</a>
            <a href="./Tickets-List.php">Tickets</a>
            <a href="./Clients-List.php">Clients</a>
            
            <div class="Profile-drop">
                <button class="Drop-button">☰</button>
                <div class="Drop-content">
                    <a href="../pages/Profil.php">Profile</a>
                    <a href="../pages/Settings.php">Settings</a>
                    <a href="../index.php">Logout</a>
                </div>   
                
            </div>
        </nav>
    </header>


     <section class="Projects-List">
           
         <div>
            <a class="new-ticket-button" href="./Forms-Project.php">+New Project</a>
        </div>

        <div class="access-list">
                <div class="cadre">   
                    <p>Projects</p>
                    <?php foreach ($tickets as $project): ?>
                        <a class="projects-fast-access" href="./Project.php?id=<?= $project["id"]?>">
                            <p><?= $project["title"]?></p>
                            <p><?= $project["client"]?></p>
                            <p><?= $project["ticketNumber"]?>x🧾</p>
                        </a>
                    <?php endforeach; ?>
                </div>
    </section>
    
    <script src="../JS/Header.js"></script>
</body>
</html>