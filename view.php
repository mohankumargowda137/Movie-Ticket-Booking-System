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
                function del(a)
                {
                    var b=a;
                    
                    document.cookie= "sid="+b;
                }
                function seat(a)
                {
                    var b=a;
                    
                    document.cookie= "shows_id="+b;
                }
                </script>
    </head>
    <body>
        <ion-app>
                <ion-toolbar color="primary">
                        <img src="logo.png" style="height:70px;">
                        <ion-button slot="end" color="success"><?php  echo $_SESSION['venue'];?></ion-button>
                        <ion-button slot="end" color="success" href="alout.php">LOGOUT</ion-button>
                </ion-toolbar>
                <ion-content>
                <?php
                 $con=mysqli_connect('127.0.0.1','root','');
                 if(!$con)
                 {
                     echo 'NOT CONNECTED TO SERVER';
                 }
                 if(!mysqli_select_db($con,'theatres'))
                 {
                     echo 'DATABASE NOT SELECTED';
                 }
                 $showexist=0;
                 $tid=$_SESSION['id'];
                 $list="SELECT shows_id,movie_id,date,time,cancel FROM shows WHERE theatre_id=$tid";
                 $lcheck=mysqli_query($con,$list);
                 while($shows=mysqli_fetch_assoc($lcheck)) {
                 $sid=$shows['shows_id'];
                 $_SESSION['sid']=$sid;
                 $mid=$shows['movie_id'];
                 $date=date("d-m-Y", strtotime($shows['date']));
                 $time=$shows['time'];
                 $movieq="SELECT movie_name,language FROM movie WHERE movie_id=$mid";
                 $mlist=mysqli_query($con,$movieq);
                 while($mshows=mysqli_fetch_assoc($mlist)){
                    $d=date("Y-m-d");
                    if($shows['date']>=$d && $shows['cancel']==='0')
                    {
                 ?>
                  <ion-card>
                         <ion-card-content>
                                 <?php
                                 $showexist=1;
                                 echo '<font size="2">MOVIE NAME:  '.$mshows['movie_name'].'<br>LANGUAGE:  '.$mshows['language'].'<br>DATE:  '.$date.'<br>TIME:  '.date("g:i a", strtotime($time)).'</font>';
                                
                                ?> 
                                 <ion-row>
                                <ion-col size-md="10"></ion-col>
                                 <?php
                                 date_default_timezone_set('Asia/Kolkata');
                                   $e=strtotime($shows['time']);
                                   $n=$e-(30*60);
                                   $en=$e+(30*60);
                                   $d=date("Y-m-d");
                                   $t=date("H:i:sa");
                                   $c=date("Y-m-d",strtotime($shows['date']));
                                 if($c>=$d){
                                     if($c>$d)
                                     {
                                 ?>
                                 <ion-col><ion-button size="small" color="danger" onclick="del(<?php echo $sid;?>)" href="cancel.php">CANCEL SHOW</ion-button></ion-col>
                                <?php
                                 }
                                 if($c===$d)
                                 {
                                    if(date("H:i:sa",$n)>=$t){
                                 ?>
                                 <ion-col><ion-button size="small" color="danger" onclick="del(<?php echo $sid;?>)" href="cancel.php">CANCEL SHOW</ion-button></ion-col>
                                 <?php 
                                    }   
                                 }
                                 }
                                 if($shows['date']===$d && date("H:i:sa",$n)<=$t && $t<=date("H:i:sa",$en)){
                                echo '<ion-button onclick="seat('.$sid.')" href="seat.php">SELL TICKETS</ion-button>';
                                 }
                                ?>
                                </ion-row>
                 </ion-card-content>
                 </ion-card>
                <?php
                    } 
                 }
                }
                if($showexist===0)
                {
                        echo '<center><img src="http://localhost/dashboard/projects/movie/u2.webp" align="center">
                        <br>
                        <p>NO SHOWS AVAILABLE,PLEASE ADD SHOWS</p>
                        <br>
                        WANT TO ADD SHOWS? <a href="add.php">CLICK HERE</a></center>';
                }
                ?>
                
        </ion-content>
        </ion-app>
    </body>
</html>