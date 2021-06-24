<?php
    require_once ('../functions/organize.php');
    require_once ('../data/liste_transactions.php');
    $date = date("d/n/Y");
    $date = explode("/", $date);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle transaction</title>
</head>
<body>
    <h1>Nouvelle transaction</h1>
    <form action="../main/save-transaction.php" method="POST">
        <label for="">Destinataire
            <select name="destinataire" id="destinataire" required>
                <?php foreach($contacts as $position => $contact): ?>
                <option value="<?= $position ?>"><?= organizeName($contact["nom"], $contact["prenom"]) ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br>
        <label for="">Montant
            <input type="number" step="0.01">
        </label>
        <br>
        <label for="">Date d'exécution
            <input type="number" name="day" maxlength="2" max="31" value="<?= $date[0] ?>" required>
            <select name="mois">
                <?php foreach(range(1, 12) as $monthNumber): ?>
                    <option value="<?= $monthNumber ?>"  <?= (int)$date[1] === (int)$monthNumber ? 'selected' : '' ?> ><?= $monthNumber ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="year" maxlength="4" value="<?= $date[2] ?>" required>
        </label>
        <input type="hidden" value="<?= organizeName($contacts[0]["nom"], $contacts[0]["prenom"]) ?>">
    </form>
</body>
</html>