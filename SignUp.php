<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Sign Up</title>
</head>
<body>
<div id="custom-cursor"></div>

<section class="header">

    <h1>Cybernova</h1>

    <nav>

        <a class="nav-button selected" href="#home">
            Home
        </a>

        <a class="nav-button" href="#about">
            About
        </a>

        <a class="nav-button" href="#collaborator">
            Collaborator
        </a>
        <a class="nav-button" href="Contact/Contact index.php">Contact us !</a>

        <a class="nav-button login" href="SignUp.php">Sign In/Sign Out</a>
        
    </nav>

    <div class="socials">
        <a href="#"><i class="fa-brands fa-github"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        <a id="dark-mode"><i class="fa-solid fa-circle-half-stroke"></i></a>
    </div>
</link>
<link rel="stylesheet" href="style/styleSignUp.css">
</section>
<form method="POST" action="traitement.php"> 
    <label for="nom"> Votre nom </label>
    <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" required> 
    <br>
    <label for="prenom"> Votre prénom </label>
    <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom" required> 
    <br>
    <label for="email"> Votre email </label>
    <input type="email" name="email" id="email" placeholder="Entrez votre email" required> 
    <br>
    <label for="password"> Votre mot de passe </label>
    <input type="text" name="password" id="password" placeholder="Entrez votre mot de passe" required> 
    <br>

    <input type="submit" value="M'inscrire" name="ok">
</form>
</body>
</html>