<?php

require_once("./constante.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un questionnaire</title>
</head>
<body>
    <div class="container-sm mt-5 pt-5">
        <h1 class="text-center mb-5">Création d'un questionnaire</h1>
        <form action="creation_questions.php" method="get" class="container-sm">
            <div class="row">
                <div class="col form-floating mb-3">
                    <input type="text" name="intitule" id="intitule" class="form-control" required>
                    <label for="intitule">Intitulé du questionnaire</label>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="theme" class="form-label">Thème du questionnaire</label>
                    <select name="theme" id="theme" class="form-select">
                        <?php foreach ($themes as $id => $theme) : ?>
                            <option value="<?php echo $theme['idTheme'] ?>"><?php echo $theme['nomTheme'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="nbQuestions" class="form-label">Nombre de questions</label>
                    <input type="number" name="nbQuestions" id="nbQuestions" class="form-control" value="1" min="1">
                </div>
            </div>
            <input type="submit" value="Créer" class="btn btn-sm btn-success">
        </form>
    </div>

    <?php require_once("bootstrap.php"); ?>
</body>
</html>