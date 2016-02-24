<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>



<p>
    Voulez-vous associer ce groupe à un projet existant ?<br/>
    <input type="radio" name="oui" id="oui"/>
    <label for="oui">Oui</label><br/>
    <input type="radio" name="oui" id="non"/>
    <label for="non">Non</label>
</p>



<?php
/*if(array_key_exists('oui',$_POST))
{*/
    if($_POST['oui']=="Oui")
    {

        echo '<form action="createGroupe.php" method="POST">';
        echo "<p>A quel projet voulez-vous l'associer ?";

        require ("connect.php");
        $MaRequeteProjet="SELECT numProjet,titre FROM Projet";
        $MonResProjet=mysqli_query($BDD,$MaRequeteProjet);
        echo "<select name='projet'>";
        echo "<option selected>-- Sélectionner le projet --</option>";
        while ($tuple=mysqli_fetch_array($MonResProjet)){
            echo "<option value='$tuple[projet]'>$tuple[projet]</option>";
        }
        echo "</p>";
        echo '<input type="submit" value="Entrée"/>';
        echo "</select></form>";
    }
//}


?>


</body>
</html>