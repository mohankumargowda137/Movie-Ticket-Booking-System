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
$confirm=0;
$id=rand();
while($confirm===0)
{
$showcheck="SELECT * FROM shows WHERE shows_id= '$id' LIMIT 1";
$check=mysqli_query($con,$showcheck);
$exist=mysqli_fetch_assoc($check);
if($exist['shows_id']===$id)
{
    $id=rand();
}
else{
    $confirm=1;
}
}
$tid=$_SESSION['id'];
$movie_id=$_POST['show'];
$date=$_POST['date'];
$time=$_POST['time'];
$screen=$_POST['screen'];
$gf=$_POST['gf'];
$bf=$_POST['bf'];
$lf=$_POST['lf'];
$movie="INSERT INTO shows (shows_id,theatre_id,movie_id,screen,date,time,bcost,fcost,lcost) VALUES ('$id','$tid','$movie_id','$screen','$date','$time','$gf','$bf','$lf')";
if(!mysqli_query($con,$movie)){
    echo 'SHOW NOT ADDED,TRY AGAIN LATER';
    header("refresh:0;url=aidndex.php");
}
$seat="INSERT INTO seat (show_id) VALUES ('$id')";
if(!mysqli_query($con,$seat)){
    echo 'SHOW NOT ADDED,TRY AGAIN LATER';
    header("refresh:0;url=aidndex.php");
}
else{
    echo '<script>
    alert("SHOW ADDED SUCCESSFULLY");
    </script>';
    $_SESSION['uname']=$uname;
    header("refresh:0;url=aidndex.php");
}
?>