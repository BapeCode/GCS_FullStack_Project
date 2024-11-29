<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$messageError = ""; // Variable pour stocker le message d'erreur

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
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT); // Sécurisation du mot de passe

    // Vérifier si l'email ou le nom existe déjà dans la base de données
    $checkQuery = $bdd->prepare("SELECT * FROM users WHERE email = :email OR nom = :nom");
    $checkQuery->execute(array('email' => $email, 'nom' => $nom));
    $user = $checkQuery->fetch();

    if ($user) {
        // Si l'utilisateur existe déjà, définir le message d'erreur
        if ($user['email'] == $email) {
            $messageError = "L'email est déjà utilisé. Veuillez en choisir un autre.";
        } elseif ($user['nom'] == $nom) {
            $messageError = "Le nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
        }
    } else {
        // Si l'utilisateur n'existe pas, on procède à l'insertion des données
        $request = $bdd->prepare("INSERT INTO users (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)");

        // Exécution de la requête avec les paramètres
        $request->execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "mdp" => $mdp,
        ));

        // Optionnel : récupérer la dernière entrée insérée (si nécessaire)
        $reponse = $bdd->lastInsertId();
        $messageSuccess = "L'utilisateur a été enregistré avec l'ID : " . $reponse;

        // Rediriger l'utilisateur vers la page d'accueil après l'inscription réussie
        header('Location:../index_signUp.html');  // Remplacez 'index.php' par le chemin correct de votre page d'accueil
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Inscription</title>
</head>
<body>
    

    

    <div id="custom-cursor"></div>

<section class="header">

    <h1>Cybernova</h1>

    <nav>

        <a class="nav-button selected" href="../index.html#home">
            Home
        </a>

        <a class="nav-button" href="../index.html#about">
            About
        </a>

        <a class="nav-button" href="../index.html#collaborator">
            Collaborator
        </a>
        

        <a class="nav-button login" href="SignUp.php">Sign In/Sign Out</a>
        
    </nav>

    <div class="socials">
        <a href="#"><i class="fa-brands fa-github"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        <a id="dark-mode"><i class="fa-solid fa-circle-half-stroke"></i></a>
    </div>
</link>
<link rel="stylesheet" href="../style/styleSignUp.css">
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
<?php if ($messageError): ?>
        <p style="color: red; text-align: center; margin-top: 40px"><?= $messageError ?></p>
    <?php elseif ($messageSuccess): ?>
        <p style="color: green; text-align: center; margin-top: 40px"><?= $messageSuccess ?></p>
    <?php endif; ?>
</body>
</html>
