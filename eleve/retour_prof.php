<!--Entete de début du site - menu bleu -->
<?php include_once("../includes/header.php"); ?>

<!-- PROGRAMMER ICI -->
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=verif','root','',  array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch(Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}
?>

<h3><p style='color:#65A693; text-align:center; font-family:Apple Chancery, cursive;'>Retrouvez les retour des profs</p></h3>

<?php
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT contenu, utilisateur_id_post FROM message ORDER BY id_message DESC');


while ($donnees = $reponse->fetch())
{

?>

<div class="card-panel z-depth-2">
    <div class="">
        <h3>
            <strong><?php //echo htmlspecialchars($donnees['date']); ?></strong>
        </h3>
        <div class="">
            <?php echo $donnees['contenu']; ?>
			<?php echo "message eleve"; ?>
        </div>
    </div>  
</div>

<?php

$req = $bdd->query('SELECT date, message FROM message_professeur');
while ($donnees = $req->fetch())
{
?>

    <div class="">
        <h3>
            <strong><?php //echo htmlspecialchars($donnees['date']); ?></strong>
        </h3>
        <div class="">
			&nbsp;&nbsp;&nbsp;--> <?php echo $donnees['message']; ?>
        </div>
    </div>  
	<br>
<?php
}

}?>


<!-- Fin d'un fichier incluant les sources JS de materialize -->
<?php include_once("../includes/footer.php"); ?>