<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel.JANSSENS
 * Date: 05.09.2017
 * Time: 14:02
 */
session_start();
// connexion au serveur MySQL et à la BD
// sortie : $connexion
function getBD() {
    $connexion = new PDO('mysql:host=localhost;dbname=epm;charset=utf8', 'root', '');
    // permet d'avoir plus de détails sur les erreurs retournées
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connexion;

}

//Fonction : vérifie le login de l'utilisateur
//Sortie : résultat de la requête
function getPwdFromLogin($login)
{
    $connexion = getBD();
    $requete = "SELECT idLogin, motDePasse FROM login WHERE login='" . $login . "'";
    $resultats = $connexion->query($requete);
    if ($donnees = $resultats->fetch()) {
        return $donnees['motDePasse'];
    } else {
        return '';
    }
}
//Fonction: recherche d'années scolaires dans la base de données
function GetAnnees($annee,$semaine)
{
    $connexion = getBD();
    $requete = "SELECT annee, idClasse FROM classe WHERE annee ='". $annee."'";
    $resultats = $connexion->query($requete);
    if($donnees = $resultats->fetch())
    {
        return $donnees['annee'];
    }else
    {
        return 'tu es nul ';
    }
}
?>