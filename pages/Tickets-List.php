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
    <div class="filters-title"></div>
                <div class="filters" aria-label="Filtres par genre">
                    <button class="filter-btn-En-Cours" type="button">En cours</button>
                    <button class="filter-btn-Non-Traite" type="button">Non traité</button>
                    <button class="filter-btn-Money" type="button">Facturable</button>
                </div>

    <table class="Table-ticket" id="content">
        <thead>
            <tr>
                <th>Ticket</th>
                <th>Client</th>
                <th>Utilisateurs</th>
                <th>Statut</th>
                <th>Paiement</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <tr onclick="location.href='./Tickets.php'" style="cursor:pointer;">
                <td>Ticket 1</td>
                <td>Client 1</td>
                <td>2x 🚹</td>
                <td class="Statut">⏳</td>
                <td class="Money">🪙</td>
                <td>28/01/2026 12:06</td>
            </tr>

            <tr onclick="location.href='./Tickets.php'" style="cursor:pointer;">
                <td>Ticket 2</td>
                <td>Client 2</td>
                <td>0x 🚹</td>
                <td class="Statut">❌</td>
                <td class="Money">—</td>
                <td>27/01/2026 14:29</td>
            </tr>
        </tbody>
    </table>
</div>

    </section>
    <script src="../JS/Ticket-Page.js"></script>
    <script src="../JS/Header.js"></script>
</body>
</html>