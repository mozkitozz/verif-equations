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

<h3><p style='color:#65A693; text-align:center; font-family:Apple Chancery, cursive;'>Retrouvez vos cours ici</p></h3>

<?php
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT titre_cours, sous_titre_cours, utilisateur_id, thematique_id, texte_cours FROM cours');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
?>

<div class="card-panel z-depth-2">
    <div class="cours">
        <h3>
            <strong><?php echo htmlspecialchars($donnees['titre_cours']); ?></strong>
        </h3>
        <h5>
            <u><?php echo $donnees['sous_titre_cours']; ?></u>
        </h5>
    </div>
    <div class="">
        <?php echo $donnees['texte_cours']; ?>
    </div>
</div>

<?php
}

$reponse->closeCursor(); ?>


<?php include_once("../includes/footer.php"); ?>