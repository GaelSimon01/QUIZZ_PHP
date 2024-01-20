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
    <div class="container-sm mt-5 pt-5">
        <h1 class="text-center mb-5">Créer les questions</h1>
        <form action="insert_question.php" method="get">
            <input type="hidden" name="intitule" value="<?php echo $_GET['intitule'] ?>">
            <input type="hidden" name="theme" value="<?php echo $_GET['theme'] ?>">
            <?php for ($i = 0; $i < $_GET['nbQuestions']; $i++) : ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="question_<?php echo $i ?>" class="form-label">Question <?php echo $i + 1 ?></label>
                        <input type="text" name="question_<?php echo $i ?>" id="question_<?php echo $i ?>" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="type_<?php echo $i ?>" class="form-label">Type de question</label>
                        <select name="type_<?php echo $i ?>" id="type_<?php echo $i ?>" class="form-select"">
                            <option value="1">Choix multiple</option>
                            <option value="2">Choix unique</option>
                        </select>
                    </div>
                </div>
                <div id="rep<?php echo $i?>">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="reponse_<?php echo $i . 1 ?>" class="form-label">Réponse</label>
                            <input type="text" name="reponse_<?php echo $i . 1 ?>" id="reponse_<?php echo $i . 1 ?>" class="form-control" required>
                            <label for="estBonne_<?php echo $i . 1 ?>" class="form-check-label">Bonne réponse ?</label>
                            <input type="checkbox" name="estBonne_<?php echo $i . 1 ?>" id="estBonne_<?php echo $i . 1 ?>" class="form-check-input">
                        </div>
                    </div>
                </div>
                <input type="button" value="Ajouter une réponse" onclick="addReponse(<?php echo $i ?>)" class="btn btn-sm btn-secondary">
            <?php endfor; ?>
            <input type="submit" value="Créer" class="btn btn-sm btn-success">
        </form>
    </div>

    <script>
        function addReponse(idQuestion) {
            var new_label = document.createElement("label");
            var new_reponse = document.createElement("input");
            var new_label_bonne = document.createElement("label");
            var new_est_bonne = document.createElement("input");

            var new_col = document.createElement("div");
            var new_row = document.createElement("div");

            new_label.for = "reponse_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_label.innerHTML = "Réponse";
            new_label.className = "form-label";

            new_reponse.type = "text";
            new_reponse.name = "reponse_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_reponse.id = "reponse_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_reponse.required = true;
            new_reponse.className = "form-control";

            new_label_bonne.for = "estBonne_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_label_bonne.innerHTML = "Bonne réponse ?";
            new_label_bonne.className = "form-check-label";

            new_est_bonne.type = "checkbox";
            new_est_bonne.name = "estBonne_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_est_bonne.id = "estBonne_" + idQuestion + "" + document.querySelectorAll("input[type=text]").length;
            new_est_bonne.className = "form-check-input";

            new_col.className = "col";
            new_row.className = "row mb-3";
            
            new_col.appendChild(new_label);
            new_col.appendChild(new_reponse);
            new_col.appendChild(new_label_bonne);
            new_col.appendChild(new_est_bonne);

            new_row.appendChild(new_col);

            document.getElementById("rep"+idQuestion).appendChild(new_row);
        }
    </script>


    <?php require_once("bootstrap.php"); ?>
</body>
</html>