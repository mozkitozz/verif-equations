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

<div class="card-panel z-depth-2">
    <div class="aide">
        <h6><b>Vous voulez donner votre avis sur ce site web ?</b></h6><br>
        <form method="post" action="#">
            Votre avis ici : 
            <textarea name="avis" id="ameliorer" rows="5" cols="50"></textarea>
            </br><br><br>
            <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Envoyer
            <i class="material-icons right">send</i></button>
        </form>
	</div>
</div><br>

<?php


if(isset($_POST["avis"]) && $_POST["avis"] != "")
	{
		//Date d'aujourd'hui à implémenter dans la base de données avec le message
		$date = date("Y-m-d");

		//Préparation de l'Insertion du message de l'élève dans la base de données, je fais un 'prepare' pour éviter des injection SQL (c'est à dire de hacker ma base de données)
	    $requete = $bdd->prepare("INSERT INTO avis(contenu, statut, date, utilisateur_id_post) VALUES(:avis, 0, '".$date."',".$_SESSION["id"].")");

		//Je passe donc en paramètre de cette requete SQL la variable de message que l'élève a rentré
		$requete->bindParam(':avis', $_POST["avis"]);

		// Condition pour savoir si la requète a bien été exécuté
		if($requete->execute())
		{
		//Message de validation
		echo "<p style='color:green; text-align:center; animation-duration: 3s;'>Votre avis a bien été pris en compte !</p>";
		}
	    //S'il y a une erreur
		else
		{
		//Message d'erreur
		echo "<p style='color:red; text-align:center; animation-duration: 3s;'>Votre avis n'a pas été prit en compte !</p>";
        }
        
    }

echo "<br><br><p style='font-size:20px; text-align:center;'><u>Les derniers avis :</u></p>";


$reponse = $bdd->query('SELECT contenu, statut, date, utilisateur_id_post FROM avis ORDER BY id_avis DESC');

	while ($donnees = $reponse->fetch())
	{
?>
	    <br><br><br>
        <div class="card-panel z-depth-10"> 
		<div class="aide">
			Avis d'un <?php echo "élève"; ?> le <?php echo $donnees['date']; ?> :<br><br>
            <?php echo $donnees['contenu']; ?><br><br>
		</div>
		</div>
		
<?php
	} // Fin de la boucle des billets
	$reponse->closeCursor();
?>

<?php include_once("../includes/footer.php"); ?>