<?php
echo $sid=$_COOKIE['sid'];
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
    echo 'NOT CONNECTED TO SERVER';
}
if(!mysqli_select_db($con,'theatres'))
{
    echo 'DATABASE NOT SELECTED';
}
$tid=$_COOKIE['pid']; 
$b="SELECT seatid FROM ticket WHERE ticket_id='$tid'";
    $c=mysqli_query($con,$b);
    {
    $d=mysqli_fetch_assoc($c);
    $tlist=explode(',',$d['seatid']);
    $count=count($tlist);
    for($i=0;$i<$count;$i++)
    {
        echo $tlist[$i];
        $s=$tlist[$i];
        $sid=$_COOKIE['sid'];
        $seat="UPDATE seat SET ".$s."='0' WHERE show_id='$sid'";
        mysqli_query($con,$seat);
        echo $i;
        echo $seat;
    }  
    }
    header("refresh:0;url=account.php");
    
?>