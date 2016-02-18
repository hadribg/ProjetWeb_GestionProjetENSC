<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script type="text/javascript" src="bootstrap-datepicker.js"></script>
</head>

<?php
/**
 * Created by PhpStorm.
 * User: hadrien1
 * Date: 14/02/16
 * Time: 18:28
 */

require 'connect.php';

$sql = "SELECT * FROM Eleve WHERE 1";
$req = mysql_query($sql) or die (mysql_error());

while ($res = mysql_fetch_array($req)) {
    ?>
    <h2><?php echo $res['prenom']." ".$res['nom'] ?></h2>
    <?php
}
?>

<h1>Entrez un nouvel élève</h1>
<form action="addEleve.php" method="post">
    <label>Prénom</label>
    <input id="prenom" name="prenom" type="text">
    <br>
    <label>Nom</label>
    <input id="nom" name="nom" type="text">
    <br>
    <label>Numéro étudiant</label>
    <input id="num" name="num" type="text">
    <br>
    <label>Promo</label>
    <input id="promo" name="promo" type="text">
    <br>
    <input id="submitAddEleve" type="button" value="Ajouter">
</form>

<?php
// Récupération de tous les modules
$sql = "SELECT * FROM MODULE WHERE 1";
$req = mysql_query($sql) or die (mysql_error());
?>

<h1>Entrez un nouveau projet</h1>
<form action="addProjet.php" method="post">
    <label>Module Correspondant :</label>
    <div id="choixModuleWrapper">
        <select name="module1" id="choixModule1">
            <option>-- Sélectionnez un module pour le projet --</option>
            <?php
            while ($res = mysql_fetch_array($req)) {
                ?>
                <option><?php echo $res['nomModule']." - ".$res['refModule'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <span style="display: none" id="addModule">Ajouter un module au projet</span>
    <br>
    <label>Titre du projet</label>
    <input id="titre" name="titre" type="text">
    <br>
    <label>Date de début</label>
    <input id="dateDebut" name="dateDebut" type="text">
    <div class="input-group date" data-provide="datepicker">
        <input type="text" class="form-control datepicker">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
    <br>
    <label>Date de fin</label>
    <input id="dateFin" name="dateFin" type="text">
    <br>
    <label>Type</label>
    <input id="type" name="type" type="text">
    <br>
    <label>Fichiers d'entrée</label>
    <input id="fichierEntree" name="fichierEntree" type="text">
    <br>
    <label>Lien Moodle</label>
    <input id="lienMoodle" name="lienMoodle" type="text">
    <br>


    <input id="submitAddProjet" type="button" value="Ajouter">
</form>

<script type="text/javascript">
    $(document).ready(function(){
        // JQuery relatif aux elèves
        // Ajout dynamique d'un élève dans la BDD
        $("#submitAddEleve").click(function(){
            $.post(
                'addEleve.php', // Le script PHP que l'on va appeler
                {
                    promo : $("#promo").val(),  // Nous récupérons la valeur de nos inputs que l'on fait passer à addEleve.php
                    prenom : $("#prenom").val(),
                    nom : $("#nom").val(),
                    num : $("#num").val()
                },
                function(data){
                   // var n = noty({text: 'Élève ajouté !'});
                    alert("Eleve ajouté ! ");
                },
                'text'
            );
        });

        // JQuery relatif aux projets
        var select = $("#choixModule1").html();     // string contenant un sélect de tous les modules de la BDD
        var nbModules = 1;                          // Nombre courant de modules du projet

        // Possibilité d'ajouter un module quand on en sélectionne un
        $("#choixModule1").change(function(){
            if ($('#choixModule1 option:selected').text() != "-- Sélectionnez un module pour le projet --") {
                $("#addModule").css("display","inline");
            } else {
                $("#addModule").css("display","none");
            }
        });

        // Ajout de noeud HTML pour sélectionner un autre module
        $("#addModule").click(function(){
            nbModules++;
            $("#choixModuleWrapper").append("<select name='module"+nbModules+"' id='choixModule"+nbModules+"'>" + select+ "</select>");
        });

        // Options de datePicker
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            language: 'fr'
        });
    });
</script>
</html>