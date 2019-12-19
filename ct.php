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
$tid=$_COOKIE['pid'];
if($_SESSION['type']==='customer')
{
$ch = curl_init();
$q="SELECT * FROM ticket WHERE ticket_id=$tid";
$qin=mysqli_query($con,$q);
if($qin)
{
$res=mysqli_fetch_assoc($qin);
$pid=$res['payment_id'];
}
echo $pid;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/refunds/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
array("X-Api-Key:test_fadb43e8d0368d7cb6fc8119235",
"X-Auth-Token:test_76ceeaf8e895fa17dd9bd7432ad"));
$payload = Array(
    'transaction_id'=> 'partial_refund_1',
    'payment_id' => $pid,
    'type' => 'QFL',
    'body' => "Customer isn't satisfied with the quality"
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
echo $response;
$al=json_decode($response,true);
echo '<br>';
echo $al['success'];
if($al['success']==1)
{
   
    $q="UPDATE ticket SET cancel=1 WHERE ticket_id=$tid";
    if(!mysqli_query($con,$q))
    {
        redo();
    }
    else{
        echo '<script>alert("REFUND INITIATED,YOU WILL SOON BE REFUNDED");</script>';
        header("refresh:0;url=try.php");
    }
}
else{
    echo '<script>alert("COULDNT INITIATE REFUND PLEASE TRY AGAIN LATER");</script>';
    header("refresh:0;url=account.php");
}
function redo()
{
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
    $q="UPDATE ticket SET cancel=1 WHERE ticket_id=$tid";
    if(!mysqli_query($con,$q))
    {
        redo();
    }
    else{
        echo '<script>alert("REFUND INITIATED,YOU WILL SOON BE REFUNDED");</script>';
        header("refresh:0;url=try.php");
    } 
}
}
if($_SESSION['type']==='admin')
{
    function refund()
    {
        $pid=$_SESSION['payid'];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/refunds/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
        array("X-Api-Key:test_fadb43e8d0368d7cb6fc8119235",
        "X-Auth-Token:test_76ceeaf8e895fa17dd9bd7432ad"));
        $payload = Array(
            'transaction_id'=> 'partial_refund_1',
            'payment_id' => $pid,
            'type' => 'QFL',
            'body' => "Customer isn't satisfied with the quality"
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response; 
        return(0);   
    }
    $sid=$_SESSION['csid'];
    $q="SELECT * FROM ticket WHERE showid=$sid";
    $qin=mysqli_query($con,$q);
    if($qin){
    while($row=mysqli_fetch_assoc($qin))
    {
        $_SESSION['payid']=$row['payment_id'];
        refund();
    }
    }
    $a="UPDATE ticket SET acancel=1 WHERE showid=$sid";
    mysqli_query($con,$a);
    header("refresh:0;url=view.php");
}


?>
