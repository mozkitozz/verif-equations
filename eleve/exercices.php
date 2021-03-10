<!--Entete de début du site - menu bleu -->
<?php include_once("../includes/header.php"); ?>

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

<h3><p style='color:#65A693; text-align:center; font-family:Apple Chancery, cursive;'>Retrouvez vos exercices ici</p></h3>

<?php
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT titre_ex, sous_titre_ex, utilisateur_id, thematique_id, texte_ex FROM exercices');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
?>

<div class="card-panel z-depth-2">
    <div class="exercices">
        <h3>
            <strong><?php echo htmlspecialchars($donnees['titre_ex']); ?></strong>
        </h3>
        <h5>
            <u><?php echo $donnees['sous_titre_ex']; ?></u>
        </h5>
        <div class="">
            <?php echo $donnees['texte_ex']; ?>
        </div>
    </div>  
</div>

<?php
}

$reponse->closeCursor(); ?>


<?php include_once("../includes/footer.php"); ?>