<?php
// Start the session
session_start();
$fichier = "source.xml";
$xml = simplexml_load_file($fichier);
$nbPages = count($xml->page);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Exploit'Portos</title>
        <meta name="author" content=" " />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
        <!--Import bootstrap.css-->
        <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  media="screen" />
        <!-- Import personnal stylesheet -->
        <link type="text/css" rel="stylesheet" href="./assets/style.css" />
        <!--Let browser know website is optimized for mobile-->
    </head>
    <body>
        <div class="container-fluid" >
            <nav class="navbar navbar-light navbar-expand-md bg-light justify-content-center">
                <a href="index.php" class="navbar-brand mr-0" ><img class="logo" src="/assets/img/ocordo2.png" width="80px"/></a>
                <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav mx-auto text-center">
                    <?php
                    for ($i = 0; $i < $nbPages; $i++) {
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= ($i + 1); ?>.html"><span class="sr-only">Home</span>
                                <?php
                                echo $xml->page[$i]->menu;
                                ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                    <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
                        <li class="nav-item"><a class="nav-link" href=""><i class="fab fa-facebook-f mr-1"></i></a> </li>
                        <li class="nav-item"><a class="nav-link" href=""><i class="fab fa-twitter"></i></a> </li>
                    </ul>
                </ul>
            </nav>
        </div>
        <div class="container-fluid" >
            <div class="row">
                <img class="img-fluid" src="assets/img/Murdebriquesv2.jpg" alt="photobriques" width="1300px" />
            </div>
        </div>


        <?php
        if ($_SERVER['REQUEST_URI'] == '/index.php') {
            ?><div class="container-fluid ocordo" >
                <div class="row" class="col-lg-6"></div>
                <div class="show"></div>
                <h1 class="show">Maçonnerie Ocordo</h1>
                <p class="show">Nous sommes un groupement permanent d’entreprises locales du bâtiment spécialisées dans les travaux de rénovation de maisons et de construction d’extensions horizontales ou verticales de maisons.</p>
                <p class="show">Nous sommes capables de gérer un projet de rénovation ou d’extension de A à Z grâce à nos entreprises générales de bâtiment partenaires.</p>
                <p class="show">Nous pouvons assurer tous vos travaux de tout corps d’état.</p>

            </div>
            <div class="parallax">
            </div>
        <?php
        }
        for ($j = 0; $j < $nbPages; $j++) {
            $url = '/' . ($j + 1) . '.html';
            if ($_SERVER['REQUEST_URI'] == $url) { //si l'url de la barre d'adresse correspond à l'url du dessus, on affiche le contenu
                ?>
                <div class="container justify-content-center contact my-4"><?php
                    echo $xml->page[$j]->content; //on affiche le contenu de l'index du tableau page. par exemple l'index 0 s'affichera lorsque l'url sera 1.html (car l'id des pages commence par 1 et non 0)
                    ?></div>
                <?php
            }
        }
        ?>
        <div class="container-fluid footer text-center">
            <div class="row" id="footer">
                Mentions légales
                <ul><a href=""><i class="fab fa-facebook-f mr-1"></i></a> </ul>
                <ul><a href=""><i class="fab fa-twitter"></i></a> </ul>
            </div>
            <div class="row" class="nav-footer">
                <p>Copyright - Designed by Yassine-Karl-Adrien-Laëtitia pour La Manu 2018</p>
            </div>
        </div>

        <!--Scripts -->
        <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>

    </body>
</html> 

