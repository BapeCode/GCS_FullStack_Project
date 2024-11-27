<?php
session_start();

// Regenerate session ID to prevent session fixation
session_regenerate_id(true);

// Form submission logic
if (isset($_POST['send'])) {
    // Sanitize and validate inputs
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST['phone']) ? filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT) : '';
    $messageContent = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Validate inputs
    if ($username && $email && $phone && $messageContent) {
        $to = "ebrehin@guardiaschool.com";  // Corrected email address
        $subject = "Vous avez reçu un message de " . $email;

        $message = "
            <p> Vous avez reçu un message de <strong>" . $email . "</strong></p>
            <p><strong>Nom : </strong>" . $username . "</p>
            <p><strong>Téléphone : </strong>" . $phone . "</p>
            <p><strong>Message : </strong>" . $messageContent . "</p>
        ";

        // Set headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <' . $email . '>' . "\r\n";

        // Send email
        $send = mail($to, $subject, $message, $headers);

        if ($send) {
            $_SESSION['succes_message'] = "Message envoyé";
            $color = "green";
        } else {
            $_SESSION['error_message'] = "Message non envoyé";
            $color = "red";
        }
    } else {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs";
        $color = "red";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_contact.css">
</head>
<body>
    <div id="custom-cursor"></div>

    <section class="header">
        <h1>Cybernova</h1>
        <nav>
            <a class="nav-button selected" href="#home">Home</a>
            <a class="nav-button" href="#about">About</a>
            <a class="nav-button" href="#collaborator">Collaborator</a>
            <a class="nav-button" href="#">Contact us!</a>
            <a class="nav-button login">Sign In/Sign Out</a>
        </nav>

        <div class="socials">
            <a href="#"><i class="fa-brands fa-github"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a id="dark-mode"><i class="fa-solid fa-circle-half-stroke"></i></a>
        </div>
    </section>

    <div class="resume">
        <header>
            <div class="profile">
                <h1>Nous contacter !!</h1>
            </div>
        </header>

        <?php
        if (isset($_SESSION['error_message'])) { ?>
            <p class="request_message" style="color: red;">
                <?= $_SESSION['error_message'] ?>
            </p>
        <?php } ?>

        <?php
        if (isset($_SESSION['succes_message'])) { ?>
            <p class="request_message" style="color: green;">
                <?= $_SESSION['succes_message'] ?>
            </p>
        <?php
            // Unset the success message after displaying
            unset($_SESSION['succes_message']);
        }
        ?>

        <form action="" method="POST">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Phone</label>
            <input type="number" name="phone" required>
            <label>Message</label>
            <textarea name="message" cols="30" rows="10" required></textarea>
            <button name="send">Send</button>
        </form>

        <footer>
            <p>Let’s chat! I’m ready to work on exciting projects.</p>
            <p>Email: <a href="mailto:mgerard@guardiaschool.fr">mgerard@guardiaschool.fr</a></p>
        </footer>
    </div>
</body>
</html>
