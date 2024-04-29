<?php ob_start();
session_start();

include("vues/header.php");
include("modeles/Continent.php");
include("modeles/Auteur.php");
include("modeles/Genre.php");
include("modeles/Nationalite.php");
include("modeles/MonPdo.php");
include("vues/messagesFlash.php");

$uc =empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil' :
        include('vues/accueil.php');
    break;
    case 'continents' :
        include('Controllers/continentController.php');
    break;
    case 'auteurs' :
        include('Controllers/auteurController.php');
    break;
     case 'genres' :
        include('Controllers/genreController.php');
    break;
    case 'nationalites' :
        include('Controllers/nationaliteController.php');
    break;
}
include("vues/footer.php");
?>