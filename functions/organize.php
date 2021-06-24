<?php
/**
 * @param string $nom nom du contact
 * @param string $prenom nom du contact
 */
function organizeName(string $lastname, string $firstname): string {
    $upperLastname = strtoupper($lastname);
    $upperFirstname = strtoupper($firstname);
    $completeName = $upperLastname." ".$upperFirstname;
    return "$completeName";
}   
/**
 * @param string $account compte bancaire du contact
 */
function organizeBankAccount(string $account): string {
    $accountPart1 = substr($account, 0, 4);
    $accountPart2 = substr($account, -4);
    $completeAccount = $accountPart1." XXXX XXXX ".$accountPart2;
    return "$completeAccount";
}
/**
 * @param string $amount montant de la transaction
 */
function checkAmount(string $amount): float {
    $amount = floatval($amount);
    return $amount;
}
/**
 * @param string $date date à comparer
 */
function currentDate(string $date): bool {
    $date = explode("/", $date);
    $date[1] = intval($date[1]);
    $now = date("m");
    if($date[1] == $now){
        return true;
    } else {
        return false;
    }
}
/**
 * @param string $person personne à retrouver dans la table contacts via la table transactions
 */
function concernedPerson(string $person): int {
    $person = intval($person);
    $person = $person - 1;
    return $person;
}
/**
 * 
 * 
 */
function sortDate(string $date1, string $date2) {
    return strtotime($date1) - strtotime($date2);
}