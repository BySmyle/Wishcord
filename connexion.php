<?php
$login = $_POST['login'];
$mdp = $_POST['mdp'];
$sel = "WishcordVaRenaitreDeSesCendres";
$data = json_decode(file_get_contents('./data/mesdonnees.json'), true);
$count = count($data);
$i = 0;
$mdphash = hash('sha256', $mdp .= $sel);
while ($i < $count) {
    if ($data[$i]['login'] == $login && $data[$i]['mdp'] == $mdphash) {
        setcookie('login', $login, time()+3600);
        header('Location: ./wishcord.php');
        break;
    } else {
        echo 'Log failed';
        $i++;
    }
}

?>