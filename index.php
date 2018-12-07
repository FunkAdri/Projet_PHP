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
  <title>  </title>
  <meta name="author" content=" " />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
  <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
  <!--Import bootstrap.css-->
  <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  media="screen" />
  <!-- Import personnal stylesheet -->
  <link type="text/css" rel="stylesheet" href="assets/style.css" />
  <!--Let browser know website is optimized for mobile-->
</head>
<body class="">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Exploit'Portos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
        for ($i = 0; $i < $nbPages; $i++) {
          ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?= ($i+1); ?>.html">
              <?php
              echo $xml->page[$i]->menu;
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
  for ($j = 0; $j < $nbPages; $j++) {
    $url = '/'.($j+1).'.html';
    if ($_SERVER['REQUEST_URI'] == $url) {
      echo $xml->page[$j]->content;
    }
  }
  ?>
  <!--Scripts-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js%22%3E"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js%22%3E"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js%22%3E"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>
