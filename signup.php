<?php

$con = mysqli_connect('localhost', 'root', '','test2');

$txtUsername = $_POST['txtUsername'];
$txtMail = $_POST['txtMail'];
$txtPassword = $_POST['txtPassword'];
$rpsw = $_POST['rpsw'];


// database insert SQL code
    if($txtPassword==$rpsw)
$sql = "INSERT INTO `user` (`id`, `username`, `password`) VALUES ('0', '$txtUsername', '$txtPassword')";

// insert in database
$rs = mysqli_query($con, $sql);

if($rs)
{
    echo "Registration Complete";
}

?>


