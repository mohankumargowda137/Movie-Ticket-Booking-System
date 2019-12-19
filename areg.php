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
$oname =$_POST['oname'];
$email =$_POST['mail'];
$mobile=$_POST['mobile'];
$city =$_POST['city'];
$venue =$_POST['venue'];
$address =$_POST['address'];
$password =$_POST['pwd'];
$cpassword =$_POST['cpwd'];
$nos=$_POST['nos'];
if(!empty($oname) && !empty($email) && !empty($city) && !empty($mobile) && !empty($password) && !empty($address) && !empty($venue) && !empty($nos) && !empty($cpassword))
{
    $user_check="SELECT * FROM theatres_list WHERE email= '$email' or mobile='$mobile' LIMIT 1";
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
        if($exist['mobile']===$mobile)
        {
            echo '<script>
            alert("ACCOUNT ALREADY EXISTS WITH THIS MOBILE");
            </script>';
        }
        header("refresh:2;url=asignup.html");
    }
    elseif($password == $cpassword)
    {
        $sql="INSERT INTO theatres_list (oname,theatre_name,password,address,city,screens,email,mobile) VALUES ('$oname','$venue','$password','$address','$city','$nos','$email','$mobile')";
        if(!mysqli_query($con,$sql)){
            echo 'ADMIN ACCOUNT NOT CREATED';
        }
        else{
            echo '<script>
            alert("ADMIN ACCOUNT CREATED SUCCESSFULLY");
            alert("PLEASE LOGIN WITH YOUR MOBILE NUMBER AND PASSWORD");
            </script>';
            header("refresh:2;url=index.php");
        }
    }
    else{
        echo '<script>
        alert("password doesn0t match");
        </script>';
        header("refresh:1;url=signup.html");
    }
}
else{
    echo'<script>
    alert("one or more field is left empty");
    </script>';
    header("refresh:1;url=asignup.html");
}
?>