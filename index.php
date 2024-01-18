<?php 

require_once("./constante.php");


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <div class="container-sm mt-5 pt-5">
        <h1 class="mb-5 text-center">Accueil</h1>
        <ul class="list-group list-group-flush mb-3">
            <?php foreach ($questionnaires_object as $id => $questionnaire) : ?>
                <?php 
                    $theme = array_filter($themes, function ($theme) use ($questionnaire) {
                        return $theme['idTheme'] == $questionnaire->getTheme();
                    })[0];
                ?>
                <li class="list-group-item">
                    <?php echo $questionnaire->getLibelle() ?>, theme : <?php echo $theme["nomTheme"] ?> 
                    <div class="btn-group">
                        <a href="quizz.php?quizz=<?php echo $questionnaire->getLibelle() ?>" class="btn btn-sm btn-primary">Faire le quizz</a>
                        <a href="leaderboard.php?Q=<?php echo $questionnaire->getLibelle() ?>" class="btn btn-sm btn-secondary">Acceder au score</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <button onclick="window.location.href='creation_questionnaire.php'" class="btn btn-sm btn-success">Créer un questionnaire</button>
    </div>
    <?php require_once("bootstrap.php"); ?>
</body>
</html>