<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>




<h1>Créez un groupe de travail</h1>
<form action="createGroupe.php" method="post">
    <label>Nom du groupe:</label>
    <input id="nomG" name="nomG" type="text">
    <br/>
    <label>Avec combien de personnes voulez-vous travailler ?</label>
    <select name="nombre" id="nombre">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <p><input type="submit" value="OK"</p>
</form>


<form action="nameGroupe.php" method="post">
    <p>
        <?php
        for ($i=1;$i<$_POST['nombre']+1;$i++){
            echo "Nom de l'élève n°$i : ". "<input type='text' name='nom$i'><br/>";
        }
        ?>
    </p>


    <p><input type="submit" value="Entrée"</p>
</form>




</body>
</html>