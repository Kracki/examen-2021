<?php
    require_once('../functions/organize.php');
    require_once('../data/liste_transactions.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Liste des transactions</title>
</head>
<body>
   <h1>Liste des transactions</h1> 
   <ul>
    <?php foreach($transactions as $position => $transaction): ?>
        <?php if(currentDate($transaction["date"]) == true): ?>
            <li>
                <p><?= $transaction["date"] ?></p>
                <?php if(checkAmount($transaction["montant"]) >= 0): ?>
                <p class="green"><?= $transaction["montant"] ?></p>
                <p><?= organizeName($contacts[concernedPerson($transaction["emetteur"])]["nom"], $contacts[concernedPerson($transaction["emetteur"])]["prenom"]) ?></p>
                <p><?= organizeBankAccount($contacts[concernedPerson($transaction["emetteur"])]["compte"]) ?></p>
                <?php else: ?>
                <p class="grey"><?= $transaction["montant"] ?></p>
                <p><?= organizeName($contacts[concernedPerson($transaction["destinataire"])]["nom"], $contacts[concernedPerson($transaction["destinataire"])]["prenom"]) ?></p>
                <p><?= organizeBankAccount($contacts[concernedPerson($transaction["destinataire"])]["compte"]) ?></p>
                <?php endif; ?>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
   </ul>
   <a href="../main/new-transaction.php">Nouvelle transaction</a>
</body>
</html>
