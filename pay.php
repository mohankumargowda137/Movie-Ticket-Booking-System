<?php
session_start();
if(!isset($_SESSION['type']) || $_SESSION['type']==='no')
{
    echo '<script>
    alert("PLEASE LOGIN TO BOOK TICKETS");
    </script>';
    header("refresh:0;url=clogin.html");
}
else{
    $con=mysqli_connect('127.0.0.1','root','');
    if(!$con)
    {
        echo 'NOT CONNECTED TO SERVER';
    }
    if(!mysqli_select_db($con,'theatres'))
    {
        echo 'DATABASE NOT SELECTED';
    }
$b=0;
$l=0;
$f=0;
$seats=$_REQUEST['seat'];
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
echo "total:".$total."<br>";
echo 'gandhi class:'.$b;
echo 'balcony:'.$f;
echo 'luxury:'.$l;
$_SESSION['g']=$b;
$_SESSION['b']=$f;
$_SESSION['l']=$l;
$_SESSION['total']=$total;
$_SESSION['seat']=$seats;
$mob=$_SESSION['mobile'];
$user=$_SESSION['uname'];
echo $mob;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_fadb43e8d0368d7cb6fc8119235",
                  "X-Auth-Token:test_76ceeaf8e895fa17dd9bd7432ad"));
$payload = Array(
    'purpose' => 'MOVIE TICKET BOOKING',
    'amount' => $total,
    'phone' => $mob,
    'buyer_name' => $user,
    'redirect_url' => 'http://localhost/dashboard/projects/movie/success.php',
    'send_email' => true,
    'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => 'foo@example.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

echo $response;
$decode=json_decode($response,true);
print_r ($decode);
echo'<br><br><br>';
$rurl=$decode['payment_request']['longurl'];
echo $rurl;
header("refresh:0;url=$rurl");
}


?>