<?php
/**
 * Valide fiche de frais
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Erwan Lambert <>
 * @copyright 2021 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
$montants = 0;
switch ($action) {
    case 'selectionnerMois':
        if(empty($pdo->getLesMois())){
            ?></br><?php
            ajouterErreur("Aucune fiche de frais n'est à valider");
            include 'vues/v_erreurs.php';
            include 'vues/v_listeMoisComptable.php';
        }else{
            $lesMois = $pdo->getLesMois();
            $lesCles = array_keys($lesMois);
            $moisASelectionner = $lesCles[0];
            include 'vues/v_listeMoisComptable.php';
        }
        break;
    case 'selectionnerVisiteur':
        $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        $lesMois = $pdo->getLesMois();
        $moisASelectionner = $leMois;
        include 'vues/v_listeMoisComptable.php';
        $date = str_replace('/', '', filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING));
        trim($date);
        $_SESSION['date'] = $date;
        $lesVisiteurs = $pdo->getVisiteursFromMois($date);
        $selectedValue = $lesVisiteurs[0];
        if(empty($pdo->getVisiteursFromMois($date))){
            ?></br><?php
            ajouterErreur("Aucun visiteur n'a fais de fiche de frais ce mois-ci");
            include 'vues/v_erreurs.php';
        }else{
            include 'vues/v_selectVisiteur.php';
        }
        break;
    case 'validerFicheDeFrais' :
        $lesMois = $pdo->getLesMois();
        $moisASelectionner = $_SESSION['date'];
        include 'vues/v_listeMoisComptable.php';
        $leVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getVisiteursFromMois($_SESSION['date']);
        $selectedValue = $leVisiteur;
        include 'vues/v_selectVisiteur.php';
        $nomVis = (filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING));
        trim($nomVis);
        $_SESSION['nomVisiteur'] = $nomVis;
        $idVisiteur = $pdo->getIdFromNomVisiteur($nomVis);
        $_SESSION['visiteur'] = $idVisiteur['id'];
        $infoFicheDeFrais = $pdo->getLesInfosFicheFrais($_SESSION['visiteur'], $_SESSION['date']);
        $infoFraisForfait = $pdo->getLesFraisForfait($_SESSION['visiteur'], $_SESSION['date']);
        $infoFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['visiteur'], $_SESSION['date']);
        include 'vues/v_valideFrais.php';
}
?>