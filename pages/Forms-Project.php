<?php

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

         <section>

         <div class="Ticket-Header">   
            <div>
                <a class="back-button" href="./Projects-List.php">← Back to Projects List</a>
            </div>
            
        </div>

        <div>
            <form id="submitform_project" action="../Php/Create_Project.php" method="POST">
                <label for="project-title">Project Title:</label>
                <input type="text" id="project-title" name="project-title">
                <div id="title_error" class="error-text titanic">Le titre est obligatoire.</div>
                <br>
                <label for="project-client">Client Name:</label>
                <input type="text" id="project-client" name="project-client">
                <div id="client_error" class="error-text titanic">Le client est obligatoire.</div>
                <br>
                <label for="project-description">Description:</label>
                <textarea id="description" name="description"></textarea>
                <br>
                <label for="project-file">Contract : <input type="file" id="project-file" name="contract"  accept=".pdf,.doc,.docx"></label>
                <div id="file_error" class="error-text titanic">Le contrat est obligatoire.</div>
                    
                <button type="submit" class="Submit-button">Create Project</button>
                
            </form>
        </div>

        <div class="ValidForms titanic">
            <p>Formulaire envoyé</p>
        </div>


    </section>

    <!-- <script src="../JS/Project-Forms.js"></script> -->
    <script src="../JS/Header.js"></script>
</body>
</html>