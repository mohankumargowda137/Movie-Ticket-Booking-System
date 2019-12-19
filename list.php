<?php
session_start();
?>
<html>
<head>
<title>BOOK MY SLOT</title>
    <link rel="icon" href="slogo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/css/ionic.bundle.css"/>
    <script>
        function sid(a,b)
        {
            var d=a;
            var e=b;
            document.cookie= "shows_id="+d;
            document.cookie= "t_id="+e;
        }
        </script>
</head>
<body>
<ion-app>
<ion-toolbar color="primary">
                
            <img src="logo.png" style="height:70px;">
            <?php
            if(isset($_SESSION['uname']))
            {
                echo'
                <ion-button slot="end" color="success">WELCOME,'.$_SESSION['uname'].'</ion-button>
                <ion-button slot="end" color="success" href="lout.php">LOGOUT</ion-button>'; 
            }
            else{
               echo ' <ion-button slot="end" color="success" fill="solid" href="clogin.html">LOGIN</ion-button>
                <ion-button slot="end" color="success" fill="solid" href="apanel.php">ADMIN</ion-button>';
            }

                
                ?>
</ion-toolbar>
<ion-content>
<?php
$found=0;
$con=mysqli_connect('127.0.0.1','root','');
    $id=$_COOKIE['mid'];
    if(!$con)
    {
        echo 'NOT CONNECTED TO SERVER';
    }
    if(!mysqli_select_db($con,'theatres'))
    {
        echo 'DATABASE NOT SELECTED';
    }
    $mquery="SELECT movie_name FROM movie WHERE movie_id=$id";
    $mlist=mysqli_query($con,$mquery);
    if($mlist)
    {
    $mout=mysqli_fetch_assoc($mlist);
    if($mout)
    {
        $name=$mout['movie_name'];
        
    }   
    }
    $listquery="SELECT shows_id,theatre_id,date,time,screen,cancel FROM shows WHERE movie_id=$id";
    $listin=mysqli_query($con,$listquery);
    while($flist=mysqli_fetch_assoc($listin))
    {
        $cid=$flist['shows_id'];
        $tid=$flist['theatre_id'];
        $tquery="SELECT theatre_name,city FROM theatres_list WHERE uid=$tid";
        $tqueryin=mysqli_query($con,$tquery);
        while($tlist=mysqli_fetch_assoc($tqueryin))
        {

            if($tlist)
            {
                date_default_timezone_set('Asia/Kolkata');
                $e=strtotime($flist['time']);
                $n=$e-(30*60);
                $d=date("Y-m-d");
                $t=date("H:i:s");
                if($flist['date']>=$d && $flist['cancel']==='0')
                {
                    if($flist['date']>$d){
                        $found=1;
                ?>
                <ion-card>
                <ion-card-header>
                <ion-title>
                <?php
                echo $tlist['theatre_name'].'<br>';
                ?>
                </ion-title>
                <ion-card-content>
                <?php
                echo date("d-m-Y", strtotime($flist['date'])).'<br>';
                echo date("g:i a", strtotime($flist['time'])).'<br>';
                echo $tlist['city'].'<br>';
                ?>
                <ion-row>
                                <ion-col size-md="10"></ion-col>
                                 <ion-col><ion-button size="small" color="danger" onclick="sid(<?php echo $cid.','.$tid;?>)" href="seat.php">BOOK HERE</ion-button></ion-col>
                                </ion-row>
                </ion-card-content>
                </ion-card>
                <?php
                }
                if($flist['date']===$d && date("H:i:s",$n)>=$t)
                {
                    $found=1;  
                ?>
                <ion-card>
                <ion-card-header>
                <ion-title>
                <?php
                echo $tlist['theatre_name'].'<br>';
                ?>
                </ion-title>
                <ion-card-content>
                <?php
                echo date("d-m-Y", strtotime($flist['date'])).'<br>';
                echo date("g:i a", strtotime($flist['time'])).'<br>';
                echo $tlist['city'].'<br>';
                ?>
                <ion-row>
                                <ion-col size-md="10"></ion-col>
                                 <ion-col><ion-button size="small" color="danger" onclick="sid(<?php echo $cid.','.$tid;?>)" href="seat.php">BOOK HERE</ion-button></ion-col>
                                </ion-row>
                </ion-card-content>
                </ion-card>
                <?php
                }
                }
            }
        }
        
        }        
    if($found===0)
        {
            ?>
            <center>
            
                    <img src="navail.jpg" height="450px">
                    <h1>SORRY! NO SHOWS AVAILABLE</h1>
                    <p>our family will come back with more entertainment soon</p>
                    </center>
            <?php

}
?>
</ion-app>
</body>
</html>
