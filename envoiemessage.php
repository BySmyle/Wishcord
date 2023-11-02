<?php
$numserv = $_COOKIE['numserv'];
$login = $_COOKIE['login'];
$message = $_POST['message'];
$data = json_decode(file_get_contents('./data/mesdonnees.json'), true);
$count = count($data);
$i = 0;
while($i < $count){
    if ($login == $data[$i]['login']){
        $numlogin = $i;
        break;
    }else{
        $i++;
    }
}
$date = date('H:i:s');
echo $date;
$listeServ = explode(',', $data[$i]['serv']);
$monserv = $listeServ[$numserv];
echo $monserv;
$monChat = unserialize(file_get_contents('./serveur/'. $monserv . '/mesdonnees.txt'));
$monTab = array();
$monTab = array(
    "date" => $date,
    "pseudo" => $login,
    "message" => $message
);
$monChat[] = $monTab;
file_put_contents('./serveur/'. $monserv . '/mesdonnees.txt', serialize($monChat));
?>