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

    <section class="Tickets-List">

        <div>
            <a class="new-ticket-button" href="./Forms-Ticket.php">+ New Ticket</a>
        </div>
           

        <div class="cadre">   
            <p>Tickets</p>

            <a class="tickets-fast-access" href="./Tickets.php" >
                <p>Tickets 1</p>
                <p>client 1</p>
                
                <ul>
                    <li>2x🚹</li>
                    <li>⏳</li>
                    <li>🪙</li>
                    <li>28/01/2026 12:06</li>
                </ul>
            </a>

            <a class="tickets-fast-access" href="./Tickets.php" >
                <p>Tickets 2</p>
                <p>client 2</p>
                
                <ul>
                    <li>0x🚹</li>
                    <li>❌</li>
                    <li>27/01/2026 14:29</li>
                </ul>
            </a>

        </div>
    </section>
    
    <script src="../JS/Header.js"></script>
</body>
</html>