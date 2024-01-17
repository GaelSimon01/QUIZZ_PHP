<?php
    require_once("./class/Question.php");
    require_once("./constante.php");

    if (!isset($_POST)) {
        header("Location: index.php");
        exit;
    }

    $rep = $_POST;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Résultat</title>
</head>
<body>
    <h1>Voici le résultat du questionnaire</h1>
    <?php
        foreach ($questionnaire->getQuestions() as $question) 
            echo $question->render(true) . "<br>" . $question->getResult($rep[$question->getId()]) . "<br>";
    ?>
    <a href="index.php">Refaire le quizz ?</a>
    <p>Votre score : <?php echo $questionnaire->get_score($rep) ?></p>
</body>
</html>