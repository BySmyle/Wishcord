<?php

$login = 'Edouard';
$data = json_decode(file_get_contents('./data/mesdonnees.json'), true);
$count = count($data);
$i = 0;
while ($i < $count) {
    if ($data[$i]['login'] == $login) { //Trouver le num de l'utilisateur
        break;
    } else {
        $i++;
    }
}
$c = 0;
$listeServ = explode(",", $data[$i]['serv']);
$count = count($listeServ);
while ($c < $count) {
    echo '<input type="button" value="' . $listeServ[$c] . '"/>' . '</br>';
    $c++;
}
?>