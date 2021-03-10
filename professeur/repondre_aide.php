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

$reponse = $bdd->query('SELECT contenu, utilisateur_id_post FROM message ORDER BY id_message DESC');

while ($donnees = $reponse->fetch())
{
?>
<div id="aide" class="card-panel z-depth-2">
    <div class="aide">
        <p>
        <?php //echo htmlspecialchars($donnees['utilisateur_id_post']); ?>
        <em><?php //echo $donnees['date_creation']; ?></em>
        <p>Demande d'un élève:</p>
		<?php echo $donnees['contenu']; ?><br><br>
		<?php //echo $donnees['reponse du professeur']; ?>
    	</p>
        <form method="post" action="#">
            Ecrire une réponse :
            <textarea name="reponse_aide" id="ameliorer" rows="5" cols="50"></textarea>       
            </br>
            <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Soumettre
            <i class="material-icons right">send</i></button>
        </form>
		</div>
		</div><br><br><br><br><br>
<?php
}

if(isset($_POST["reponse_aide"]) && $_POST["reponse_aide"] != "")
	{
		//Date d'aujourd'hui à implémenter dans la base de données avec le message
		//$date = date("Y-m-d");

		//Préparation de l'Insertion du message de l'élève dans la base de données, je fais un 'prepare' pour éviter des injection SQL (c'est à dire de hacker ma base de données)
	    $requete = $bdd->prepare("INSERT INTO message(message_professeur) VALUES(:reponse_aide)");

		//Je passe donc en paramètre de cette requete SQL la variable de message que l'élève a rentré
		$requete->bindParam(':reponse_aide', $_POST["reponse_aide"]);

		// Condition pour savoir si la requète a bien été exécuté
		if($requete->execute())
		{
		//Message de validation
		echo "<p style='color:green; text-align:center;'>Votre réponse a été envoyée à l'élève !</p>";
		}
	    //S'il y a une erreur
		else
		{
		//Message d'erreur
		echo "<p style='color:red; text-align:center;'>Votre réponse n'a pas été envoyée à l'élève !</p>";
		}
    }
    
?>


<?php include_once("../includes/footer.php"); ?>