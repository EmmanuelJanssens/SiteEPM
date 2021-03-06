<?php

require  'controleur/controleur.php';

try
{
    if (isset($_GET['action']))
    {
        $action = $_GET['action'];

        switch ($action)
        {
            case 'welcome' :
                accueil(); //appel de la fonction dans le controleur
                break;
            case 'login' :
                login(); //appel de la fonction dans le controleur
                break;
            case 'divers':
                divers();
                break;
            case 'photos':
                photos();
                break;
            case 'film':
                film();
                break;
            case 'docEnseignant':
                docEnseignant();
                break;
            case 'afficherFichierDocEnseignant':
                afficherRechercheDocEnseignant();
                break;
                case 'rechercheDocEnseignant':
                if(isset($_POST['annee']))
                {
                    rechercheDocEnseignant($_POST['annee']);
                }
                else
                {
                    accueil();
                }
                break;
            case 'contenuPed':
                contenuPed();
                break;
            case 'recette':
                recette();
                break;
            case 'afficherContenuDivers':
            afficherContenuDivers();
                break;

            default :
                throw new Exception("action non valide");
        }
    }
    else
        accueil();  // Si aucune action n’est envoyée dans l’URL

}
catch (Exception $e)
{
    echo($e->getMessage());
}
?>
