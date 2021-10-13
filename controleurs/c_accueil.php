<?php
/**
 * Gestion de l'accueil
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

//$motDePasse = rand(1000,9999);
//$to = 'admin@wampserver.com';
//$subject = 'Connection à votre GSB';
//$message = "Bonjour " . $_SESSION['prenom'] . "! Unes nouvelle connaxion a été identifié. Si c'est vous...";
     
if ($estConnecte) {
//    $message = "Bonjour " . $_SESSION['prenom'] . "! Unes nouvelle connaxion a été identifié. Si c'est vous...";
//    mail($to, $subject, $message);
    include 'vues/v_accueil.php';
} else {
    include 'vues/v_connexion.php';
}
