<?php

require_once "config.php";

$wordSearch = "";

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['search'])) {
    $search = trim($_GET['search']);

    if (!empty($search)) {
        $wordSearch = htmlspecialchars($search);

        $query = "
            SELECT 
                ib.id AS collaborateur_id, 
                ib.nom, 
                ib.prenom, 
                ib.langue, 
                GROUP_CONCAT(DISTINCT s.skill SEPARATOR ', ') AS competences, 
                GROUP_CONCAT(DISTINCT c.certification SEPARATOR ', ') AS certifications,
                e.poste, 
                e.entreprise, 
                e.description, 
                e.periode
            FROM informations_basics ib
            LEFT JOIN skills s ON ib.id = s.collaborateur_id
            LEFT JOIN certifications c ON ib.id = c.collaborateur_id
            LEFT JOIN experiences e ON ib.id = e.collaborateur_id
            WHERE ib.nom LIKE '%$search%' 
               OR ib.prenom LIKE '%$search%' 
               OR ib.langue LIKE '%$search%'
               OR s.skill LIKE '%$search%'
               OR c.certification LIKE '%$search%'
               OR e.poste LIKE '%$search%'
               OR e.entreprise LIKE '%$search%'
               OR e.description LIKE '%$search%'
               OR e.periode LIKE '%$search%'
            GROUP BY ib.id, e.poste, e.entreprise, e.description, e.periode
        ";

        $results = $mysqli->query($query);
    } else {
        $ResultatFinal = "Aucun terme de recherche spécifié.";
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

<body>
    <nav style="position: relative;">
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
            <a id="user" href="login.php"><i class="fa-solid fa-right-to-bracket"></i></a>
            <div class="sign-btns">
                <a href="login.php">Login</a>
            </div>
        </div>
    </nav>

    <div class="search-result">
        <div class="search-title">
            <h1>Resultat pour :</h1>
            <h1><?php echo $wordSearch ?></h1>
        </div>

        <?php if ($results->num_rows > 0) { ?>
            <div class="search-container">
                <div class="search-grid-wrapper">
                    <div class="search-grid-header">Id</div>
                    <div class="search-grid-header">Lastname</div>
                    <div class="search-grid-header">Firstname</div>
                    <div class="search-grid-header">Language</div>
                    <div class="search-grid-header">Skills</div>
                    <div class="search-grid-header">Certification</div>
                    <div class="search-grid-header">Jobs</div>
                    <div class="search-grid-header">Society</div>
                    <div class="search-grid-header">Description</div>
                    <div class="search-grid-header">Period</div>

                    <?php foreach ($results as $rows): ?>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['collaborateur_id']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['nom']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['prenom']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['langue']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['competences']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['certifications']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['poste']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['entreprise']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['description']) ?></div>
                        <div class="search-grid-items"><?php echo htmlspecialchars($rows['periode']) ?></div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php } else { ?>

            <p>None value at this searching</p>

        <?php } ?>


    </div>
</body>

<script type="text/javascript" src="../scripts/addons.js"></script>

</html>