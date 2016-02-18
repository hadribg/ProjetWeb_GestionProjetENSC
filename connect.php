<?php
/**
 * Created by PhpStorm.
 * User: hadrien1
 * Date: 09/02/16
 * Time: 08:37
 */
$SERVEUR    = "localhost";
$LOGIN      = "root";
$MDP        = "root";
$MABASE     = "projetWeb1A";
$BDD        = mysql_connect($SERVEUR,$LOGIN,$MDP,$MABASE);
mysql_selectdb("projetWeb1A");
mysql_query("SET NAMES UTF8") ;


?>