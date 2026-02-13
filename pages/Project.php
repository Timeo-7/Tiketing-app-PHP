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
$sql = "SELECT * FROM project WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":id" => $_GET["id"],
]);

$project = $stmt->fetch();


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

            <div class="Right-buttons">
                <div >
                    <button class="Edit-button"onclick="location.href='./Edit-Projects.php?edit=<?= $project["id"] ?>'">✏️ Edit Project</button>
                </div>
                <div >
                    <button class="Supression-button" onclick="location.href='../Php/Delete_Project.php?delete=<?= $project["id"] ?>'">Supprimer le projet</button>
                </div>
            </div>
            
        </div>

        <div class="Ticket-cadre">   
            <h3>Project Name:</h3><p><?= $project["title"]?></p>
            <h3>Client:</h3><p><?= $project["client"]?></p>
            <h3>Description:</h3><p><?= $project["description"]?></p>

            <table class="Table-ticket">
                <tr>
                    <th colspan="2">Project Details</th>
                </tr>
                <tr>
                    <td>Contract : </td>
                    <td><button class="Edit-button">Download Contract</button></td>
                </tr>
                <tr>
                    <td>Number of associated tickets: </td>
                    <td><?= $project["ticketNumber"]?>x🧾</td>
                </tr>
                <tr>
                    <td>Tickets en cours: </td>
                    <td><?= $project["workingTickets"]?>x⌛</td>
                </tr>
                <tr>
                    <td>Tickets en attentes:</td> 
                    <td><?= $project["waitingTickets"]?>x❌</td>
                </tr>
            </table>

            <table class="Table-ticket">
                <tr>
                    <th colspan="2">Associated Tickets</th>
                </tr>
                <tr>
                    <td><a href="./Tickets.php">Ticket 1</a></td>
                    <td>⏳ En cours</td>
                </tr>
                <tr>
                    <td><a href="./Tickets.php">Ticket 2</a></td>
                    <td>✅ Terminé</td>
                </tr>
                

    </section>

    <script src="../JS/Header.js"></script>
</body>
</html>