<?php
session_start();
if (isset( $_SESSION['oname']) && isset($_SESSION['venue']) && isset($_SESSION['city']) && isset($_SESSION['email']) && isset($_SESSION['mobile']) && isset($_SESSION['address']) && isset($_SESSION['nos']) && isset($_SESSION['id']))
{
    unset($_SESSION['oname']); 
    unset( $_SESSION['venue']);
    unset($_SESSION['city']);
    unset($_SESSION['email']);
    unset($_SESSION['mobile']);
    unset($_SESSION['address']);
    unset($_SESSION['nos']);
    unset($_SESSION['id']);
    session_destroy();
}
header("location:index.php");
?>