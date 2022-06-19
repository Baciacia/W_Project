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
    <!--aici faci cu animalele din baza de date-->
</div>
<?php
if (isset($_COOKIE['user'])){
    $username=$_COOKIE['user'];
    $db = mysqli_connect('localhost', 'root', '', 'accounts');
    $query = "SELECT admin FROM users WHERE username='$username' ";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    if ($row['admin']==1)
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
    <?php

    echo "<style>";
    include '../CSS/animals.css';
    echo "</style>";

    $db = mysqli_connect('localhost', 'root', '', 'accounts');
    $query = "SELECT * FROM animals ORDER BY species";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    $nr=0;
    while ($row) {
        $nr++;
        if($nr%2==1)
            echo "<div class='poze'>";
        echo

            "<div class='chenar'>".

                "<a href = '../PHP/animal_temp.php?species=". $row['species']. "' class = 'link_animale' >".
                    "<img src=" . $row['path'] . " class= 'pozeanimale'>".
                "</a>".

                "<div class = 'specie' >". $row["species"] . "<br>". "</div>".

            "</div>";


        $row = $result->fetch_assoc();
        if($nr%2==0 || !$row)
            echo "</div>";


    }
    ?>
</body>
</html>