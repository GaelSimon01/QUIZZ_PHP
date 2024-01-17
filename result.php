<?php
    require_once("./model/Question.php");
    require_once("./constante.php");

    if (!isset($_GET)) {
        header("Location: index.php");
        exit;
    }

    $rep = $_GET;

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
    <title>Résultat</title>
</head>
<body>
    <div class="container-sm mt-5 pt-5">
        <h1 class="mb-3  text-center">Voici le résultat du questionnaire</h1>
        <div class="mb-5 border rounded p-5">
            <?php
                foreach ($questionnaire->getQuestions() as $question)
                    echo $question->render(true) . "<br>" . $question->getResult($rep[$question->getId()]) . "<br>";
            ?>
        </div>
        <a href="quizz.php?quizz=<?php echo $_GET['quizz'] ?>" class="ms-3">Refaire le quizz ?</a>
        <p class="m-3">Votre score : <?php echo $questionnaire->get_score($rep) ?></p>
        <form action="enregistrer_score.php" method="get" class="container">
            <input type="hidden" name="score" value="<?php echo $questionnaire->get_score($rep) ?>">
            <input type="hidden" name="quizz" value="<?php echo $questionnaire->getLibelle() ?>">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" name="prenom" id="prenom" class="form-control" required>
                        <label for="prenom">Votre prénom :</label>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col d-grid gap-2">
                    <input type="submit" value="Enregistrer votre score ?" class="btn btn-sm btn-success">
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </form>
    </div>

    <?php require_once("bootstrap.php") ?>
</body>
</html>