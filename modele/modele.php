<?php
/**
 * Created by PhpStorm.
 * User: Corentin.BOMPARD
 * Date: 05.09.2017
 * Time: 14:01
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
    $requete = "SELECT idUser, pwd FROM login WHERE login='" . $login . "'";
    $resultats = $connexion->query($requete);
    if ($donnees = $resultats->fetch()) {
        return $donnees['pwd'];
    } else {
        return '';
    }
}

function getPhotos()
{

}
function getAnnee()
{
    $connexion = getBD();
    $requete = "SELECT Annee FROM Classe";
    $resultats = $connexion->query($requete);
    return $resultats;
}
function getTypeFilm()
{
    $connexion = getBD();
    $requete = "SELECT Nom FROM type_film";
    $resultats = $connexion->query($requete);
    return $resultats;
}