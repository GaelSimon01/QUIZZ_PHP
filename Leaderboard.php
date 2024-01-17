<?php
require_once("./constante.php");
$intitule=$_GET["Q"];
$scores=$file_db->query("select * from score where intitule='".$intitule."'")

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Questionnaire</title>
</head>
<body>
    <h1>Leaderboard</h1>
    <ul>
        <?php
        foreach($scores as $score){
            echo "<li> pseudo : ".$score["nomJoueur"]."| score : ".$score["point"]."</li>";
        }
        ?>
    </ul>
</body>
</html>