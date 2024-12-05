<?php

$cvArrays = [
    "mathieu" => [
        "image" => "../assets/collaborator/mathieu.jpg",
        "name" => "FOREST Mathieu",
        "job" => "Student in Cybersecurity",
        "bio" => "J....",
        "experience" => [
            [
                "title" => "Freelance - Développement",
                "date" => "2021 - actuellement",
                "tasks" => [
                    "Développement web",
                    "Développement dans le language LUA, JS, TS",
                    "Conception Web"
                ]
            ],
            [
                "title" => "Vente et commercialisation",
                "date" => "Juillet - Aout 2023",
                "tasks" => [
                    "Vente",
                    "Méthode de commercialisation"
                ]
            ],
            [
                "title" => "Service en restauration polyvalent",
                "date" => "Novembre - Décembre 2022",
                "tasks" => [
                    "Service client",
                    "Analyse des besoins",
                    "Gérer les besoins d'un client"
                ]
            ]
        ],
        "education" => [
            "2024 - 2029 - Guardia Cybersecurity MsC",
            "2021 - 2024 - Jehanne de France - Bac STHR"
        ],
        "languages" => [
            "Italien" => 20,
            "English" => 30,
            "Francais" => 100
        ],
        "tools" => [
            "Python",
            "HTML / CSS / SQL",
            "AI: ChatGPT"
        ],
        "interests" => "Pentest, OSINT, AI, typography, games",
        "email" => "mforest@guardiaschool.fr"
    ],
    "taha" => [
        "image" => "../assets/collaborator/taha.jpg",
        "name" => "CHAUDHRY Taha",
        "job" => "Student in Cybersecurity",
        "bio" => "...",
        "experience" => [
            [
                "title" => "Pharmacie",
                "date" => "Mai - Juin 2021",
                "tasks" => [
                    "Business to custommers",
                    "Restockage de la réserveS"
                ]
            ]
        ],
        "education" => [
            "2021 - 2024 - Baccalauréat général (Saint pierre channel)",
            "2024 - Bachelort en cybersecurity (Guardia School)"
        ],
        "languages" => [
            "English" => 65,
            "Francais" => 100
        ],
        "tools" => [
            "Python",
            "HTML / CSS / SQL",
            "AI: ChatGPT"
        ],
        "interests" => "Pentest, OSINT, AI, typography, games",
        "email" => "tchaudhry@guardiaschool.fr"
    ],
    "maxime" => [
        "image" => "../assets/collaborator/maxime.jpg",
        "name" => "GERARD Maxime",
        "job" => "Student in Cybersecurity",
        "bio" => "Je m'appele Maxime habitant à Lyon 7ème j'étudie aujourd'hui a guardiaschool en 1ère année pour approfondir mes connaissances. Je souhaite faire de cette branche mon métier professionel.
        Pour y arriver le travail est la clé, c'est pour ça que je crée un cv sur ce site pour potentiellement trouver un stage ou une alternance. Si vous êtes intéréssé contacter moi aux réseaux ci joint.",
        "experience" => [
            [
                "title" => "Pharmacie",
                "date" => "Mai - Juin 2021",
                "tasks" => [
                    "Business to custommers",
                    "Restockage de la réserveS"
                ]
            ]
        ],
        "education" => [
            "2021 - 2024 - Baccalauréat général (Saint pierre channel)",
            "2024 - Bachelort en cybersecurity (Guardia School)"
        ],
        "languages" => [
            "English" => 65,
            "Francais" => 100
        ],
        "tools" => [
            "Python",
            "HTML / CSS / SQL",
            "AI: ChatGPT"
        ],
        "interests" => "Pentest, OSINT, AI, typography, games",
        "email" => "mgerard@guardiaschool.fr"
    ],
    "eliott" => [
        "image" => "../assets/collaborator/eliott.jpg",
        "name" => "BRÉHIN Eliott",
        "job" => "Student in Cybersecurity",
        "bio" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum ducimus explicabo vero necessitatibus deleniti, quam, distinctio facere est quia nam aliquam. Quam suscipit labore iste quae sunt magnam nostrum similique!",
        "experience" => [
            [
                "title" => "ALL4TEC | Internship",
                "date" => "Octobre 2022 / 1 week",
                "tasks" => [
                    "Observation of the functionning of the company around fifteen people with different divisions/functions",
                    "Discovery of cyber analysis tools and programming languages"
                ]
            ],
            [
                "title" => "Unité Centrale | Internship",
                "date" => "Mai 2021 / 3 days",
                "tasks" => [
                    "Observation of the functioning of a small business of 4 people",
                    "Computer assembly"
                ]
            ]
        ],
        "education" => [
            "2021 - 2024 - Baccalauréat général (Saint pierre channel)",
            "2024 - Bachelort en cybersecurity (Guardia School)"
        ],
        "languages" => [
            "English" => 60,
            "Spanish" => 30,
            "Francais" => 100
        ],
        "tools" => [
            "Pentesting : BurpSuiteCommunity",
            "Coding : VisualStudioCode",
            "AI : ChatGPT"
        ],
        "interests" => "Vidéo games, informatic, Dev, musculation, Streetlifting",
        "email" => "ebrehin@guardiaschool.fr"
    ]
];

$profileKey = isset($_GET['name']) ? $_GET['name'] : 'mathieu'; // Valeur par défaut si 'name' n'est pas défini

// Vérifier si le profil demandé existe dans le tableau
if (array_key_exists($profileKey, $cvArrays)) {
    $profile = $cvArrays[$profileKey];
} else {
    // Si le profil n'existe pas, rediriger ou afficher un message d'erreur
    echo "Profil non trouvé.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybernova - CV</title>


    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .resume {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;

            header {
                text-align: center;
                margin-bottom: 30px;

                .profile {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 15px;

                    .profile-pic {
                        width: 80px;
                        height: 80px;
                        border-radius: 50%;
                        object-fit: cover;
                    }

                    h1 {
                        margin: 0;
                        font-size: 2rem;
                    }

                    p {
                        margin: 0;
                        color: #777;
                    }
                }
            }

            main {
                display: flex;
                justify-content: space-between;
                gap: 20px;

                .left-column {
                    flex: 2;
                    /* Colonne gauche plus large */
                }

                .right-column {
                    flex: 1;
                    /* Colonne droite plus petite */
                }

                section {
                    background: #ffffff;
                    border-radius: 15px;
                    padding: 20px;
                    margin-bottom: 20px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

                    h2 {
                        margin-top: 0;
                        color: var(--text);
                    }
                }

                .bar {
                    display: block;
                    background: var(--background);
                    border-radius: 10px;
                    overflow: hidden;
                    height: 8px;
                    margin-top: 5px;

                    span {
                        display: block;
                        height: 100%;
                        background: var(--button);
                    }
                }
            }

            footer {
                text-align: center;
                margin-top: 20px;
                color: var(--text);

                a {
                    color: var(--button);
                    text-decoration: none;
                }
            }
        }

        @media (max-width: 768px) {

            .resume {
                header {
                    .profile {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        text-align: center;
                    }

                    .profile-pic {
                        max-width: 100%;
                        height: auto;
                        margin-bottom: 10px;
                    }
                }

                main {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;

                    .left-column,
                    .right-column {
                        flex: 1;
                        width: 100%;
                        margin: 0;
                    }

                    section {
                        padding: 15px;
                        margin-bottom: 10px;
                    }

                    h1 {
                        font-size: 1.5rem;
                        margin-bottom: 10px;
                    }
                }
            }
        }
    </style>
</head>

<body style="    font-family: Arial, sans-serif;
line-height: 1.6;
margin: 0;
padding: 0;
background-color: #f5f5f5;
color: #333;">

    <div class="resume">
        <header>
            <div class="profile">
                <img src="<?php echo $profile['image']; ?>" alt="<?php echo $profile['name']; ?>" class="profile-pic">
                <div>
                    <h1><?php echo $profile['name']; ?></h1>
                    <p><?php echo $profile['job']; ?></p>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <!-- Colonne gauche : Experience et Education -->
            <div class="left-column">
                <section class="Qui ?">
                    <h2>Qui suis-je ?</h2>
                    <p><?php echo $profile['bio']; ?></p>
                </section>

                <section class="experience">
                    <h2>Experience</h2>
                    <?php foreach ($profile['experience'] as $job): ?>
                        <div class="job">
                            <h3><?php echo $job['title']; ?></h3>
                            <p><?php echo $job['date']; ?></p>
                            <ul>
                                <?php foreach ($job['tasks'] as $task): ?>
                                    <li><?php echo $task; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>

            <!-- Colonne droite : Languages, Tools et Interests -->
            <div class="right-column">
                <section class="education">
                    <h2>Education</h2>
                    <ul>
                        <?php foreach ($profile['education'] as $education): ?>
                            <li><?php echo $education; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <section class="languages">
                    <h2>Languages</h2>
                    <ul>
                        <?php foreach ($profile['languages'] as $language => $percentage): ?>
                            <li><?php echo $language; ?> <span class="bar"><span style="width: <?php echo $percentage; ?>%"></span></span></li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <section class="tools">
                    <h2>Tools</h2>
                    <ul>
                        <?php foreach ($profile['tools'] as $tool): ?>
                            <li><?php echo $tool; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <section class="interests">
                    <h2>Interests</h2>
                    <p><?php echo $profile['interests']; ?></p>
                </section>
            </div>
        </main>

        <footer>
            <p>Let’s chat! I’m ready to work on exciting projects.</p>
            <p>Email: <a href="mailto:<?php echo $profile['email']; ?>"><?php echo $profile['email']; ?></a></p>
        </footer>
    </div>

</body>

</html>