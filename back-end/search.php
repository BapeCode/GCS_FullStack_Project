<?php

$host = "localhost";
$dbname = "cybernova";
$username = "root";
$password = "root";

$mysqli = @new mysqli(
    $host,
    $username,
    $password,
    $dbname
);

if (isset($_POST['search'])) {
    if (!empty($_POST['search'])) {
        $search = $_POST['search'];
        $search = $mysqli->real_escape_string($_POST['search']);

        $query = "SELECT * FROM articles WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            // Affiche les résultats
            while ($row = $result->fetch_assoc()) {
                echo "Titre : " . htmlspecialchars($row['title']) . "<br>";
                echo "Contenu : " . htmlspecialchars($row['content']) . "<br><br>";
            }
        } else {
            echo "Aucun résultat trouvé pour votre recherche.";
        }
    } else {
        echo "Veuillez mettre une texte";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <form action="" method="POST" align="center">
        <input type="text" name="search">
    </form>
</body>

</html>