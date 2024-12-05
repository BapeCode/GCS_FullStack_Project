<?php

require_once('config.php');

$messageDB = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['message'])) {
        if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['message'])) {
            // Nettoyer les données pour prévenir les injections SQL
            $fullname = $mysqli->real_escape_string($_POST['fullname']);
            $email = $mysqli->real_escape_string($_POST['email']);
            $message = $mysqli->real_escape_string($_POST['message']);

            $select = "SELECT * FROM contact WHERE full_name = '$fullname'";
            $selectResult = $mysqli->query($select);
            if ($selectResult->num_rows > 0) {
                $messageDB = "<p>You've only been contact the support</p>";
            } else {
                $query = "INSERT INTO contact (full_name, email, message) VALUES ('$fullname', '$email', '$message')";

                // Exécution de la requête
                if ($mysqli->query($query)) {
                    $messageDB = "<p>Send successfully!</p>";
                } else {
                    $messageDB = "<p>Send not successfully! Error: 404 MYSQL </p>";
                }
            }
        } else {
            $messageDB = "<p>All fields are required!</p>";
        }
    } else {
        $messageDB = "<p>All fields are required!</p>";
    }
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

    <nav>
        <a class="logo">
            <span>CyberNova</span>
        </a>

        <div class="main-navlinks">
            <button class="humburger" type="button">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="navlinks-container">
                <a href="../index.html" aria-current="page">Home</a>
                <a href="../index.html#about">About</a>
                <a href="../index.html#collaborator">Collaborator</a>
                <a href="contact.php">Contact</a>

                <a id="color-mode"><i class="fa-solid fa-circle-half-stroke"></i></a>

                <div class="search-container">
                    <form action="search.php" method="GET">
                        <label for="search-input">
                            <i id="search" class="fa-solid fa-magnifying-glass"></i>
                        </label>
                        <div class="search-input">
                            <input id="search-input" type="text" name="search" placeholder="Search in Cybernova">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="nav-buttons">
            <a id="user" href="back-end/login.php"><i class="fa-solid fa-right-to-bracket"></i></a>
            <div class="sign-btns">
                <a href="login.php">Login</a>
            </div>
        </div>
    </nav>

    <?php
    if ($mysqli) {
    ?>
        <section class="contact" id="contact">
            <h1>Contact us</h1>
            <div class="contact-container">
                <div class="input-container">
                    <form action="" method="POST" id="contact">
                        <legend>Contact Form 📞</legend>

                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" placeholder="Joe Max" name="fullname" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Email" name="email" required>

                        <label for="message">Message :</label>
                        <textarea id="message" style="height: 100px;" name="message" placeholder="Message" required></textarea>

                        <?php
                        echo $messageDB
                        ?>

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
    <?php
    } else {
    ?>

        <section class="contact" id="contact">
            <h1>An Error has been producted. Contact the support of the website. Error Code : 404 No SQL Connection</h1>
        </section>

    <?php
    }
    ?>
</body>

<script type="text/javascript" src="../scripts/addons.js"></script>

</html>