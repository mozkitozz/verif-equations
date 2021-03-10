<!--Entete de début du site - menu bleu -->
<?php include_once("../includes/header.php"); ?>

<!-- PROGRAMMER ICI -->
<main id="main">
    <form method="POST" action="">
        <div class="row row-ajout-master-titre-cours">
            <div class="col s12 col-ajout-titre-cours z-depth-3">
                <div class="row">
                    <div class="col s6">
                        <div class="row">
                            <span>Entrez le titre de votre exercice :</span>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">chevron_right</i>
                                <input id="Titre-cours" name="Titre-exercice" type="text" class="validate">
                                <label for="Titre-cours">Titre</label>
                            </div>
                        </div>
                    </div>
                    <div class="col s6 master-validate-button">   
                        <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Créer
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-master-contenu-cours paragraph-1" id="paragraph-1">
            <div class="col s3 z-depth-3 contenu-cours cours-sous-titre">
                <div class="row">
                    <div class="col s12 div-sous-titre">
                        <div class="row">
                            <span>Entrez le sous titre</span>
                        </div>
                        <div class="row div-input-sous-titre">
                            <div class="input-field col s10 ">
                                <i class="material-icons prefix">chevron_right</i>
                                <input id="input-sous-titre-1" name="input-sous-titre" type="text" class="validate input-sous-titre-1">
                                <label for="input-sous-titre-1">Sous-titre</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row new-paragraph">
                    <div class="col s6 add-div-1">
                        <a class="btn-floating btn-large waves-effect waves-light green add" id="add-paragraph-1" onclick="copyPara()"><i class="material-icons">add</i></a>
                    </div>
                    <div class="col s6 delete-div">
                        <a class="btn-floating btn-large waves-effect waves-light red delete" id="delete-paragraph-1" onclick="deletePara(this.id)"><i class="material-icons">delete_sweep</i></a>
                    </div>
                </div>

            </div>
            <div class="col s7 z-depth-3 contenu-cours cours-texte">
                <div class="row cours">
                    <div class="col s12 cours">
                        <div class="row">
                            <span>Contenu de l'exercice :</span>
                        </div>
                        <div class="row cours-text-area">
                            <textarea id="cours-1" class="cours-1" name="texte_exercice" cols="num" rows="num" placeholder="salut">Entrez votre exercice</textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</main>
<?php 
    if(isset($_POST['Titre-exercice']) && isset($_POST['input-sous-titre']) && isset($_POST['texte_exercice']))
    {
        $titre = $_POST['Titre-exercice'];
        $sous_titre = $_POST['input-sous-titre'];
        $texte_exercice = $_POST['texte_exercice'];

        $requete = $bdd->prepare("INSERT INTO exercices(titre_ex, sous_titre_ex, utilisateur_id, thematique_id, texte_ex) VALUES(:titre , :sous_titre, :user_id , :them_id, :texte_exercices)");
        
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':sous_titre', $sous_titre);
        $requete->bindParam(':user_id', $user_id);
        $requete->bindParam(':them_id', $thematique_id);
        $requete->bindParam(':texte_exercices', $texte_exercice);
        


        if($requete->execute())
        {
            echo "<p style='color:green; text-align:center;'><br><br> L'exercice a bien été créé !</p>";
        }
        else
        {
            echo "<p style='color:red; text-align:center; '><br><br> L'exercice' n'a pas pu être créé ! </p>";
        }
    }

    /*if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titre = $_POST['Titre-cours'];
        $requete1 = $bdd->prepare("INSERT INTO cours(titre_cours, utilisateur_id, thematique_id) VALUES(:titre , :user_id , :them_id)");
        $requete1->bindParam(':titre', $_POST["titre"]);
        $requete1->bindParam(':user_id', $user_id);
        $requete1->bindParam(':them_id', $thematique_id);
        $requete1->execute(); */
?>

<!-- Fin d'un fichier incluant les sources JS de materialize -->
<?php include_once("../includes/footer.php");?>