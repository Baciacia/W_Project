<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/animals.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Animals</title>
</head>
<body>

<header class="header">
    <!-- Logo -->
    <a href="index.php" class="logo" target="_self">Furry Park</a>
    <!-- Hamburger icon -->
    <input class="side-menu" type="checkbox" id="side-menu"/>
    <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
    <!-- Menu -->
    <nav class="nav">
        <ul class="menu">
            <li><a href="../HTML/visit.html">Visit Us</a></li>
            <li><a href="../HTML/donate.html">Donate</a></li>
            <li><a href="../PHP/animals.php">Animals</a></li>
        </ul>
    </nav>
</header>

<script src="../JAVASCRIPT/api.js"></script>

<div class="animals">
    <img src="../Imagini/animals.jpg" id="#an" style="width: 100%;" alt="#">
</div>

<div class="info-bar" id="i-bar">
    <h3>Come and visit various amazing animals from all over the world!</h3>
</div>
<?php
if (isset($_COOKIE['user'])) {
    $username = $_COOKIE['user'];
    $db = mysqli_connect('localhost', 'root', '', 'accounts');
    $query = "SELECT admin FROM users WHERE username='$username' ";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    if ($row['admin'] == 1)
        echo '
<div class="import">
    <form action="import.php" method="get"
          enctype="multipart/form-data">
        <input class = "file" type="file" id="myfile" accept=".xml, .json" name="myfile"/>
        <br/><br/>

        <input class="button" type="submit"/>
    </form>
</div>';
}
?>

<form id="filter" action="" method="post">
    <select name="Diet" id="Diet">
        <option value="" >Diet</option>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'accounts');
        $query = "SELECT DISTINCT diet_filter FROM animals ";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        while ($row) {
            echo "<option value=" . $row['diet_filter'] . ">" . $row['diet_filter'] . "</option>";
            $row = $result->fetch_assoc();
        }


        ?>
    </select>
    <select name="Habitat" id="Habitat">
        <option value="" >Habitat</option>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'accounts');
        $query = "SELECT DISTINCT habitat_filter FROM animals ";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        while ($row) {
            echo "<option value=" . $row['habitat_filter'] . ">" . $row['habitat_filter'] . "</option>";
            $row = $result->fetch_assoc();
        }


        ?>
    </select>
    <select name="Type" id="Type">
        <option value="" >Type</option>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'accounts');
        $query = "SELECT DISTINCT type FROM animals ";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        while ($row) {
            echo "<option value=" . $row['type'] . ">" . $row['type'] . "</option>";
            $row = $result->fetch_assoc();
        }


        ?>
    </select>
    <select name="Endangered" id="Endangered">
        <option value="" >Endangerment</option>
        <option value="Endangered"> Endangered</option>
        <option value="Stable"> Stable</option>
    </select>
    <input type="submit" name="submit" value="Filter">
</form>

<?php

echo "<style>";
include '../CSS/animals.css';
echo "</style>";

$db = mysqli_connect('localhost', 'root', '', 'accounts');
$ok = 0;
$dietq = "";
$habitatq = "";
$typeq = "";
$dangerq = "";
if (isset($_POST['submit'])) {
    if (!empty($_POST['Diet'])) {
        $dietq = "WHERE diet_filter='" . $_POST['Diet'] . "' ";
        $ok = 1;
    }

    if (!empty($_POST['Habitat'])) {
        if ($ok == 1)
            $habitatq = "AND habitat_filter='" . $_POST['Habitat'] . "' ";
        else {
            $habitatq = "WHERE habitat_filter='" . $_POST['Habitat'] . "' ";
            $ok = 1; }
    }

    if (!empty($_POST['Type'])) {
        if ($ok == 1)
            $typeq = "AND type='" . $_POST['Type'] . "' ";
        else {
            $typeq = "WHERE type='" . $_POST['Type'] . "' ";
            $ok = 1; }
    }

    if (!empty($_POST['Endangered'])) {
        if($_POST['Endangered']=='Stable') $dng='0'; else $dng='1';
        if ($ok == 1)
            $dangerq = "AND endangered='" . $dng . "' ";
        else {
            $dangerq = "WHERE type='" . $dng . "' ";
            $ok = 1; }
    }
}
$crazyquery="SELECT species,path FROM animals ".$dietq.$habitatq.$typeq.$dangerq."ORDER BY species";
//$query = "SELECT species,path FROM animals ORDER BY species";
//echo $crazyquery;
$result = $db->query($crazyquery);
$row = $result->fetch_assoc();
$nr = 0;
while ($row) {
    $nr++;
    if ($nr % 2 == 1)
        echo "<div class='poze'>";
    echo

        "<div class='chenar'>" .

        "<a href = '../PHP/animal_temp.php?species=" . $row['species'] . "' class = 'link_animale' >" .
        "<img src=" . $row['path'] . " class= 'pozeanimale'>" .
        "</a>" .

        "<div class = 'specie' >" . $row["species"] . "<br>" . "</div>" .

        "</div>";


    $row = $result->fetch_assoc();
    if ($nr % 2 == 0 || !$row)
        echo "</div>";


}
?>
</body>
</html>