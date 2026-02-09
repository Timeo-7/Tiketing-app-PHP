<?php

$ticket = [
         
        [
            "title" => "Ticket 1",
            "client" => "Client 1",
            "users" => "2x 🚹",
            "statut" => "⏳",
            "facturable" => "🪙",
            "date" => "28/01/2026 12:06",
        ],
        [
            "title" => "Ticket 2",
            "client" => "Client 2",
            "users" => "0x 🚹",
            "statut" => "❌",
            "facturable" => "—",
            "date" => "27/01/2026 14:29",
        ],
    ];

    // dd = debug & die
    function dd($a) {
        echo("<pre>");
        echo("<code>");
        var_dump($a);
        die();
        echo("</code>");
        echo("</pre>");
    }
    

    


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

    <section class="Tickets-List">

        

        <div>
            <a class="new-ticket-button" href="./Forms-Ticket.php">+ New Ticket</a>
        </div>
           
        

     <div class="cadre">
    <h3>Tickets</h3>
    <div class="filters-title"></div>
                <div class="filters" aria-label="Filtres par genre">
                    <a class="filter-btn-Tous" href="?filter=tous">Tous</a>
                    <a class="filter-btn-En-Cours" href="?filter=en_cours">En cours</a>
                    <a class="filter-btn-Non-Traite" href="?filter=non_traite">Non traité</a>
                    <a class="filter-btn-Money" href="?filter=facturable">Facturable</a>
                </div>

    <div class="table-responsive">
        <table class="Table-ticket" id="content">
            <thead>
                <tr>
                    <th>Ticket</th>
                    <th>Client</th>
                    <th>Utilisateurs</th>
                    <th>Statut</th>
                    <th>Facturable</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                
                <?php $filter = $_GET["filter"]; ?>

                <?php if (is_null($filter) || $filter == "tous" ): ?>

                    <?php foreach ($ticket as $t): ?>
                        <tr onclick="location.href='./Tickets.php'" style="cursor:pointer;">
                            <td><?= $t["title"] ?></td>
                            <td><?= $t["client"] ?></td>
                            <td><?= $t["users"] ?></td>
                            <td class="Statut"><?= $t["statut"] ?></td>
                            <td class="Money"><?= $t["facturable"] ?></td>
                            <td><?= $t["date"] ?></td>
                        </tr>
                    <?php endforeach; ?>
               
                <?php endif; ?>


                <?php if ($filter == "en_cours" ): ?>
                    <?php foreach ($ticket as $t): ?>
                        <?php if ($t['statut'] == '⏳'): ?>
                            <tr onclick="location.href='./Tickets.php'" style="cursor:pointer;">
                                <td><?= $t["title"] ?></td>
                                <td><?= $t["client"] ?></td>
                                <td><?= $t["users"] ?></td>
                                <td class="Statut"><?= $t["statut"] ?></td>
                                <td class="Money"><?= $t["facturable"] ?></td>
                                <td><?= $t["date"] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($filter == "non_traite" ): ?>
                    <?php foreach ($ticket as $t): ?>
                        <?php if ($t['statut'] == '❌'): ?>
                            <tr onclick="location.href='./Tickets.php'" style="cursor:pointer;">
                                <td><?= $t["title"] ?></td>
                                <td><?= $t["client"] ?></td>
                                <td><?= $t["users"] ?></td>
                                <td class="Statut"><?= $t["statut"] ?></td>
                                <td class="Money"><?= $t["facturable"] ?></td>
                                <td><?= $t["date"] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($filter == "facturable" ): ?>
                    <?php foreach ($ticket as $t): ?>
                        <?php if ($t['facturable'] == '🪙'): ?>
                            <tr onclick="location.href='./Tickets.php'" style="cursor:pointer;">
                                <td><?= $t["title"] ?></td>
                                <td><?= $t["client"] ?></td>
                                <td><?= $t["users"] ?></td>
                                <td class="Statut"><?= $t["statut"] ?></td>
                                <td class="Money"><?= $t["facturable"] ?></td>
                                <td><?= $t["date"] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>

    </section>
    <!-- <script src="../JS/Ticket-Page.js"></script> -->
    <script src="../JS/Header.js"></script>
</body>
</html>