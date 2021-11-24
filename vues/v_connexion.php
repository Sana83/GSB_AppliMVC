<?php
/**
 * Vue Connexion
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
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Identification utilisateur</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" 
                      action="index.php?uc=connexion&action=valideConnexion">
                    <fieldset>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input class="form-control" placeholder="Login"
                                       name="login" type="text" maxlength="45" value="thoarau">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                <input class="form-control"
                                       placeholder="Mot de passe" name="mdp"
                                       type="password" maxlength="45" value="owxep5">
                            </div>
                        </div>
                        <input class="btn btn-lg btn-success btn-block"
                               type="submit" value="Se connecter">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!--    <div class="idDemo">
        <table>
            <tr>
            <th></th>
                <td class="titre">Login </td>
                <td class="titre">Mot de passe</td>
            </tr>
            <tr>
                <td class="titre">Comptable </td>
                <td> thoarau</td>
                <td> owxep5</td>
            </tr>
            <tr>
                <td class="titre">Visiteur</td>
                <td>dandre</td>
                <td>opgg5</td>
            </tr>
        </table>
    </div>-->
<!--<link href="./styles/bootstrap/bootstrapComptable.css" rel="stylesheet">
            <link href="./styles/style.css" rel="stylesheet">-->
<link href="stylesheet" href="./styles/cssLogin.css">
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Login</th>
                <th>Mot de passe</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Comptable</td>
                <td>thaoarau</td>
                <td>owxep5</td>
            </tr>
            <tr>
                <td>Visiteur</td>
                <td>dandre</td>
                <td>oppg5</td>
            </tr>
        </tbody>
    </table>