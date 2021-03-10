<!--<style>

.note{
    box-shadow: 0 0 10px;
	height: 500px;
    display: flex;
    align-items: center;
	justify-content: center;
	margin-right: 100px;
	margin-left: 100px;
}

.notation{
	margin-top: 50px;
	height: 40px;
	width: 130px;
}

#note{
	margin-left: 100px;
}

</style>-->


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


<h1><p style='color:lightblue; text-align:center; font-family:Apple Chancery, cursive;'>Vos notes ici</p></h1>




<div class="section container">
    <div class="row">
        <div class="col l3 m2 s12"></div>
        	<div class="col l6 m8 s12">
        		<h5>Notez ce site web et aidez nous afin de l'améliorer</h5>
        		</br>
            	<div class="card-panel z-depth-5">

            		<!-- Création du formulaire d'aide qui pointe vers la meme page -->
                	<form method="post" action="#">
						Notez ce site web ( Très mauvais / Mauvais / Moyen / Bien / Très bien )
						<textarea name="notation" id="ameliorer" rows="2" cols="50"></textarea>
                    	Ecrire vos notes
                    	<textarea name="note" id="ameliorer" rows="10" cols="50"></textarea>       
            			</div>
            			</br>
            			<button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Envoyer
                        <i class="material-icons right">send</i>
                        </button><br><br><br>
        			</form>


<?php

if(isset($_POST["notation"]) && $_POST["notation"] != "")
	{
		//Date d'aujourd'hui à implémenter dans la base de données avec le message
		$date = date("Y-m-d");

		//Préparation de l'Insertion du message de l'élève dans la base de données, je fais un 'prepare' pour éviter des injection SQL (c'est à dire de hacker ma base de données)
	    $requete = $bdd->prepare("INSERT INTO notes(utilisateur_id, notation, texte, date) (".$_SESSION["id"].", :notation, :note, '".$date."')");

		//Je passe donc en paramètre de cette requete SQL la variable de message que l'élève a rentré
		$requete->bindParam(':notation', $_POST["notation"]);
		$requete->bindParam(':note', $_POST["note"]);

		//Condition pour savoir si la requète a bien été exécuté
		if($requete->execute())
		{
		//Message de validation
		echo "<p style='color:green; text-align:center; animation-duration: 3s;'>Votre note a bien été prise en compte !</p>";
		}
	    //S'il y a une erreur
		else
		{
		//Message d'erreur
		echo "<p style='color:red; text-align:center; animation-duration: 3s;'>Votre note n'a pas été prise en compte !</p>";
        }
        
    }

?>

<!--Fin d'un fichier incluant les sources JS de materialize -->
<?php include_once("../includes/footer.php");?>





<!--<div class="note">
	<div class="texte"><h2>Votre note ici </h2>
	<label for="note">Notez ce site:</label>
	<select class="notation" name="notation">
		<option value="1" selected>Tres mauvais</option>
		<option value="2" selected>Mauvais</option>
	</select>
	</div>

<div><textarea id="note" name="note" rows="7" cols="70">
		Ecrire vos notes ici
	</textarea><br><br><br><br><br></div>
	&nbsp;&nbsp;<div><button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
</div>-->