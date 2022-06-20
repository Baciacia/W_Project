<?php
$db = mysqli_connect('localhost', 'root', '', 'accounts');

if(!isset($_POST['username']) || empty($_POST['username']))
    echo "username empty";
else if(!isset($_POST['email']) || empty($_POST['email'])) echo "mail empty";
else if (!isset($_POST['number']) || empty($_POST['number'])) echo "number empty";
else if (!isset($_POST['persons']) || empty($_POST['persons'])) echo "persons empty";
else
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $number = mysqli_real_escape_string($db, $_POST['number']);
    $persons = mysqli_real_escape_string($db, $_POST['persons']);


    if (mysqli_query($db, "INSERT INTO customers(name, email, number, persons) VALUES('$username','$email','$number','$persons')")) {
        echo 'Reservation complete';
    } else {
        echo "Error: " . mysqli_error($db);
    }
}

?>