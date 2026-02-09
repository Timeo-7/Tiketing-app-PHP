<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
     <header>
        <div class="logo">
            <a href="../index.php">
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
                <div class="titanic Drop-content">
                     <a href="../pages/Profil.php">Profile</a>
                    <a href="../pages/Settings.php">Settings</a>
                    <a href="../index.php">Logout</a>
                </div>   
                
            </div>
        </nav>
    </header>

    <div class="Dashboard-Stats">
        
        <div>
            <div class="stats-list">

                <div class="stats-list-clients">
                    <a class="cadre" href="./Clients-List.php">Clients: 36</a>
                    <a class="cadre" href="./Projects-List.php">Projects: 45</a>
                    <a class="cadre" href="./Tickets-List.php">Tickets: 125</a>
                </div>

                <div class="stats-list-tickets">
                    <div class="stats-list-tickets1">
                        <div class="cadre">🧾Tickets ouverts: 36</div>
                        <div class="cadre">⏳Tickets en cours: 45</div>
                    </div>
                    <div class="stats-list-tickets2">
                        <div class="cadre">✅Tickets terminés: 125</div>
                        <div class="cadre">💰Tickets facturables en attente: 125</div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>

    <div class="Fast-Access">
        <h2>Fast-Access</h2>

        <div>
            <div class="access-list">
                <div class="cadre">   
                    <a href="./Projects-List.php">Projects</a>

                    <a class="projects-fast-access" href="./Project.php" >
                         <p>Project 1</p>
                         <p>25x🧾</p>
                    </a>
                    <a class="projects-fast-access" href="./Project.php" >
                         <p>Project 2</p>
                         <p>36x🧾</p>
                    </a>

                </div>
                
                <div class="cadre">   
                    <a href="./Tickets-List.php">Tickets</a>

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
                
            </div>
        </div>
    </div>

    

    <script src="../JS/Header.js"></script>
</body>
</html>