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

        <div class="access-list">
                <div class="cadre">   
                    <p>Clients</p>

                    <a class="clients-fast-access" href="./Project.php" >
                         <p>Client 1</p>
                         <p>25x🧾</p>
                    </a>
                    <a class="clients-fast-access" href="./Project.php" >
                         <p>Client 2</p>
                         <p>36x🧾</p>
                    </a>

                </div>
    </section>

    <script src="../JS/Header.js"></script>
</body>
</html>