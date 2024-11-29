<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Connexion</title>
</head>
<body>
    <div id="custom-cursor"></div>

    <section class="header">
        <h1>Cybernova</h1>

        <nav>
            <a class="nav-button selected" href="../index.html#home">Home</a>
            <a class="nav-button" href="../index.html#about">About</a>
            <a class="nav-button" href="../index.html#collaborator">Collaborator</a>
            
        </nav>

        <div class="socials">
            <a href="#"><i class="fa-brands fa-github"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a id="dark-mode"><i class="fa-solid fa-circle-half-stroke"></i></a>
        </div>
    </section>
</link>
<link rel="stylesheet" href="../style/styleSignUp.css">
    <form method="POST" action="traitement_SignIn.php"> 
        <label for="email">Votre email</label>
        <input type="email" name="email" id="email" placeholder="Entrez votre email" required> 
        <br>
        <label for="password">Votre mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required> 
        <br>

        <input type="submit" value="Se connecter" name="ok">
    </form>

    <?php if ($messageError): ?>
        <p style="color: red; text-align: center; margin-top: 40px"><?= $messageError ?></p>
    <?php endif; ?>
</body>
</html>