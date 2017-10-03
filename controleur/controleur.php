
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
    function divers()
    {
        require "vue/vue_divers.php";
    }
    function film()
    {
        require "vue/vue_films.php";
    }
    function photos()
    {
        require "vue/vue_photos.php";
    }
    function docEnseignant()
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

    function filtrerPhotos()
    {
        //Contenu//

        $resultat = array();
        //recupère le type de filtre choisi
        if(isset($_GET['type']))
        {
            $dir = "";
            switch($_GET['type'])
            {
                case 'grandsChefs':
                    $dir = "grandChefs";
                    break;
                case 'appPratique';
                    $dir = "applicationPratique/".$_GET['annee'];
                    break;
            }
            //Faire un tableau avec les extensions possibles; jpg,jpeg,png,gif
            $extensions = array("jpg","jpeg","png","gif","JPG");

            //le chemin du répertoire complet
            $fulldir = "images/".$dir;
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
                                $res = '<a href="index.php?action=filtrerPhotos&image='.$fulldir.'/'.$file.'" > <img src="'.$fulldir.'/'.$file.'" style ="width: 100px; height :100px"></a>';
                                array_push($resultat,$res);
                            }
                        }
                    }
                    closedir($dh);
                }
            }
            require "vue/vue_photos.php";
        }
        if(isset($_GET['image']))
        {
            $img = $_GET['image'];
            $resultat ='<img src="'.$img.'"  style ="width: 400px; height :auto" >';
            require "vue/vue_photos.php";
        }
    }
    ?>