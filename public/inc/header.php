<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="scripts/jquery-3.5.1.min.js"></script>
    <title>Le sondage rouge</title>
</head>
<body>
    <header>
        <p id="logo"><a href="index.php?page=index"> Le sondage rouge</a> <label for="controle" id="burger">&#9776;</label>
            <input type="checkbox" id="controle"> </p>
        
        <nav>
            <ul>
            <li><a href="index.php?page=accueil">Mon compte</a></li>
                <li><a href="index.php?page=amis">Amis</a></li>
            </ul>
        </nav>
    </header>
    <aside id="aside_menu">
        <p class="sondage_aside"><a href="index.php?page=sondages">Creer un sondage</a></p>
        <section class="Section_aside">
            <p class="aside_titre">Mes émissions</p>
                <ul class="ul_sondage">
                        <li>

                            Koh-lanta
                        </li>
                        <li>
                            The-voice
                        </li>
                        <li>
                            Autres émissions...
                        </li>
                </ul>



        </section>
        <section class="Section_aside">
            <p class="aside_titre">Mes équipes</p>
            <ul class="ul_sondage">
                        <li><a href="index.php#PSG">PSG</a>
                            
                        </li>
                        <li>
                            Autres équipes...
                        </li>
                </ul>

        </section>
        <section class="Section_aside">
            <p class="aside_titre">Mes jeux</p>
            <ul class="ul_sondage">
                        <li>
                            Fortnite
                        </li>
                        <li>
                            Leagues of Legends
                        </li>
                        <li>
                            plus de jeux...
                        </li>
                </ul>
        </section>
    </aside>
