
<?php

require "modele/modele.php";


// Affichage de la page d'accueil
function accueil()
{
    require "vue/vue_accueil.php";
}
function login()
{
    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pwd'])) {

        extract($_POST);

        //Appel de la fonction qui vérifie si le login existe dans la BD et retourne le mot de passe
        //définie dans le modèle
        $pwdFromBD= getPwdFromLogin($login);

        //on récupère bien un mot de passe
        if (isset($pwdFromBD) && !empty($pwdFromBD)) {
            if (password_verify($pwd, $pwdFromBD)) {
                //on peut accéder au site. Attention ni la vue ni la fonction ci-dessous n'existe pas encore
                //$resultats = getTypeRecette();
                //require "vue/vue_liste_recettes.php";
                $_SESSION['login'] = $login;
                accueil();
            } else {
                $msg_err= 'Le mot de passe est incorrect';
                require "vue/vue_login.php";
            }
        } else {
            $msg_err= 'Aucun utilisateur avec ce login n\'est défini pour cette application.';
            require "vue/vue_login.php";
        }
    } else {


        require "vue/vue_login.php";
    }

}

function film()
{
    require "vue/vue_films.php";
}
function photo()
{
    require "vue/vue_photos.php";
}
function docEnseignant()
{
    require "vue/vue_docEnseignant.php";
}
function rechercheDocEnseignant( $annee,$semaines)
{
    $resultats = array();
    $resultatsRecherche = GetAnnees($annee,$semaines);
    $fulldir = 'Donnees/DocEnseignant/'.$resultatsRecherche;
    $extensions = array("pdf");
    $test = getcwd (  );
    if(is_dir($fulldir))
    {
        if($dh = opendir(($fulldir)))
        {
            //Lecture du répertoire en entier (fichier et dossier confondus)
            while(($file = readdir($dh)) !== false)
            {
                //Verification de l'existence du fichier
                if(file_exists($fulldir.'/'.$file))
                {
                    $infoFichier = pathinfo($fulldir.'/'.$file);
                    if(is_dir($fulldir.'/'.$file))
                    {
                        //
                    }
                    else
                    {
                        $res = '<a href="index.php?action=afficherFichierDocEnseignant&fichier='.$fulldir.'/'.$file.'" >'.$file.'</a>';
                        array_push($resultats,$res);
                    }
                }
            }
        }
        closedir($dh);
    }
    else
    {
        $resultats = "Erreur";
    }
    require "vue/vue_docEnseignant.php";
}
function afficherRechercheDocEnseignant()
{
    require "vue/vue_docEnseignant.php";
}
function contenuPed()
{
    require "vue/vue_contenuPed.php";
}
function recette()
{
    require "vue/vue_recette.php";
}

function divers()
{
    //Contenu//
    $resultats = array();
    //recupère le type de filtre choisi
    if(isset($_GET['action']))
    {
        //Faire un tableau avec les extensions possibles; jpg,jpeg,png,gif
        $extensions = array("pdf");
        //le chemin du répertoire complet
        $fulldir = "data/Corbeille/Documentation";
        //si le répertoire existe
        if (is_dir($fulldir))
        {
            if ($dh = opendir($fulldir))
            {
                //on lit tout ce qui se trouve dans le dossier
                while (($file = readdir($dh)) !== false)
                {
                    if(file_exists($fulldir.'/'.$file))
                    {
                        $info = pathinfo($fulldir.'/'.$file);
                        if(is_dir($fulldir.'/'.$file))
                        {
                            //DO NOTHING
                        }
                        else if(in_array($info['extension'],$extensions) && isset($info['extension']))
                        {
                            $res = '<a href="index.php?action=afficherPDF&fichier='.$fulldir.'/'.$file.'" >'.$file.'</a>';
                            array_push($resultats,$res);
                        }
                    }
                }
                closedir($dh);
            }
        }
        require "vue/vue_divers.php";
    }
}
function afficherPDF()
{
    require "vue/vue_divers.php";
}


?>