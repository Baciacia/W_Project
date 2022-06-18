<?php

$db = mysqli_connect('localhost', 'root', '', 'accounts');

$xmlfile = $_GET["myfile"];

$animalinfo = simplexml_load_file($xmlfile) or die("Error: Cannot create XML object");

$species = $animalinfo->species;
$type = $animalinfo->type;
$diet = $animalinfo->diet;
$lifespan = $animalinfo->lifespan;
$climate = $animalinfo->climate;
$description = $animalinfo->description;

$query = "INSERT INTO animals (species, type, diet, lifespan, climate, description) VALUES('$species', '$type', '$diet', '$lifespan', '$climate', '$description')";
mysqli_query($db, $query);
echo "probabil gata";
