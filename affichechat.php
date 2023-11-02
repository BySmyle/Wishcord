<?php
$login = $_COOKIE['login'];
$numserv = $_POST['numserv'];
$numserv - 1;
setcookie('numserv', $numserv, time()+3600);
$i = 0;
$c = 0;
$numlogin = 0;
$data = json_decode(file_get_contents('./data/mesdonnees.json'), true);
$count = count($data);
while($i < $count){
    if ($login == $data[$i]['login']){
        $numlogin = $i;
        break;
    }else{
        $i++;
    }
}
$listeServ = explode(',', $data[$i]['serv']);
$monserv = $listeServ[$numserv];
$monChat = unserialize(file_get_contents('./serveur/'.$monserv.'/mesdonnees.txt'));
echo json_encode($monChat);