<?php 

require_once("./constante.php");


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
        <?php foreach ($questionnaires_object as $id => $questionnaire) : ?>
            <?php 
                $theme = array_filter($themes, function ($theme) use ($questionnaire) {
                    return $theme['idTheme'] == $questionnaire->getTheme();
                })[0];
            ?>
            <li><?php echo $questionnaire->getLibelle() ?>, theme : <?php echo $theme["nomTheme"] ?> <a href="quizz.php?quizz=<?php echo $questionnaire->getLibelle() ?>">Faire le quizz</a><a href="leaderboard.php?Q=<?php echo $questionnaire->getLibelle() ?>"><button>acceder au score</button></a></li>
        <?php endforeach; ?>
    </ul>
    <button onclick="window.location.href='creation_questionnaire.php'">Créer un questionnaire</button>
    <button onclick="window.location.href='#'">Voir le leaderboard</button>
</body>
</html>