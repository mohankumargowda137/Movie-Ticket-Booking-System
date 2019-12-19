<?php
session_start();
if (isset($_SESSION['uname']))
{
    unset($_SESSION['uname']);
    $_SESSION['log']=0;
    $_SESSION['user']=0;
    session_destroy();
}
header("location:index.php");
?>