<!--Entete de début du site - menu bleu -->
<?php include_once("../includes/header.php"); ?>



<!-- PROGRAMMER ICI -->
<main>
    <div class="row main_container">
        <form method = "post" onsubmit="return false">
            <div class="col s12 main_box">
                <div class="row  z-depth-3 equation">
                    <div class="row titre">
                        <span class="main_text">Entrez votre équation à résoudre :</span>
                    </div>
                    <div class="row ">
                        <div class="input-field col s6">
                            <input id="equation" type="text" class="validate" name="equation" value="<?php if(isset($_POST['equation'])){echo ($_POST['equation']);};?>"> 
                            <label for="equation">Equation</label>
                        </div>
                    </div>
                </div>
                
                <div class="row  z-depth-3 reponse">
                    <div class="row ">
                        <span class="main_text">Ma réponse :</span>
                    </div>
                    <div class="row entree">
                        
                        
                    </div>
                    <div class="row add_line">
                        <span>Ajoutez une ligne</span>
                        <a id="add" href="#" class="btn-floating btn-small waves-effect waves-circle waves-light">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col s2 offset-s10">
                            <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Verifier
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        
        <div class="col s6 z-depth-3 solution fadein">
            <div class="row">
                <span class="main_text">Solution :</span>
            </div>
            <div class="row">
                <div class = 'row value_result'>
                    <span id='value_equa'></span>
                </div>
                <div class="container">
                    <div class="result">
                        
                        <div class="container">
                            <span class="text_result"></span>
                        </div>
                        
                        <div class="container gif">
                        </div>
                    </div>
                </div>
                <div class="row button_retry">       
                    <a class="waves-effect waves-light btn" id="retry" ><i class="material-icons right">cached</i>réessayer</a>
                    <a class="waves-effect waves-light btn" id="new"><i class="material-icons left">add_circle_outline</i>nouveau</a>
                </div>
            </div>
            
        </div>


    </div>
</main>




<!-- Fin d'un fichier incluant les sources JS de materialize -->
<?php include_once("../includes/footer.php"); ?>