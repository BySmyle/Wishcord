<?php
$login = 'Edouard';
$data = json_decode(file_get_contents('./data/mesdonnees.json'), true);
$count = count($data);
$i = 0;
$c = 0;
while ($i < $count) {
    if ($data[$i]['login'] == $login) { //Trouver le num de l'utilisateur
        break;
    } else {
        $i++;
    }

}
$montab = array();
$listeServ = explode(',', $data[$i]['serv']);
$count2 = count($listeServ); 
while ($c < $count2) {
    $montab[$c]["serv"] = $listeServ[$c];
    $c++;
}

echo json_encode($montab);

?>