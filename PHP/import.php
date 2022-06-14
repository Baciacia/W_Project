<?php

$db = mysqli_connect('localhost', 'root', '', 'accounts');

$file = $_GET["myfile"];
$ext = pathinfo($file, PATHINFO_EXTENSION);
if ($ext == 'json') //json
{


    $jsondata = file_get_contents('../XML_JSON/' . $file);
    $data = json_decode($jsondata, true);

    $species = $data['species'];
    $animal_check_query = "SELECT species FROM animals WHERE species='$species' LIMIT 1";
    $result = mysqli_query($db, $animal_check_query);
    $animal = mysqli_fetch_assoc($result);
    if (!$animal)
    {
        $type = $data['type'];
        $diet = $data['diet'];
        $lifespan = $data['lifespan'];
        $climate = $data['climate'];
        $description = $data['description'];

        $query = "INSERT INTO animals (species, type, diet, lifespan, climate, description) VALUES('$species', '$type', '$diet', '$lifespan', '$climate', '$description')";
        mysqli_query($db, $query);

        echo $data['species'];
    } else echo "Species already exists";
} else //xml
{
    $animalinfo = simplexml_load_file('../XML_JSON/' . $file) or die("Error: Cannot create XML object");

    $species = $animalinfo->species;
    $animal_check_query = "SELECT species FROM animals WHERE species='$species' LIMIT 1";
    $result = mysqli_query($db, $animal_check_query);
    $animal = mysqli_fetch_assoc($result);
    if (!$animal) {
        $type = $animalinfo->type;
        $diet = $animalinfo->diet;
        $lifespan = $animalinfo->lifespan;
        $climate = $animalinfo->climate;
        $description = $animalinfo->description;

        $query = "INSERT INTO animals (species, type, diet, lifespan, climate, description) VALUES('$species', '$type', '$diet', '$lifespan', '$climate', '$description')";
        mysqli_query($db, $query);
        echo $species;
    } else echo "Species already exists";

}