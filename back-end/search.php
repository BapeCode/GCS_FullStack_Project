<?php

if (isset($_POST['search'])) {
    if (!empty($_POST['search'])) {
        // Récupérer la valeur de la recherche
        $search = $_POST['search'];

        // Vérifier si la recherche contient des caractères interdits
        if (preg_match('/[^a-zA-Z0-9\s]/', $search)) {
            // Si des caractères interdits sont trouvés
            echo "Des caractères non autorisés ont été détectés. Veuillez entrer uniquement des lettres, chiffres et espaces.";
        } else {
            // Si les caractères sont valides, on nettoie et on continue
            $search = $mysqli->real_escape_string($search);

            $query = "SELECT * FROM articles WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "Titre : " . htmlspecialchars($row['title']) . "<br>";
                    echo "Contenu : " . htmlspecialchars($row['content']) . "<br><br>";
                }
            } else {
                echo "Aucun résultat trouvé pour votre recherche.";
            }
        }
    } else {
        echo "Veuillez entrer un texte.";
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