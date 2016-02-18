<?php
/**
 * Created by PhpStorm.
 * User: hadrien1
 * Date: 14/02/16
 * Time: 18:49
 */

require 'connect.php';

/*if( isset($_POST['num']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['promo']) ) {*/

    $sql = "INSERT INTO `Eleve`(`numEtudiant`, `nom`, `prenom`, `promo`) VALUES (" . $_POST['num'] . ",'" . $_POST['nom'] . "','" . $_POST['prenom'] . "'," . $_POST['promo'] . ")";
    $req = mysql_query($sql) or die(mysql_error());
/*} else {
    echo 'FAIL';
}*/
