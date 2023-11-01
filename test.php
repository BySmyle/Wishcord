<?php
$login = 'Edouard';
$serv = 'test';
$data = json_decode(file_get_contents('./data/mesdonnees.json'), true);
$count = count($data);
$i = 0;
$c = 0;
$trouver = 0;
$found = false;
$trouver2 = 0;
$serv = strtolower($serv);
$serv = str_replace(' ', '_', $serv);
$url = "./serveur/" . $serv;
if (!file_exists($url)) {
    $found = true;
    echo "Le serveur n'existe pas";
}
while ($i < $count) {
    if ($data[$i]['login'] == $login) { //Trouver le num de l'utilisateur
        break;
    } else {
        $i++;
    }

}
$listeServ = explode(',', $data[$i]['serv']);
$count2 = count($listeServ);
echo $count2;