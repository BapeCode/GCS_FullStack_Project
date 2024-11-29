<?php
$servername = "localhost";
$username = "root";
$password = "root";
$messageError = isset($messageError) ? $messageError : ''; // Variable pour stocker le message d'erreur


try {
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=$servername;dbname=utilisateurs", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si une erreur se produit lors de la connexion, afficher un message d'erreur
    echo "Connection failed: " . $e->getMessage();
    exit();
}

if (isset($_POST['ok'])) {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $mdp = $_POST['password'];

    // Vérifier si l'email existe dans la base de données
    $checkQuery = $bdd->prepare("SELECT * FROM users WHERE email = :email");
    $checkQuery->execute(array('email' => $email));
    $user = $checkQuery->fetch();

    if ($user) {
        // Si l'utilisateur existe, vérifier le mot de passe
        if (password_verify($mdp, $user['mdp'])) {
            // Si le mot de passe est correct, démarrer une session et rediriger l'utilisateur
            session_start();
            $_SESSION['user_id'] = $user['id']; // Stocker l'ID de l'utilisateur dans la session
            $_SESSION['user_name'] = $user['nom']; // Stocker le nom de l'utilisateur

            // Rediriger l'utilisateur vers la page d'accueil après la connexion réussie
            header('Location: ../index_signUp.html');  // Remplacez 'index.html' par la page protégée
            exit();
        } else {
            // Si le mot de passe est incorrect
            $messageError = "Le mot de passe est incorrect.";
        }
    } else {
        // Si l'utilisateur n'existe pas
        $messageError = "Aucun utilisateur trouvé avec cet email.";
    }
}

?>

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