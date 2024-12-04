<?php

session_start();

if (isset($_SESSION['isAdmin']) === true) {
    header("Location: admin.php");
    exit();
}

require_once('config.php');

$messageDB = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email'] && !empty($_POST['password']))) {

            $email = $mysqli->real_escape_string($_POST['email']);
            $password = $mysqli->real_escape_string($_POST['password']);
            $password = md5($password);

            $select = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
            $selectresult = $mysqli->query($select);

            if ($selectresult->num_rows > 0) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['isAdmin'] = true;

                header("Location: admin.php");
                exit();
            } else {
                $messageDB = "<p style='color: red' >You don't have any account.</p>";
            }
        } else {
            $messageDB = "<p>Enter your identifiant</p>";
        }
    } else {
        $messageDB = "<p>All field are require</p>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian</title>
    <link rel="stylesheet" href="../style/animations.css">
    <link rel="stylesheet" href="../style/respensive.css">
    <link rel="stylesheet" href="../style/style.css">
    <script src="https://kit.fontawesome.com/773700857c.js" crossorigin="anonymous"></script>
</head>

<body class="light-mode" style="overflow: hidden;">
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
                    <label for="search-input">
                        <i id="search" class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <div class="search-input">
                        <input id="search-input" type="text" placeholder="Search in Cybernova">
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-buttons">
            <a id="user"><i class="fa-solid fa-user"></i></a>
            <div class="sign-btns">
                <a href="login.php">Login</a>
            </div>
        </div>
    </nav>

    <div class="login-container">
        <div class="login-items">
            <h1>Login</h1>
            <p>Hi, Welcome back 👋</p>

            <form action="" method="post" id="login">
                <label for="email">
                    Email
                </label>
                <input name="email" id="email" type="email" placeholder="E.g joe.marc@example.com">
                <label id="password">Password</label>
                <input name="password" id="password" type="password" placeholder="Enter your password">

                <?php
                echo $messageDB;
                ?>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

<script type="text/javascript" src="../scripts/addons.js"></script>

</html>