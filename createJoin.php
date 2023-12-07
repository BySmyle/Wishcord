<?php
$login = $_COOKIE['login'];
$serv = $_POST['serv'];
$data = json_decode(file_get_contents('./data/mesdonnees.json'), true);
$count = count($data);
$i = 0;
$c = 0;
$trouver = 0;
$found = false;
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
while ($c < $count2) {
    if ($listeServ[$c] == $serv) {
        $trouver = 1; // l'utilisateur est déjà membre du serveur      
        echo "l'utilisateur est déjà membre du serveur";
        break;
    } else {
        $c++;
    }
}
$montab = array();
if ($trouver == 0 && $found == true && $listeServ[0] != "") {
    $data[$i]['serv'] .= "," . $serv;
<<<<<<< Updated upstream
    mkdir('./serveur/' . $serv);
    file_put_contents('./serveur/'.$serv. '/mesdonnees.txt', serialize($montab));
} else if ($trouver == 0 && $found == false && $listeServ[0] != "") {
=======
    $chemin = './serveur/'. $serv;
    $file = './serveur/'. $serv .'/monchat.txt';
    mkdir($chemin);
    file_put_contents($file, '');
} else if ($trouver == 0 && $found == false) {
>>>>>>> Stashed changes
    $data[$i]['serv'] .= "," . $serv;
} else if ($trouver == 0 && $found == true) {
    $data[$i]['serv'] .= $serv;
    mkdir('./serveur/' . $serv);
    file_put_contents('./serveur/'.$serv. '/mesdonnees.txt', serialize($montab));
} else if ($trouver == 0 && $found == false) {
    $data[$i]['serv'] .= $serv;
}

file_put_contents('./data/mesdonnees.json', json_encode($data))
?>