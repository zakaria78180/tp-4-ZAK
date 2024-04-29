<?php
$action=$_GET['action'];
switch($action){
    case 'list' :
        $auteurSel="";
        $libelleSaisie="";
        if(!empty($_POST['auteur'])){
            $auteurSel=$_POST['auteur'];
        }
        if(!empty($_POST['libelle'])){
            $libelleSaisie=$_POST['libelle'];
        }
        $lesauteurs=Auteur::findAll( $auteurSel,$libelleSaisie);
        include('vues/listeAuteurs.php');
    break;

    case 'add' :
        $mode="Ajouter";
        include('vues/formAuteur.php');
    break;

    case 'update' :
        $mode="Modifier";
        $auteur=Auteur::findById($_GET['num']);
        include('vues/formAuteur.php');
    break;

    case 'delete' :
        $auteur=Auteur::findById($_GET['num']);
        $nb=Auteur::delete($auteur);
        if($nb==1){
            $_SESSION['message']=["success"=>"L'auteur a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"L'auteur n'a pas été supprimé"];
        } 
        header('location: index.php?uc=auteur&action=list');
            exit();
    break;

    case 'valideForm' :
    $auteur= new Auteur();
    if(empty($_POST['num'])){
        $auteur->setLibelle($_POST['libelle']);
        $nb=Auteur::add($auteur);
        $message = "ajouter";
    }else{
        $auteur->getNum($_POST['num']);
        $auteur->setLibelle($_POST['libelle']);
        $nb=Auteur::update($auteur);
        $message = "modifié";
    }
    if($nb==1){
        $_SESSION['message']=["success"=>"L'auteur a bien été $message"];
    }else{
        $_SESSION['message']=["danger"=>"L'auteur n'a pas été $message"];
    } 
    header('location: index.php?uc=auteur&action=list');
        exit();
    break;
}