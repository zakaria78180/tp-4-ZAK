<?php
$action=$_GET['action'];
switch($action){
    case 'list' :
        $nationaliteSel="";
        $libelleSaisie="";
        if(!empty($_POST['nationalite'])){
            $nationaliteSel=$_POST['nationalite'];
        }
        if(!empty($_POST['libelle'])){
            $libelleSaisie=$_POST['libelle'];
        }
        $lesnationalites=Nationalite::findAll($libelleSaisie,$nationaliteSel);
        include('vues/listeNationalites.php');
    break;
    
    case 'add' :
        $mode="Ajouter";
        $lesContinents=Continent::findAll();
        include('vues/formNationalite.php');
    break;

    case 'update' :
        $mode="Modifier";
        $lesContinents=Continent::findAll();
        $nationalite=Nationalite::findById($_GET['num']);
        include('vues/formNationalite.php');
    break;

    case 'delete' :
        $nationalite=Nationalite::findById($_GET['num']);
        $nb=Nationalite::delete($nationalite);
        if($nb==1){
            $_SESSION['message']=["success"=>"La nationalite a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"La nationalite n'a pas été supprimé"];
        } 
        header('location: index.php?uc=nationalites&action=list');
            exit();
    break;

    case 'valideForm' :
    $nationalite= new Nationalite();
    $continent=Continent::findById($_POST['continent']);
    if(empty($_POST['num'])){
        $nationalite->setLibelle($_POST['libelle']);
        $nationalite->setContinent($continent);
        $nb=Nationalite::add($nationalite);
        $message = "ajouter";
    }else{
        $nationalite->setNum($_POST['num']);
        $nationalite->setLibelle($_POST['libelle']);
        $nationalite->setContinent($_POST['continent']);
        $nb=Nationalite::update($nationalite);
        $message = "modifié";
    }
    if($nb==1){
        $_SESSION['message']=["success"=>"La nationalite a bien été $message"];
    }else{
        $_SESSION['message']=["danger"=>"La nationalite n'a pas été $message"];
    } 
    header('location: index.php?uc=nationalites&action=list');
        exit();
    break;
}