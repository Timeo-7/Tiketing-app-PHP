<?php
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


// Requete du film en question
$sql = "SELECT * FROM ticket WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":id" => $_GET["id"],
]);

$ticket = $stmt->fetch();


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
                <a class="back-button" href="./Tickets-List.php">← Back to Tickets List</a>
            </div>

            <div class="Right-buttons">
                <div class="Edit-button">
                    <button onclick="window.location.href='./Edit-Tickets.php?edit=<?= $ticket["id"] ?>'">✏️ Edit Ticket</button>
                </div>
                <div class="Supression-button">
                    <button onclick="location.href='../Php/Delete_Ticket.php?delete=<?= $ticket["id"] ?>'">Supprimer le ticket</button>
                </div>
            </div>
            
        </div>
        

        <div class="Ticket-cadre">   
            <h3>Client:</h3><p> <?= $ticket["client"]?></p>
            <h3>Project:</h3><p> <?= $ticket["project"]?></p>
            <h3>Collaborateurs:</h3><p> <?= $ticket["collaborators"]?></p>
            <h3>Description:</h3> <p><?= $ticket["description"]?></p>
            <ul>
                
            </ul>
            <table class="Table-ticket">
                <tr>
                    <th colspan="2">Ticket Statue</th>
                </tr>
                <tr>
                    <td>Nombre de personnes concernées: </td>
                    <td><?= $ticket["users"]?>x🚹</td>
                </tr>
                <tr>
                    <td>Statut:</td> 
                    <td><?= $ticket["statut"] == 1 ? "⏳" : "❌" ?></td>
                </tr>
                <tr>
                    <td>Date de création:</td>
                    <td><?= $ticket["date"]?></td>
                </tr>
                <tr>
                    <td>Date de dernière mise à jour: </td>
                    <td>01/02/2026 10:00</td>
                </tr>
                <tr>
                    <td>Facturable:</td>
                    <td><?= $ticket["facturable"] == 1 ? "🪙" : "_" ?></td>
                </tr>
            </table>

            <table class="Table-ticket">
                    <th>Historique des commentaires</th>
                <tr>
                    <td>01/02/2026 10:00 - Commentaire 1: Mise à jour en cours.</td>
                </tr>
                <tr>
                    <td>30/01/2026 09:15 - Commentaire 2: Problème identifié.</td>
                </tr>
            </table>
        </div>



    </section>


    <script src="../JS/Header.js"></script>
</body>
</html>