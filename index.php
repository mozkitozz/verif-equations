<!--Entete de début du site - menu bleu -->
<?php 
include_once("includes/header.php");
if(isset($_SESSION["type"]))
{
    if($_SESSION["type"] == "1")
    {
        header("location: eleve/tester_son_equation.php");
    }
    else if($_SESSION["type"] == "2")
    {
        header("location: professeur/message_eleve.php");
    }
}
?>

<!-- PROGRAMMER ICI -->

<div class="section container">
    <div class="row">
        <div class="col l3 m2 s12"></div>
        <div class="col l6 m8 s12">
            <div class="card-panel z-depth-5">
                <form action="" method="POST">
                    <h2 class="center" style="margin-top: 0;">Connexion</h2>
                    <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input type="text" placeholder="Identifiant" name="login" focus class="validate">
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" placeholder="mot de passe" name="mdp" class="validate">
                    </div>
                    <p>
                        <label>
                            <input type="checkbox" name="login_checkbox">
                            <span>Se souvenir de moi</span>
                        </label>
                    </p>
                    <input type="submit" name="formlogin" value="Se connecter" class="btn blue left col s12">
                    <p class="left">Ëtes-vous nouveau? <a href="inscription.php" class="blue-text">Inscripton</a></p>
                    <p class="right"><a class="blue-text" href="#">Mot de passe oublié?</a></p>
                    <div class="clearfix"></div>
                </form>
            
                <?php
                    //Si le formulaire a été rempli
                    if(isset($_POST["login"]))
                    {
                        $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE login_utilisateur=:login");
                            $requete->bindParam(':login', $_POST["login"]);
                            // exécute
                            $requete->execute();
                            $data=$requete->fetch();

                            if (md5($_POST["mdp"]) == $data['mdp_utilisateur'])
                            {
                                $_SESSION["login"] = $_POST["login"];
                                $_SESSION["mdp"] = $_POST["mdp"];
                                $_SESSION["type"] = $data['type_id'];
                                $_SESSION["id"] = $data['id_utilisateur'];
                                if($_SESSION["type"] == "1")
                                {
                                    header("location: eleve/tester_son_equation.php");
                                }
                                else if($_SESSION["type"] == "2")
                                {
                                    header("location: professeur/message_eleve.php");
                                }
                            }
                            else
                            {
                                echo "<p style='color:red;'>Erreur, veuillez vérifier vos identifiants</p>";
                            }
                    }
                ?>

            </div>
        </div>
        <div class="col l3 m2 s12"></div>
    </div>
</div>

<!-- Fin d'un fichier incluant les sources JS de materialize -->
<?php include_once("includes/footer.php"); ?>
