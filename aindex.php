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
$user=$_POST['uid'];
$password=$_POST['pwd'];
if(!empty($user) && !empty($password))
{
    $user_check="SELECT * FROM theatres_list WHERE email= '$user' or mobile='$user'";
    $check=mysqli_query($con,$user_check);
    $exist=mysqli_fetch_assoc($check);
    if($exist)
    {
        if($exist['email']===$user || $exist['mobile']===$user && $exist['password']===$password)
        {
            $_SESSION['oname']=$exist['oname'];
            $_SESSION['venue']=$exist['theatre_name'];
            $_SESSION['city']=$exist['city'];
            $_SESSION['email']=$exist['email'];
            $_SESSION['mobile']=$exist['mobile'];
            $_SESSION['address']=$exist['address'];
            $_SESSION['nos']=$exist['screens'];
            $_SESSION['id']=$exist['uid'];
            $_SESSION['type']='admin';
            echo '<script>
            alert("you are logged in succesfully");
            </script>';
            header("refresh:0;url=aidndex.php");
        }
    }
    else{
        echo '<script>
        alert("enter correct details");
        </script>'; 
        header("refresh:0;url=apanel.html");
    }
}
?>