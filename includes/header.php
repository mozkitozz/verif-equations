<?php 
  include_once("connexionBDD.php"); 
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Verif&Quations</title>
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="../assets/css/style.css">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>
<?php
  if(!isset($_SESSION["login"]))
  {
    ?>
    <!-- Menu bleu en haut du site -->
    <header class="">
        <div class="navbar-fixed">
            <nav class="nav-wrapper blue">
                <div class="container">
                    <a href="#!" class="brand-logo center">Vérif&Quations</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <!-- Eléments du menu -->
                    </ul>
                </div>
            </nav>
        </div>
    </header>

      <ul class="sidenav" id="mobile-demo">
          <!-- Eléments du menu avec le side-nav -->
      </ul>
    <?php
  }
  else if($_SESSION["type"] == 1)
  {
    ?>
    <nav>
      <div class="nav-wrapper blue">
        <a href="#" class="brand-logo">Vérif&Quations</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="../eleve/tester_son_equation.php">Tester son équation</a></li>
          <li><a href="../eleve/grand_frere.php">Grand frère</a></li>
          <li><a href="../deconnexion.php">Déconnexion</a></li>
        </ul>
      </div>
    </nav>
    <?php
  }
  else if($_SESSION["type"] == 2)
  {
    ?>
    <nav>
      <div class="nav-wrapper blue">
        <a href="#" class="brand-logo">Vérif&Quations</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="../professeur/message_eleve.php">Messages des élèves</a></li>
          <li><a href="cours_professeur.php">Cours</a></li>
          <li><a href="../deconnexion.php">Déconnexion</a></li>
        </ul>
      </div>
    </nav>
    <?php
  }
  