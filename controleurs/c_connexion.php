<?php

/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
//$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
//if (!$uc) {
//    $uc = 'demandeconnexion';
//}
//
//switch ($action) {
//    case 'demandeConnexion':
//        include 'vues/v_connexion.php';
//        break;
//    case 'valideConnexion':
//        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
//        $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
//        $visiteur = $pdo->getInfosVisiteur($login, $mdp);
//        $comptable = $pdo->getInfosComptable($login, $mdp);
//        if (!is_array($visiteur) and !is_array($comptable) ) {
//            ajouterErreur('Login ou mot de passe incorrect');
//            include 'vues/v_erreurs.php';
//            include 'vues/v_connexion.php';
//        } elseif (is_array($visiteur) and !is_array($comptable)) {
//            $id = $visiteur['id'];
//            $nom = $visiteur['nom'];
//            $prenom = $visiteur['prenom'];
//            connecter($id, $nom, $prenom, 'visiteur');
//            //header('Location: index.php');
//            $email = $visiteur['email'];
//            $code = rand(1000, 9999);
//            $pdo->setCodeA2f($id,$code);
//            mail($email, '[GSB-AppliFrais] Code de vérification', "Code : $code");
//            include 'vues/v_code2facteurs.php';
//        
//        } else {
//            $id = $comptable['id'];
//            $nom = $comptable['nom'];
//            $prenom = $comptable['prenom'];
//            connecterComptable($id, $nom, $prenom, 'comptable');
//            //header('Location: index.php');
//            $email = $comptable['email'];
//            $code = rand(1000, 9999);
//            $pdo->setCodeA2fComptable($id,$code);
//            mail($email, '[GSB-AppliFrais] Code de vérification', "Code : $code");
//            include 'vues/v_code2facteurs.php';
//        }
//        break;
//
//    case 'valideA2fConnexion':
//        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
//        if ($pdo->getCodeVisiteur($_SESSION['idVisiteur']) !== $code) {
//            ajouterErreur('Code de vérification incorrect');
//            include 'vues/v_erreurs.php';
//            include 'vues/v_code2facteurs.php';
//        }else {
//            connecterA2f($code);
//            header('Location: index.php');
//        }
//        break;
//    case 'valideA2fConnexionComptable':
//    $codeComptable = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
//    if ($pdo->getCodeComptable($_SESSION['idComptable']) !== $codeComptable) {
//        ajouterErreur('Code de vérification incorrect');
//        include 'vues/v_erreurs.php';
//        include 'vues/v_code2facteursComptable.php';
//    } else {
//        connecterA2f($codeComptable);
//        $message = "(Comptable) Bonjour " . $_SESSION['prenom'] . " ! Une nouvelle connexion a été identifié. Si c'est vous....";
//        mail("admin@wampserver.com", "Connexion GSB", $message);
//        header('Location: index.php');
//    }
//    break;
//    
//    default:
//        include 'vues/v_connexion.php';
//        break;
//}

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $visiteur = $pdo->getInfosVisiteur($login, $mdp);
    $comptable = $pdo->getInfosComptable($login, $mdp);
    if ((!password_verify($mdp,$pdo->getMdpVisiteur($login))) and (!password_verify($mdp,$pdo->getMdpComptable($login)))) {
        ajouterErreur('Login ou mot de passe incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    } elseif ((password_verify($mdp, $pdo->getMdpVisiteur($login))) and (!password_verify($mdp,$pdo->getMdpComptable($login)))) {
        $id = $visiteur['id'];
        $nom = $visiteur['nom'];
        $prenom = $visiteur['prenom'];
        connecter($id, $nom, $prenom);
        //header('Location: index.php');
        $email = $visiteur['email'];
        $code = rand(1000, 9999);
        $pdo->setCodeA2f($id,$code);
        mail($email, '[GSB-AppliFrais] Code de vérification', "Code : $code");
        include 'vues/v_code2facteurs.php';
    } elseif ((!password_verify($mdp, $pdo->getMdpVisiteur($login))) and (password_verify($mdp,$pdo->getMdpComptable($login)))) {
        $idComptable = $comptable['id'];
        $nomComptable = $comptable['nom'];
        $prenomComptable = $comptable['prenom'];
        connecterComptable($idComptable, $nomComptable, $prenomComptable);
        $emailComptable = $comptable['email'];
        $codeComptable = rand(1000, 9999);
        $pdo->setCodeA2fComptable($idComptable, $codeComptable);
        mail($emailComptable, '[GSB-AppliFrais] (Comptable) Code de vérification', "Code : $codeComptable");
        include 'vues/v_code2facteursComptable.php';
    }
    break;
case 'valideA2fConnexion':
    $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
    if ($pdo->getCodeVisiteur($_SESSION['idVisiteur']) !== $code) {
        ajouterErreur('Code de vérification incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_code2facteurs.php';
    } else {
        connecterA2f($code);
        $message = "Bonjour " . $_SESSION['prenom'] . " ! Une nouvelle connexion a été identifié. Si c'est vous....";
        mail("admin@wampserver.com", "Connexion GSB", $message);
        header('Location: index.php');
    }
    break;
case 'valideA2fConnexionComptable':
    $codeComptable = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
    if ($pdo->getCodeComptable($_SESSION['idComptable']) !== $codeComptable) {
        ajouterErreur('Code de vérification incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_code2facteursComptable.php';
    } else {
        connecterA2f($codeComptable);
        $message = "(Comptable) Bonjour " . $_SESSION['prenom'] . " ! Une nouvelle connexion a été identifié. Si c'est vous....";
        mail("admin@wampserver.com", "Connexion GSB", $message);
        header('Location: index.php');
    }
    break;
default:
    include 'vues/v_connexion.php';
    break;
}