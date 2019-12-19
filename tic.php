<?php
session_start();
$_SESSION['disp']=2;
header("refresh:0;url=account.php");
?>