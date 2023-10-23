<?php
$login = $_POST['login'];
$mdp = $_POST['mdp'];
$sel = "WishcordVaRenaitreDeSesCendres";
$data = json_decode(file_get_contents("./data/mesdonnees.json", true));
$mdphash = hash('sha256', $mdp .= $sel);    
$tab = array(
    "login" => $login,
    "mdp" => $mdphash,
    "serv" => ''
);
$data[] = $tab;
file_put_contents('./data/mesdonnees.json', json_encode($data));
?>