<!--Entete de début du site - menu bleu -->
<?php include_once("includes/header.php"); ?>

<!-- PROGRAMMER ICI -->
<div class="section container">
    <div class="row">
        <div class="col l3 m2 s12"></div>
        <div class="col l6 m8 s12">
            <div class="card-panel z-depth-5">
                <form action="" method="POST">
                
                    <h2 class="center" style="margin-top: 0;">Inscription</h2>
                    <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input type="text" placeholder="Identifiant" name="login" focus class="validate">
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" placeholder="Mot de passe" name="mdp" class="validate">
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" placeholder="Confirmation de mot de passe " name="verif_mdp" class="validate">
                    </div>

                    <input type="submit" value="Inscription" class="btn blue left col s12">
                    <p class="left">Dèjà membre? <a href="./index.php" class="blue-text">Se connecter</a></p>
                    <div class="clearfix"></div>
                </form>
            

                <?php
                    //Si l'utilisateur s'est inscrit
                    if(isset($_POST["login"]))
                    {
                        if($_POST["mdp"] == $_POST["verif_mdp"])
                        {
                            $requete = $bdd->prepare("INSERT INTO utilisateur(login_utilisateur,mdp_utilisateur,type_id) VALUES(:login,MD5(:mdp),1)");
                            $requete->bindParam(':login', $_POST["login"]);
                            $requete->bindParam(':mdp', $_POST["mdp"]);
                            // exécute
                            if($requete->execute())
                            {
                                echo "<p style='color:green;'>Votre inscription a bien été effectuée ! Vous pouvez à présent vous connecter.</p>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <div class="col l3 m2 s12"></div>
    </div>
</div>

<?php
    // Fin d'un fichier incluant les sources JS de materialize
    include_once("includes/footer.php"); 
 ?>
