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
echo '<script>alert("payment successfull")</script>';
$uid=$_SESSION['uid'];
$pid=$_GET['payment_id'];
$cost=$_SESSION['total'];
$qty=$_SESSION['g']+$_SESSION['b']+$_SESSION['l'];
$sid=$_COOKIE['shows_id'];
$tid=$_COOKIE['t_id'];
echo $uid.'<br>';
echo $pid.'<br>';
echo $cost.'<br>';
echo $qty.'<br>';
echo $sid.'<br>';
$seat=implode(",",($_SESSION['seat']));
echo $seat.'<br>';
date_default_timezone_set('Asia/Kolkata');
$dat=date("Y-m-d");
$time=date("H:i:s");
$tquery="INSERT INTO ticket (user_id,theatre_id,payment_id,cost,quantity,showid,seatid,date,time) VALUES ('$uid','$tid','$pid','$cost','$qty','$sid','$seat','$dat','$time')";
if(!mysqli_query($con,$tquery)){
    echo 'TICKET NOT BOOKED';
    echo("Error description: " . mysqli_error($con));
}
else{
    foreach(($_SESSION['seat']) as $val) 
    {
    
    $book="UPDATE seat SET $val=1 WHERE show_id=$sid";
    if(!mysqli_query($con,$book))
    {
        echo 'SORRY FOR INCONVINIENCE,YOUR REFUND WILL BE INITIATED SOON';

    }
    }
    echo '<script>
    alert("YOUR TICKETS ARE BOOKED");
    </script>';
    header("refresh:0;url=index.php");
}
?>