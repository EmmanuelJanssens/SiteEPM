
<?php 
    ob_start();
    $titre = "Divers";
?>

<div class="Header">
    <h1 class="titrePage" >Divers</h1>

    <form>

        <div id="formDivers">
            <input type="submit" value="Ajouter" name="ajouterFichierDivers">
            <input type="text" name="rechercherDivers">
        </div>
    </form>

    <div class="separator"></div>

</div>
<?php
    if(isset($_GET['action']) && isset($_SESSION['login']))
    {
        if($_GET['action'] == 'divers')
        {
            foreach($resultats as $lien)
            {
                echo $lien;
                echo '<br>';
            }
        }
        if($_GET['action'] == 'afficherPDF')
        {
            echo '<embed src="'.$_GET["fichier"].'" />';
        }

    }

?>

<?php
    $contenu = ob_get_clean();
    require "gabarit.php";  
?>