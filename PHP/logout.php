<?php

if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', '', time() - 3600, '/');
    header('location:index.php');
}
