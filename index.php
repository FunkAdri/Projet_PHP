<?php
// Start the session
session_start();
$fichier = "source.xml"; //on indique le lieu du fichier xml dans une variable
$xml = simplexml_load_file($fichier); //on charge le fichier et on le place dans une variable
$nbPages = count($xml->page); //on compte le nombre de page présent dans le xml
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Exploit'Portos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php
            for ($i = 0; $i < $nbPages; $i++) { //tant qu'i est inférieur au nb de page, on l'incrémente et on lance la boucle
          ?>
          <li class="nav-item active">
          <a class="nav-link" href="<?= ($i+1); ?>.html"> <!--chacun des liens créé renverra vers 1.html pour le premier, 2.html pour le second etc...-->
          <?php
            echo $xml->page[$i]->menu; //on affiche l'index 0 du tableau page dans le fichier xml, l'index 0 correspond à la page 1, l'index 1 à la page 2 etc...-->
          ?>
          </a>
          </li>
          <?php
            }
          ?>
        </ul>
      </div>
    </nav>
    <?php
    for ($j = 0; $j < $nbPages; $j++) { //pour j inférieur au nb de pages
      $url = '/ProjetPHP/Projet_PHP/'.($j+1).'.html'; //on défini l'url comme 1.html, 2.html etc
      if ($_SERVER['REQUEST_URI'] == $url) { //si l'url de la barre d'adresse correspond à l'url du dessus, on affiche le contenu
          ?><div class="container justify-content-center contact my-4"><?php
        echo $xml->page[$j]->content; //on affiche le contenu de l'index du tableau page. par exemple l'index 0 s'affichera lorsque l'url sera 1.html (car l'id des pages commence par 1 et non 0)
        ?></div><?php
      }
    }
    ?>
    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
