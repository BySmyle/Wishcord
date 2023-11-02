<?php
$login = $_POST['login'];
$mdp = $_POST['mdp'];
$i = 0;
$found = false;
$sel = "WishcordVaRenaitreDeSesCendres";
$data = json_decode(file_get_contents("./data/mesdonnees.json"), true);
$count = count($data);
while ($i < $count) {
    if ($login == $data[$i]['login']) {
        $found = true;
        break;
    } else {
        $i++;
    }
}
if ($found == false) {
    $mdphash = hash('sha256', $mdp .= $sel);
    $tab = array(
        "login" => $login,
        "mdp" => $mdphash,
        "serv" => ''
    );
    $data[] = $tab;
    file_put_contents('./data/mesdonnees.json', json_encode($data));
    header('Location: ./accueil.html');
}else{
    header('Location: ./creacompte.html');
}

