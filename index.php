<?php
    require_once("./class/Question.php");
    require_once("./class/LoadJSON.php");
    require_once("./constante.php");

    $rep = $_POST;
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
    <form action="result.php" method="post">
        <?php
        foreach ($questionnaire->getQuestions() as $question)
            echo $question->render();
        ?>
        <br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>