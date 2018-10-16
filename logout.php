<?php

if(isset($_GET['logout'])){
    session_start();
    unset($_SESSION['user']);
    session_destroy();
    header('location:login.php');
    exit();
}
?>
<html>
    <head>
    <title>Logout</title>
    </head>
<body>
    <h1 align="center">
    You are Logged out! Please log back on or go to the home page
    </h1>
    <h2 align="center">
    <a href="login.php">Login Page</a>
    </h2>
    </body>
</html>