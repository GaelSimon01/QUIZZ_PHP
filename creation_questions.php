<?php 

require_once("./constante.php");


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Créer les questions</title>
</head>
<body>
    <h1>Créer les questions</h1>
    <form action="insert_question.php" method="get">
        <input type="hidden" name="intitule" value="<?php echo $_GET['intitule'] ?>">
        <input type="hidden" name="theme" value="<?php echo $_GET['theme'] ?>">
        <?php for ($i = 0; $i < $_GET['nbQuestions']; $i++) : ?>
            <label for="question_<?php echo $i ?>">Question <?php echo $i + 1 ?></label>
            <input type="text" name="question_<?php echo $i ?>" id="question_<?php echo $i ?>" required>
            <br>
            <label for="type_<?php echo $i ?>">Type de question</label>
            <select name="type_<?php echo $i ?>" id="type_<?php echo $i ?>">
                <option value="1">Choix multiple</option>
                <option value="2">Choix unique</option>
            </select>
            <div id="rep<?php echo $i?>">
                <label for="reponse_<?php echo $i . 1 ?>">Réponse</label>
                <input type="text" name="reponse_<?php echo $i . 1 ?>" id="reponse_<?php echo $i . 1 ?>" required>
                <label for="estBonne_<?php echo $i . 1 ?>">Bonne réponse ?</label>
                <input type="checkbox" name="estBonne_<?php echo $i . 1 ?>" id="estBonne_<?php echo $i . 1 ?>">
                <br>
            </div>
            <input type="button" value="Ajouter une réponse" onclick="addReponse(<?php echo $i ?>)">
            <br>
        <?php endfor; ?>
        <input type="submit" value="Créer">
    </form>

    <script>
        function addReponse(idQuestion) {
            var new_label = document.createElement("label");
            var new_reponse = document.createElement("input");
            var new_label_bonne = document.createElement("label");
            var new_est_bonne = document.createElement("input");
            var new_br = document.createElement("br");

            new_label.for = "reponse_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_label.innerHTML = "Réponse";

            new_reponse.type = "text";
            new_reponse.name = "reponse_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_reponse.id = "reponse_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_reponse.required = true;

            new_label_bonne.for = "estBonne_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_label_bonne.innerHTML = "Bonne réponse ?";

            new_est_bonne.type = "checkbox";
            new_est_bonne.name = "estBonne_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_est_bonne.id = "estBonne_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;

            document.getElementById("rep"+idQuestion).appendChild(new_label);
            document.getElementById("rep"+idQuestion).appendChild(new_reponse);
            document.getElementById("rep"+idQuestion).appendChild(new_label_bonne);
            document.getElementById("rep"+idQuestion).appendChild(new_est_bonne);
            document.getElementById("rep"+idQuestion).appendChild(new_br);
        }
    </script>
</body>
</html>