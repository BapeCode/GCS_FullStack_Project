<?php

session_start();

if ($_SESSION['isAdmin'] !== true) {
    header("Location: login.php");
}

require('config.php');


$contactSelect;
$queryContact = "SELECT * FROM contact";
$querySecurity = "SELECT * FROM login";
$result = $mysqli->query($queryContact);
$resultSecurity = $mysqli->query($querySecurity);


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

<body class="light-mode" style="overflow: hidden;">

    <div class="admin-global">
        <div class="admin-nav">
            <h1>CyberNova Administration</h1>

            <div class="admin-navlinks">
                <a href="../index.html"><i class="fa-solid fa-arrow-rotate-left"></i>Return in the site</a>
                <a id="contact" class="active"><i class="fa-regular fa-address-book"></i>Contact</a>
                <a id="security"><i class="fa-solid fa-shield-halved"></i>Sécurité</a>
            </div>

            <div class="admin-buttons">
                <a id="color-mode"><i class="fa-solid fa-circle-half-stroke"></i></a>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>

        <div class="admin-container">
            <button class="humburger" type="button">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div>
                <label for="admin-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </label>
                <input id="admin-search" type="text" placeholder="Search">
            </div>

            <div class="info-user">
                <i class="fa-solid fa-user"></i>
                <p>
                    <?php echo $_SESSION['email']; ?>

                </p>
            </div>
        </div>


        <div class="module-reply">
            <div class="header">
                <h3>Nouveau message</h3>
                <a id="close-module"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <div class="objects">
                <div class="objects-items">
                    <p>À <?php echo htmlspecialchars($contactSelect['email']); ?></p>
                </div>
                <div class="objects-items">
                    <input id="objects-mail" type="text" placeholder="Object">
                </div>
            </div>

            <textarea rows="5" cols="33" type="text" name="reply" id="message-mail"></textarea>

            <a href="manager_contact.php?email=${email}" class="send">Send</a>
        </div>

        <main class="admin-content-contact">
            <h1>Contact results</h1>
            <div class="admin-info">
                <p>Name</p>
                <p>Email</p>
                <p>Message</p>
                <p>Action</p>
            </div>

            <?php if ($result->num_rows > 0) { ?>

                <?php foreach ($result as $row): ?>
                    <div class="admin-results">
                        <p id="fullname">

                            <?php echo $row['full_name'] ?>

                        </p>
                        <p id="email">

                            <?php echo $row['email'] ?>

                        </p>
                        <p id="message">

                            <?php echo $row['message'] ?>

                        </p>
                        <div class="actions">
                            <a id="trash-admin"
                                href="manager_contact.php?id=<?php echo $row['id']; ?>"><i class=" fa-solid fa-trash-can"></i></a>
                            <a id="reply-admin" class="reply-admin"
                                data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                data-name="<?php echo htmlspecialchars($row['full_name']); ?>">
                                <i class="fa-solid fa-reply"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php } else { ?>
                <p>No results</p>
            <?php } ?>
        </main>

        <main class="admin-content-security">
            <div class="admin-grid">
                <h1>Security</h1>

                <div class="security-items">

                    <div class="manager-user">
                        <form action="" method="post">
                            <div class="add-user-items">
                                <label for="email-your"><i class="fa-regular fa-envelope"></i></label>
                                <input id="email-your" type="email" placeholder="E.g cybernova@example.com">
                            </div>

                            <div class="add-user-items">
                                <label for="old-password-user"><i class="fa-solid fa-lock"></i></label>
                                <input id="old-password-user" type="password" placeholder="Old password">
                            </div>

                            <div class="add-user-items">
                                <label for="password-your"><i class="fa-solid fa-lock"></i></label>
                                <input id="password-your" type="password" placeholder="Password">
                            </div>

                            <a class="update-password">Update password</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="admin-grid">
                <h1>Manage</h1>

                <div class="manager-items">
                    <div class="admin-infos">
                        <p>Email</p>
                        <p>Password</p>
                    </div>

                    <?php if ($resultSecurity->num_rows > 0) { ?>

                        <?php foreach ($resultSecurity as $row): ?>
                            <div class="users-items">
                                <p id="fullname">

                                    <?php echo $row['email'] ?>

                                </p>
                                <p id="email">

                                    <?php echo $row['password'] ?>

                                </p>
                            </div>
                        <?php endforeach; ?>

                    <?php } else { ?>
                        <p>No results</p>
                    <?php } ?>

                </div>
            </div>
        </main>
    </div>


</body>

<script type="text/javascript" src="../scripts/addons.js"></script>

<script>
    const buttonContact = document.querySelector('#contact');
    const buttonSecurity = document.querySelector('#security');
    const contactContainer = document.querySelector('.admin-content-contact');
    const securityContainer = document.querySelector('.admin-content-security')

    // Fonction pour mettre à jour les classes
    const updateClasses = () => {
        if (buttonContact.classList.contains('active')) {
            contactContainer.classList.add('active');
        } else {
            contactContainer.classList.remove('active');
        }
        if (buttonSecurity.classList.contains('active')) {
            securityContainer.classList.add('active')
        } else {
            securityContainer.classList.remove('active')
        }
    };

    // Vérifie l'état au chargement de la page
    document.addEventListener('DOMContentLoaded', updateClasses);

    // Ajoute des événements pour gérer les boutons
    buttonContact.addEventListener('click', () => {
        buttonContact.classList.add('active');
        buttonSecurity.classList.remove('active');
        updateClasses(); // Met à jour les classes
    });

    buttonSecurity.addEventListener('click', () => {
        buttonSecurity.classList.add('active');
        buttonContact.classList.remove('active');
        updateClasses(); // Met à jour les classes
    });

    document.querySelectorAll('.reply-admin').forEach(function(button) {
        button.addEventListener('click', function() {
            // Récupère les données du bouton cliqué
            const email = this.getAttribute('data-email');
            const name = this.getAttribute('data-name');

            // Met à jour le contenu de la modale
            document.querySelector('.module-reply .objects-items p').innerText = `À ${email}`;

            // Affiche la modale (ajoutez une classe CSS pour la rendre visible)
            document.querySelector('.module-reply').classList.add('active');
        });
    });

    // Ajoute un événement de clic pour fermer la modale
    document.getElementById('close-module').addEventListener('click', function() {
        document.querySelector('.module-reply').classList.remove('active');
    });

    document.querySelector('.update-password').addEventListener('click', function(e) {
        const email = document.querySelector('#email-your').value;
        const oldPassword = document.querySelector('#old-password-user').value;
        const password = document.querySelector('#password-your').value;


        this.setAttribute('href', `manager_contact.php?email=${encodeURIComponent(email)}&oldPassword=${encodeURIComponent(oldPassword)}&password=${encodeURIComponent(password)}`);
    })

    document.querySelector('.send').addEventListener('click', function(event) {
        // Récupérer les valeurs des champs
        const email = document.querySelector('.module-reply .objects-items p').innerText.split('À ')[1];
        const object = document.querySelector('#objects-mail').value;
        const message = document.querySelector('#message-mail').value;

        this.setAttribute('href', `manager_contact.php?email=${encodeURIComponent(email)}&object=${encodeURIComponent(object)}&message=${encodeURIComponent(message)}`);
    });

    document.querySelector('.humburger').addEventListener('click', function() {
        this.classList.toggle('open');
        document.querySelector('.admin-nav').classList.toggle('open');
    });
</script>

</html>