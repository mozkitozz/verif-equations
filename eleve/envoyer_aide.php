<!-- -->
<!--Entete de début du site - menu bleu et inclusion de la connexion à la base de données-->
<?php
include_once("../includes/header.php");
?>

<!-- PROGRAMMER ICI -->


<div class="section container">
    <div class="row">
        <div class="col l3 m2 s12"></div>
        	<div class="col l6 m8 s12">
        		</br>
        		<h5>Demander de l'aide</h5>
        		</br>
            	<div class="card-panel z-depth-5">

            		<!-- Création du formulaire d'aide qui pointe vers la meme page -->
                	<form method="post" action="#">
                    	Ecrire votre message
                    	<textarea name="aide" id="ameliorer" rows="10" cols="50"></textarea>       
            			</div>
            			</br>
            			<button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Envoyer
                        <i class="material-icons right">send</i>
                        </button>
        			</form>
        		

					<?php

					//Condition à executer SI le formulaire à été envoyé
					if(isset($_POST["aide"]) && $_POST["aide"] != "")
					{
						//Date d'aujourd'hui à implémenter dans la base de données avec le message
						$date = date("Y-m-d");

						//Préparation de l'Insertion du message de l'élève dans la base de données, je fais un 'prepare' pour éviter des injection SQL (c'est à dire de hacker ma base de données)
						$requete = $bdd->prepare("INSERT INTO message(contenu,statut,date,utilisateur_id_post) VALUES(:aide,0,'".$date."',".$_SESSION["id"].")");

						//Je passe donc en paramètre de cette requete SQL la variable de message que l'élève a rentré
					    $requete->bindParam(':aide', $_POST["aide"]);

					    // Condition pour savoir si la requète a bien été exécuté
					    if($requete->execute())
					    {
					    	//Message de validation
					    	echo "<p style='color:green;'>Votre demande d'aide à bien été transférée aux professeurs !</p>";
					    }
					    //Si il y a une erreur
					    else
					    {
					    	//Message d'erreur
					    	echo "<p style='color:red;'>Votre demande n'a pas été pris en compte, veuillez réessayer ultérieurement !</p>";
					    }
					}

					?>
			</div>
        <div class="col l3 m2 s12"></div>
    </div>
</div>

<?php include_once("../includes/footer.php"); ?>