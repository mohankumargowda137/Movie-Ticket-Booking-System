<?php
session_start();
$_SESSION['disp']=1;
header("refresh:0;url=account.php");
?>