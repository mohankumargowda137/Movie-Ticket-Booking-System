<?php
session_start();
$_SESSION['disp']=0;
header("refresh:0;url=account.php");
?>