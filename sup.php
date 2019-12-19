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
$user=$_POST['name'];
$email=$_POST['email'];
$uname=$_POST['uname'];
$mobile=$_POST['mobile'];
$password=$_POST['pwd'];
$address=$_POST['address'];
$cpassword=$_POST['cpwd'];
if(!empty($user) && !empty($email) && !empty($uname) && !empty($mobile) && !empty($password) && !empty($address) && !empty($cpassword))
{
    $user_check="SELECT * FROM users WHERE email= '$email' or uname='$uname' or mobile='$mobile' LIMIT 1";
    $check=mysqli_query($con,$user_check);
    $exist=mysqli_fetch_assoc($check);
    if($exist)
    {
        if($exist['email']===$email)
        {
            echo '<script>
            alert("ACCOUNT ALREADY EXISTS WITH THIS EMAIL");
            </script>';
        }
        if($exist['uname']===$uname)
        {
            echo '<script>
            alert("USERNAME ALREADY TAKEN");
            </script>';
        }
        if($exist['mobile']===$mobile)
        {
            echo '<script>
            alert("ACCOUNT ALREADY EXISTS WITH THIS MOBILE");
            </script>';
        }
        header("refresh:2;url=signup.html");
    }
    elseif($password == $cpassword)
    {
        $sql="INSERT INTO users (name,email,uname,mobile,password,address) VALUES ('$user','$email','$uname','$mobile','$password','$address')";
        if(!mysqli_query($con,$sql)){
            echo 'USER ACCOUNT NOT CREATED';
        }
        else{
            echo '<script>
            alert("USER ACCOUNT CREATED SUCCESSFULLY");
            alert("PLEASE LOGIN WITH YOUR NAME AND PASSWORD");
            </script>';
            $_SESSION['uname']=$uname;
            header("refresh:2;url=index.php");
        }
    }
    else{
        echo '<script>
        alert("password doesnot match");
        </script>';
        header("refresh:0;url=signup.html");
    }
}
else{
    echo'<script>
    alert("one or more field is left empty");
    </script>';
    header("refresh:1;url=signup.html");
}



?>