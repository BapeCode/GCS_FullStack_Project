<?php

session_start();

if ($_SESSION['isAdmin'] !== true) {
    header("Location: login.php");
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
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>



</body>

<script type="text/javascript" src="../scripts/addons.js"></script>

</html>