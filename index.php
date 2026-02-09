<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="./pages/Dashboard.html">
                <img src="./assets/img/Logo.png" alt="Logo de moi hyper bg">
            </a>
        </div>
        <nav>

            <a href="#">Contact</a>
            <a href="./pages/Inscription.html">Creer un compte</a>

        </nav>
    </header>

    <section class="connexion-form">
        <form id="submitform_connexion" action="pages/Dashboard.html" method="GET" novalidate>
            <h2>Connexion</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <div id="email_error" class="error-text titanic">L'Email est invalide</div>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <div id="password_error" class="error-text titanic">Le Mot de passe doit faire plus de 8 caractères et contenir au moins un chiffre et une lettre.</div>
            <br>
            <button type="submit" class="Submit-button">Login</button>
            <a href="./pages/Forgotten-Password.html">Forgotten password</a> 
        </form>

    </section>

    <script src="./JS/Connexion.js"></script>
</body>
</html>