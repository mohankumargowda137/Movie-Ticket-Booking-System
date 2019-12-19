<?php
session_start();
if (isset($_SESSION['uname']))
{
    unset($_SESSION['uname']);
    $_SESSION['log']=0;
    $_SESSION['user']=0;
}
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
    echo 'NOT CONNECTED TO SERVER';
}
if(!mysqli_select_db($con,'theatres'))
{
    echo 'DATABASE NOT SELECTED';
}
$user=$_POST['uid'];
$password=$_POST['pwd'];
if(!empty($user) && !empty($password))
{
    $user_check="SELECT * FROM users WHERE email= '$user' or uname='$user' or mobile='$user'";
    $check=mysqli_query($con,$user_check);
    $exist=mysqli_fetch_assoc($check);
    if($exist)
    {
        if($exist['password']===$password)
        {
            $_SESSION['uname']=$exist['name'];
            $_SESSION['log']=1;
            $_SESSION['uid']=$exist['customerid'];
            $_SESSION['mobile']=$exist['mobile'];
            $_SESSION['email']=$exist['email'];
            $_SESSION['type']='customer';
            echo '<script>
            alert("you are logged in succesfully");
            </script>';
            header("refresh:0;url=index.php");
        }
        else{
            echo '<script>
            alert("WRONG PASSWORD");
            </script>';
            header("refresh:0;url=index.php");
        }
    }
    else
    {
        echo '<script>alert("USER ACCOUNT NOT FOUND \n PLEASE TRY AGAIN WITH VALID CREDENTIALS");</script>';
        header("refresh:0;url=clogin.html");
    }
}
?>