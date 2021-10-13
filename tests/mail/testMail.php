
<?php
//     $to = 'admin@wampserver.com';
//     $subject = 'Connection à votre GSB';
//     $message = 'Bonjour ! une nouvelle connection a été détécté!';
//     
//if ($estConnecte){
//     mail($to, $subject, $message);
//     include 'vues/v_accueil.php';
//}else{
//    include 'vues/v_connexion.php';
//}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

     // Plusieurs destinataires
     $to  = 'johny@example.com, sally@example.com'; // notez la virgule

     // Sujet
     $subject = 'Calendrier des anniversaires pour Aout';

     // message
     $message = '
     <html>
      <head>
       <title>Calendrier des anniversaires pour Aout</title>
      </head>
      <body>
       <p>Voici les anniversaires a venir au mois d\'Aout !</p>
       <table>
        <tr>
         <th>Personne</th><th>Jour</th><th>Mois</th><th>Annee</th>
        </tr>
        <tr>
         <td>Josiane</td><td>3</td><td>Aout</td><td>1970</td>
        </tr>
        <tr>
         <td>Emma</td><td>26</td><td>Aout</td><td>1973</td>
        </tr>
       </table>
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
     $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
     $headers[] = 'From: Anniversaire <anniversaire@example.com>';
     $headers[] = 'Cc: anniversaire_archive@example.com';
     $headers[] = 'Bcc: anniversaire_verif@example.com';

     // Envoi
     mail($to, $subject, $message, implode("\r\n", $headers));
?>