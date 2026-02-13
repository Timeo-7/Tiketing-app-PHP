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

// Récupérer l'ID du ticket depuis l'URL
$ticket_id = $_GET['id'] ?? null;


// Récupérer les données du ticket à modifier
$sql = "SELECT * FROM ticket WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $ticket_id]);
$ticket = $stmt->fetch();

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title  = trim($_POST['ticket-title'] ?? '');
    $client = trim($_POST['ticket-client'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $project = $_POST['projet'] ?? '';
    $collaborators = trim($_POST['colaborators'] ?? '');
    $date = $_POST['date'] ?? '';
    $facturable = isset($_POST['facturable']) ? 1 : 0;

    // Validation
    if (empty($title)) {
        $errors['title'] = "Le titre est obligatoire.";
    }

    if (empty($client)) {
        $errors['client'] = "Le client est obligatoire.";
    }

    if (empty($errors)) {
        // Mise à jour du ticket dans la base de données
        $sql = "UPDATE ticket SET 
                title = :title, 
                client = :client, 
                description = :description, 
                project = :project, 
                collaborators = :collaborators,
                date = :date,
                facturable = :facturable
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'title' => $title,
            'client' => $client,
            'description' => $description,
            'project' => $project,
            'collaborators' => $collaborators,
            'date' => $date,
            'facturable' => $facturable,
            'id' => $ticket_id
        ]);
        
        $success = true;
        
        // Recharger les données du ticket après modification
        $stmt = $pdo->prepare("SELECT * FROM ticket WHERE id = :id");
        $stmt->execute(['id' => $ticket_id]);
        $ticket = $stmt->fetch();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket</title>
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
        </div>

        <div>
            <h1>Edit Ticket #<?php echo htmlspecialchars($ticket['id']); ?></h1>
            
            <form id="submitform_ticket" action="" method="POST">
                <label for="ticket-title">Ticket Title:</label>
                <input type="text" id="ticket-title" name="ticket-title" value="<?php echo htmlspecialchars($ticket['title'] ?? ''); ?>">
                <?php if (!empty($errors['title'])): ?>
                    <div id="title_error" class="error-text"><?php echo $errors['title']; ?></div>
                <?php endif ?>
                <br>
                
                <label for="ticket-client">Client Name:</label>
                <input type="text" id="ticket-client" name="ticket-client" value="<?php echo htmlspecialchars($ticket['client'] ?? ''); ?>">
                <?php if (!empty($errors['client'])): ?>
                    <div id="client_error" class="error-text"><?php echo $errors['client']; ?></div>
                <?php endif ?>
                <br>
                
                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo htmlspecialchars($ticket['description'] ?? ''); ?></textarea>
                <br>
                
                <label for="projet">Project:</label>
                <select type="text" id="projet" name="projet">
                    <option value="project1" <?php echo ($ticket['project'] ?? '') === 'project1' ? 'selected' : ''; ?>>No Project</option>
                    <option value="project1" <?php echo ($ticket['project'] ?? '') === 'project1' ? 'selected' : ''; ?>>Project 1</option>
                    <option value="project2" <?php echo ($ticket['project'] ?? '') === 'project2' ? 'selected' : ''; ?>>Project 2</option>
                </select>
                
                <label for="colaborators">Colaborators:</label>
                <input type="text" id="colaborators" name="colaborators" value="<?php echo htmlspecialchars($ticket['collaborators'] ?? ''); ?>">

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($ticket['date'] ?? ''); ?>">

                <label for="facturable"> 
                    Facturable : 
                    <input type="checkbox" id="facturable" name="facturable" <?php echo !empty($ticket['facturable']) ? 'checked' : ''; ?>> 
                </label>
                    
                <button type="submit" class="Submit-button">Update Ticket</button>
            </form>
        </div>

        <?php if ($success): ?>
            <div class="ValidForms">
                <p>✓ Ticket mis à jour avec succès !</p>
            </div>
        <?php endif; ?>

    </section>

    <script src="../JS/Header.js"></script>
</body>
</html>