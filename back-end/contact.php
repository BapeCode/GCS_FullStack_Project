<?php
$destinataire = "forest.mathieu69270@gmail.com";
$sujet = "Support CyberNova";

// Charger l'image de l'avatar
$avatarPath = "../assets/flag_france.png";  // Chemin vers l'image sur le serveur

// Lire l'image et l'encoder en base64
$avatarData = base64_encode(file_get_contents($avatarPath));

// Définir le type MIME pour l'image (par exemple, une image JPEG)
$avatarMimeType = "image/jpeg"; // ou "image/png" pour une image PNG

// Générer l'HTML pour l'email
$message = "<html><body>";
$message .= "<h1>Bonjour Maxime</h1>";
$message .= "<p>Merci de nous avoir contacté. Nous ferons de notre mieux pour vous répondre dans les plus brefs délais tout en réglant votre problème technique.</p>";

// Ajouter l'avatar encodé en base64
$message .= "<img src='data:$avatarMimeType;base64,$avatarData' alt='Avatar' style='width:100px;height:100px;border-radius:50%;'>";

$message .= "</body></html>";

$headers = "From: contact@support-cybernova.fr\r\n";
$headers .= "Reply-To: contact@support-cybernova.fr\r\n";
$headers .= "Content-Type: text/html; charset=\"utf-8\"\r\n";

if (mail($destinataire, $sujet, $message, $headers)) {
    echo "L'email a été envoyé !";
} else {
    echo "Une erreur est survenue !";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberNova - Contact</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/respensive.css">
    <link rel="stylesheet" href="../style/animations.css">
    <script src="https://kit.fontawesome.com/773700857c.js" crossorigin="anonymous"></script>
</head>

<body class="light-mode">

    <section class="header" id="header">

        <div class="logo">
            <h1>Cybernova</h1>
        </div>

        <div class="nav">
            <a class="nav-button selected" href="index.html">
                Home
            </a>

            <a class="nav-button" href="index.html#about">
                About
            </a>

            <a class="nav-button" href="index.html#collaborator">
                Collaborator
            </a>

            <a class="nav-button" href="contact.html">
                Contact
            </a>

            <a id="search"><i class="fa-solid fa-magnifying-glass"></i></a>

            <a id="color-mode"><i class="fa-solid fa-circle-half-stroke"></i></a>
        </div>

        <div class="search">
            <form method="post" action="back-end/search.php" id="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input id="input-search" type="text" placeholder="Search Cybernova.net">
            </form>
            <div id="close-search"><i class="fa-solid fa-xmark"></i></div>
        </div>

        <a id="nav-phone" class="mobile"><i id="bars" class="fa-solid fa-bars"></i></a>

    </section>

    <section class="contact" id="contact">
        <h1>Contact us</h1>
        <div class="contact-container">
            <div class="input-container">
                <form action="" method="POST" id="contact">
                    <legend>Contact Form</legend>

                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" placeholder="Joe Max" name="fullname" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Email" name="email" required>

                    <label for="message">Message :</label>
                    <textarea id="message" style="height: 100px;" name="message" placeholder="Message" required></textarea>

                    <button type="submit">Send this message</button>
                </form>

            </div>
            <div class="details-container">
                <span>email@guardia.fr</span>
                <span>+33 06.00.00.00.36</span>
                <h6>Cybernova</h6>
                <span>10 Rue Gilbert dru</span>
                <span>Lyon, 69007</span>
                <span>France</span>
                <div class="children">
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </section>

</body>

<script type="text/javascript" src="../scripts/addons.js"></script>

</html>