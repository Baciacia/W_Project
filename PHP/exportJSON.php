<?php

$db = mysqli_connect('localhost', 'root', '', 'accounts');
$animal_species = $_GET['species'];
echo $animal_species;
$user_check_query = "SELECT species,type,diet,lifespan,climate,description,path FROM animals where species='$animal_species'";
$result = mysqli_query($db, $user_check_query);
$animal = mysqli_fetch_assoc($result);
echo "da";
$a = '../XML_JSON/' . $animal['species'] . 'Exp.json';

file_put_contents($a, json_encode($animal, JSON_PRETTY_PRINT));

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="'.$animal['species'].'Exp.json"');
header('Content-Length: '. filesize($a));
readfile($a);

//nu uita sa stergi path ul la sfarsit