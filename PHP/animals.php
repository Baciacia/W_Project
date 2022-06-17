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
<nav class="navbar">
    <div class="logo">
        <a href="index.html" target="_self">FURRY PARK</a>
    </div>
    <ul class="nav_list">
        <li>
            <a href="visit.html" target="_self">VISIT US</a>
        </li>
        <li>
            <a href="animals.html" target="_self">ANIMALS</a>
        </li>
        <li>
            <a href="donate.html" target="_self">DONATE</a>
        </li>
        <li>
            <label></label>
            <select name="lng" id="lng">
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
                <option value="French">French</option>
                <option value="Romanian">Romanian</option>
            </select>
        </li>
    </ul>




    <div class="meniu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>
<script src="../JAVASCRIPT/api.js"></script>

<div class="animals">
    <img src="../Imagini/animals.jpg" id="#an" style="width: 100%;">
</div>

<div class="info-bar" id="i-bar">
    <h3>Come and visit various amazing animals from all over the world!</h3>
    <!--aici faci cu animalele din baza de date-->
</div>
<div>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'accounts');
    $query = "SELECT * FROM animals ";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    while($row)
    {
        echo $row["species"] ." ".$row['type']."<br> ";
        echo "<img src=".$row['path'].">";
        $row = $result->fetch_assoc();


    }
    ?>
</div>
</body>
</html>

