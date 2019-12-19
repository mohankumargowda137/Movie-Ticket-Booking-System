<?php
session_start();
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
    echo 'NOT CONNECTED TO SERVER';
}
if(!mysqli_select_db($con,'theatres'))
{
    echo 'DATABASE NOT SELECTED';
}
$sid=$_COOKIE['sid'];
$mquery="UPDATE shows SET cancel=1 WHERE shows_id=$sid";
$mqueryissue=mysqli_query($con,$mquery);
$_SESSION['csid']=$sid;
header("refresh:0;url=ct.php"); 
?>