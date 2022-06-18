<?php

$db = mysqli_connect('localhost', 'root', '', 'accounts');
$animal_species = $_GET['species'];
$user_check_query = "SELECT * FROM animals where species='$animal_species'";
$result = mysqli_query($db, $user_check_query);
$animal = mysqli_fetch_assoc($result);

//template-ul pt xml
$xml = '<?xml version="1.0"?> 
<animal>
<species>' . $animal['species'] . '</species>
<type>' . $animal['type'] . '</type>
<diet>' . $animal['diet'] . '</diet>
<lifespan>' . $animal['lifespan'] . '</lifespan>
<climate>' . $animal['climate'] . '</climate>
<description>' . $animal['description'] . '</description>
<path>' . $animal['path'] . '</path>
</animal>';

//creearea xml-ului
$dom = new DOMDocument();
$dom->preserveWhiteSpace = false;
$dom->formatOutput = TRUE;
$dom->loadXML($xml);
$a = '../XML_JSON/' . $animal['species'] . 'Exp.xml'; //exportam in folder-ul XML_JSON
$dom->save($a);

header('Content-Type: application/xml');
header('Content-Disposition: attachment; filename="'.$animal['species'].'Exp.xml"');
header('Content-Length: '. filesize($a));

readfile($a);

//nu uita sa stergi path ul la sfarsit

