<?php
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
    <title>Questionnaire</title>
</head>
<body>
    <div class="container-sm mt-5 pt-5">
        <h1 class="mb-3 text-center">Répondez aux questions</h1>
        <form action="result.php" method="get" class="mb-5 border rounded p-5">
            <input type="hidden" name="quizz" value="<?php echo $questionnaire->getLibelle() ?>">
            <?php
            foreach ($questionnaire->getQuestions() as $question)
                echo $question->render();
            ?>
            <br>
            <input type="submit" value="Envoyer"class="btn btn-sm btn-success">
        </form>
    </div>


    <?php require_once("bootstrap.php"); ?>
</body>
</html>