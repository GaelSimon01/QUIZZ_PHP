<?php
require_once("./constante.php");

$intitule=$_GET["Q"];
$scores=$file_db->query("select * from score where intitule='".$intitule."' group by nomJoueur order by point DESC")

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
    <div class="container-sm mt-5 pt-5">
        <h1 class="text-center mb-5">Leaderboard</h1>
        <div class="wrapper">
        <table>
            <tr>
            <th>pseudo</th>
            <th>points</th>
            </tr>
            <?php
            foreach($scores as $score){
                echo "<tr><td>".$score["nomJoueur"]."</td><td>".$score["point"]."</td></tr>";
            }
            ?>
        </table>
        </div>
    </div>

    <?php require_once("bootstrap.php"); ?>
</body>
</html>