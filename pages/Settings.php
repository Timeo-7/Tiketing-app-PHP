<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=4, initial-scale=1.0">
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
        <h2>Settings</h2>
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

    <section class="SettingsPage">
        <div class="ClassicSettings">
            <h2>General Settings</h2>
            <div class="Theme">
                <h3>Mode Sombre :</h3>

                <label class="ThemeSwitch">
                    <input type="checkbox" id="theme-toggle">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="LangueSettings">

                <h3>Langue :</h3>
                <select type="text" id="projet" name="projet">
                    <option value="Langue1">Français</option>
                    <option value="Langue2">Anglais</option>
                </select>

            </div>
            
        </div>
         <div class="DashBoardSettings">
            <h2>Dashboard Settings</h2>
            <div class="Theme">
                <h3>Fast Access :</h3>

                <label class="FastAccessSwitch" >
                    <input type="checkbox" id="FastAccess-toggle" checked>
                    <span class="slider"></span>
                </label>
            </div>
            
        </div>
    </section>

    <script src="../JS/Header.js"></script>
</body>
</html>