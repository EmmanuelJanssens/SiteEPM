
<?php
$titre ='Documentation enseignant';
// Tampon de flux stocké en mémoire
ob_start();
?>
<head>
    <title>Mouseover (Three.js)</title>
    <meta charset="utf-8">
</head>
<header>

    <div id="entete"><h2>Recherche de documents enseignant</h2></div>

</header>
<body>
<h1>Année:</h1>
<form method="post" action="index.php?action=rechercheDocEnseignant">

    <select id=browsers name="annee" style="width: 100%;">
        <option> 1ere
        <option> 2eme
        <option> 3eme
    </select>

    <br>
    <h1>Semaine:</h1>

    <select id=browsers name="semaines" class="liste" style="width: 100%">
        <option> 1
        <option> 2
        <option> 3
    </select>
    <br>

    <input type="submit" name="rechercher" value="Chercher">
    <input type="submit" name="reinitialiser" value="Reinitialiser">

</form>

<?php
?>
</body>
<?php
    if(!empty($resultats))
    {
        foreach ($resultats as $liens)
        {
            echo $liens.'<br>';
        }
    }
    if($_GET['action'] =="afficherFichierDocEnseignant" )
    {
        echo "<embed src='".$_GET['fichier']."'>";
    }
$contenu = ob_get_clean();
require "gabarit.php";
?>