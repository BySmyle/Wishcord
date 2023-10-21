<?php
$login = $_POST['login'];
$mdp = ['mdp'];
$data = json_decode(file_get_contents('./data/mesdonnees.json', true));
$count = count($data);
//test

?>