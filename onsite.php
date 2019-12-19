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
$seats=$_REQUEST['seat'];
$b=0;
$l=0;
$f=0;
for($i=0;$i<count($seats);$i++)
{
    if (substr($seats[$i],0,1)==='b')
{
	$b=$b+1;
}
if (substr($seats[$i],0,1)==='f')
{
	$f=$f+1;
}
if (substr($seats[$i],0,1)==='l')
{
	$l=$l+1;
}
}
$eid=$_COOKIE['shows_id'];
$pquery="SELECT bcost,fcost,lcost FROM shows WHERE shows_id=$eid";
$pin=mysqli_query($con,$pquery);
$pout=mysqli_fetch_assoc($pin);
$total=($b*$pout['bcost'])+($f*$pout['fcost'])+($l*$pout['lcost'])+(($b+$f+$l)*10);
echo $total;
$seats=implode(",",$_REQUEST['seat']);
echo $seats;
foreach(($_REQUEST['seat']) as $val) 
    {
    $book="UPDATE seat SET $val=1 WHERE show_id=$eid";
    if(!mysqli_query($con,$book))
    {
        echo '<script>alert("COULDNOT BOOK TICKETS");</script>';
        header("refresh:0;url=view.php");
    }
    else{
        echo '<script>
        alert("YOUR TICKETS ARE BOOKED");
        </script>';
        header("refresh:0;url=seat.php");
    }
    }

?>