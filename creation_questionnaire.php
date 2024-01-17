<?php

require_once("./constante.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Créer un questionnaire</title>
</head>
<body>
    <h1>Création d'un questionnaire</h1>
    <form action="creation_questions.php" method="get">
        <label for="intitule">Intitulé du questionnaire</label>
        <input type="text" name="intitule" id="intitule" required>
        <br>
        <label for="theme">Thème du questionnaire</label>
        <select name="theme" id="theme">
            <?php foreach ($themes as $id => $theme) : ?>
                <option value="<?php echo $theme['idTheme'] ?>"><?php echo $theme['nomTheme'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="nbQuestions">Nombre de questions</label>
        <input type="number" name="nbQuestions" id="nbQuestions" value="1" min="1">
        <br>
        <input type="submit" value="Créer">
    </form>
</body>
</html>