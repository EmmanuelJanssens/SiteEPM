<?php
$titre ='Plateforme échanges fiches techniques - Login';

// Tampon de flux stocké en mémoire
ob_start();

if (isset($msg_err) && !empty($msg_err)) {
    echo $msg_err;
}

?>
    <FORM method="post" action="index.php?action=afficher_film">
        <h1>Films</h1>
        <Br>
        <h2>Titre du film :</h2>
        <br>
        <TEXTAREA name="nom" rows=3 cols=40></TEXTAREA>
        <br>
        <h2>Année :</h2>
        <br>
        <div>
            <select name="annee" required>
                <?php
                foreach ($annees as $resultat) :
                    //attention case sensitive!!!
                    ?>
                    <option value="<?= $resultat['Annee']; ?>"> <?php echo $resultat['Annee']; ?> </option>

                <?php endforeach ?>
            </select>
        </div>
        <br>
        <h2>Type de film :</h2>
        <br>
        <div>
            <select name="Nom" required>
                <?php
                foreach ($typeFilm as $resultat) :
                    ?>
                    <option value="<?= $resultat['Nom']; ?>"> <?php echo $resultat['Nom']; ?> </option>

                <?php endforeach ?>
            </select>
        </div>
        <br>
        <input type="submit" value="Chercher">
        <input type="reset" value="Réinitialiser">
    </FORM>


<?php

$contenu = ob_get_clean();
require "gabarit.php";
