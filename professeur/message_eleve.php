<!--Entete de début du site - menu bleu -->
<?php include_once("../includes/header.php"); ?>

<!-- PROGRAMMER ICI -->
<div class="section container">
    <div class="row">
        <div class="col l3 m2 s12"></div>
        	<div class="col l6 m8 s12">
	            <div class="card-panel z-depth-5">
	            	<?php echo "<H2>Bienvenue ".$_SESSION["login"].".";?>
	            </div>
	        </div>
        <div class="col l3 m2 s12"></div>
    </div>
</div>

<!-- Fin d'un fichier incluant les sources JS de materialize -->
<?php include_once("../includes/footer.php"); ?>