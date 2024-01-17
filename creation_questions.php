<?php 

require_once("./constante.php");


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer les questions</title>
</head>
<body>
    <h1>Créer les questions</h1>
    <form action="">
        <?php for ($i = 0; $i < $_GET['nbQuestions']; $i++) : ?>
            <label for="question<?php echo $i ?>">Question <?php echo $i + 1 ?></label>
            <input type="text" name="question<?php echo $i ?>" id="question<?php echo $i ?>" required>
            <br>
            <label for="reponse<?php echo $i ?>">Réponse</label>
            <input type="text" name="reponse<?php echo $i ?>" id="reponse<?php echo $i ?>" required>
            <br>
            <label for="choix<?php echo $i ?>">Choix</label>
            <input type="text" name="choix<?php echo $i ?>" id="choix<?php echo $i ?>" required>
            <br>
            <label for="choix<?php echo $i ?>">Choix</label>
            <input type="text" name="choix<?php echo $i ?>" id="choix<?php echo $i ?>" required>
            <br>
            <label for="choix<?php echo $i ?>">Choix</label>
            <input type="text" name="choix<?php echo $i ?>" id="choix<?php echo $i ?>" required>
        <?php endfor; ?>
    </form>
</body>
</html>