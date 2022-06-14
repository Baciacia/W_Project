<?php

$db = mysqli_connect('localhost', 'root', '', 'accounts');

$user_check_query = "SELECT species,type,diet,lifespan,climate,description FROM animals where species='Cheetah'";
$result = mysqli_query($db, $user_check_query);
$animal = mysqli_fetch_assoc($result);

$a = '../XML_JSON/' . $animal['species'] . 'Exp.json';

file_put_contents($a, json_encode($animal,JSON_PRETTY_PRINT));
