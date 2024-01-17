<?php 

require_once("./constante.php");

$themes = $file_db->query('SELECT * FROM themes')->fetchAll(PDO::FETCH_KEY_PAIR);
$questionnaires = $file_db->query('SELECT * FROM questionnaire');

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <h1>Accueil</h1>
    <ul>
        <?php foreach ($questionnaires as $row) : ?>
            <li><?php echo $row['intitule'] ?>, theme : <?php echo $themes[$row['idTheme']] ?> <a href="#?quizz=<?php echo $row['intitule'] ?>">Faire le quizz</a></li>
        <?php endforeach; ?>
    </ul>
    <button onclick="window.location.href='#'">Créer un questionnaire</button>
    <button onclick="window.location.href='#'">Voir le leaderboard</button>
</body>
</html>