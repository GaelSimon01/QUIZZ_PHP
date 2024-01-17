<?php
    require_once("./model/Question.php");
    require_once("./constante.php");

    if (!isset($_GET['quizz'])) {
        header("Location: accueil.php");
        exit;
    }

    foreach ($questionnaires_object as $q) {
        if ($q->getLibelle() == $_GET['quizz'])
            $questionnaire = $q;
    }
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
    <h1>Répondez aux questions</h1>
    <form action="result.php" method="get">
        <input type="hidden" name="quizz" value="<?php echo $questionnaire->getLibelle() ?>">
        <?php
        foreach ($questionnaire->getQuestions() as $question)
            echo $question->render();
        ?>
        <br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>