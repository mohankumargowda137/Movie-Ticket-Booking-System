<?php
session_start();
$eid=$_COOKIE['shows_id'];

function check($sno)
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
$eid=$_COOKIE['shows_id'];
    $squery="SELECT * FROM seat WHERE show_id=$eid";
    $scheck=mysqli_query($con,$squery);
    $sout=mysqli_fetch_assoc($scheck);

    if($sout[$sno]!=0)
    {
        echo 'disabled';
    }
    else{
        echo ' ';
    }
}
?>
<html>
<head>
        <title>BOOK MY SLOT</title>
        <link rel="icon" href="lo3.jpg" type="image/icon type">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/css/ionic.bundle.css"/>
</head>
<body>
    <ion-app>
        <ion-header>
                <ion-toolbar color="primary">
                        <img src="logo.png" style="height:70px;">
                        <?php
            if(isset($_SESSION['uname']))
            {
                echo'
                <ion-button slot="end" color="success">WELCOME,'.$_SESSION['uname'].'</ion-button>
                <ion-button slot="end" color="success" href="lout.php">LOGOUT</ion-button>'; 
            }
            if(isset($_SESSION['type']))
            {

            }
            else{
               echo ' <ion-button slot="end" color="success" fill="solid" href="clogin.html">LOGIN</ion-button>
                <ion-button slot="end" color="success" fill="solid" href="apanel.html">ADMIN</ion-button>';
            }

                
                ?>
                </ion-toolbar>
            </ion-header>
            <ion-content>
                <ion-grid>
                    <ion-row>
                        <ion-col size-xs="12">
                        <center>
                                <ion-card>
                                
                                        <img src="screen.jpg" height="200px">
                                        <div text-center>
                                                <p>EYES ON SCREEN</p>
                                                <br>
                                        <form <?php if($_SESSION['type']==='customer' || $_SESSION['type']==='no'){echo 'action="pay.php"';}if($_SESSION['type']==='admin'){echo 'action="onsite.php"';}?> method="post">
                                        <p>GROUND LEVEL</p>
                                        <input type="checkbox" value="ba1" name="seat[]" <?php $s='ba1'; check($s);?>><input type="checkbox" value="ba2" name="seat[]" <?php $s='ba2'; check($s);?>><input type="checkbox" value="ba3" name="seat[]" <?php $s='ba3'; check($s);?>>
                                        <input type="checkbox" value="ba4" name="seat[]" <?php $s='ba4'; check($s);?>><input type="checkbox" value="ba5" name="seat[]" <?php $s='ba5'; check($s);?>><input type="checkbox" value="ba6" name="seat[]" <?php $s='ba6'; check($s);?>>
                                        <input type="checkbox" value="ba7" name="seat[]" <?php $s='ba7'; check($s);?>><input type="checkbox" value="ba8" name="seat[]" <?php $s='ba8'; check($s);?>><input type="checkbox" value="ba9" name="seat[]" <?php $s='ba9'; check($s);?>>
                                        <input type="checkbox" value="ba10"  name="seat[]"<?php $s='ba10'; check($s);?>><input type="checkbox" value="ba11" name="seat[]" <?php $s='ba11'; check($s);?>><input type="checkbox" value="ba12" name="seat[]" <?php $s='ba12'; check($s);?>>
                                        <input type="checkbox" value="ba13" name="seat[]" <?php $s='ba13'; check($s);?>><input type="checkbox" value="ba14" name="seat[]" <?php $s='ba14'; check($s);?>><input type="checkbox" value="ba15" name="seat[]" <?php $s='ba15'; check($s);?>>
                                        <input type="checkbox" value="ba16" name="seat[]" <?php $s='ba16'; check($s);?>><input type="checkbox" value="ba17" name="seat[]" <?php $s='ba17'; check($s);?>><input type="checkbox" value="ba18" name="seat[]" <?php $s='ba18'; check($s);?>>
                                        <input type="checkbox" value="ba19" name="seat[]" <?php $s='ba19'; check($s);?>><input type="checkbox" value="ba20" name="seat[]" <?php $s='ba20'; check($s);?>><input type="checkbox" value="ba21" name="seat[]" <?php $s='ba21'; check($s);?>>
                                        <input type="checkbox" value="ba22" name="seat[]" <?php $s='ba22'; check($s);?>><input type="checkbox" value="ba23" name="seat[]" <?php $s='ba23'; check($s);?>><input type="checkbox" value="ba24" name="seat[]" <?php $s='ba24'; check($s);?>>
                                       
                                        <br>
                                        <input type="checkbox" value="bb1" name="seat[]" <?php $s='bb1'; check($s);?>><input type="checkbox" value="bb2" name="seat[]" <?php $s='bb2'; check($s);?>><input type="checkbox" value="bb3" name="seat[]" <?php $s='bb3'; check($s);?>>
                                        <input type="checkbox" value="bb4" name="seat[]" <?php $s='bb4'; check($s);?>><input type="checkbox" value="bb5" name="seat[]" <?php $s='bb5'; check($s);?>><input type="checkbox" value="bb6" name="seat[]" <?php $s='bb6'; check($s);?>>
                                        <input type="checkbox" value="bb7" name="seat[]" <?php $s='bb7'; check($s);?>><input type="checkbox" value="bb8" name="seat[]" <?php $s='bb8'; check($s);?>><input type="checkbox" value="bb9" name="seat[]" <?php $s='bb9'; check($s);?>>
                                        <input type="checkbox" value="bb10" name="seat[]" <?php $s='bb10'; check($s);?>><input type="checkbox" value="bb11" name="seat[]" <?php $s='bb11'; check($s);?>><input type="checkbox" value="bb12" name="seat[]" <?php $s='bb12'; check($s);?>>
                                        <input type="checkbox" value="bb13" name="seat[]" <?php $s='bb13'; check($s);?>><input type="checkbox" value="bb14" name="seat[]" <?php $s='bb14'; check($s);?>><input type="checkbox" value="bb15" name="seat[]" <?php $s='bb15'; check($s);?>>
                                        <input type="checkbox" value="bb16" name="seat[]" <?php $s='bb16'; check($s);?>><input type="checkbox" value="bb17" name="seat[]" <?php $s='bb17'; check($s);?>><input type="checkbox" value="bb18" name="seat[]" <?php $s='bb18'; check($s);?>>
                                        <input type="checkbox" value="bb19" name="seat[]" <?php $s='bb19'; check($s);?>><input type="checkbox" value="bb20" name="seat[]" <?php $s='bb20'; check($s);?>><input type="checkbox" value="bb21" name="seat[]" <?php $s='bb21'; check($s);?>>
                                        <input type="checkbox" value="bb22" name="seat[]" <?php $s='bb22'; check($s);?>><input type="checkbox" value="bb23" name="seat[]" <?php $s='bb23'; check($s);?>><input type="checkbox" value="bb24" name="seat[]" <?php $s='bb24';check($s);?>>
                                       
                                        <br>
                                        <input type="checkbox" value="bc1" name="seat[]" <?php $s='bc1'; check($s);?>><input type="checkbox" value="bc2" name="seat[]"<?php $s='bc2'; check($s);?>><input type="checkbox" value="bc3" name="seat[]" <?php $s='bc3'; check($s);?>>
                                        <input type="checkbox" value="bc4" name="seat[]" <?php $s='bc4'; check($s);?>><input type="checkbox" value="bc5" name="seat[]" <?php $s='bc5'; check($s);?>><input type="checkbox" value="bc6" name="seat[]"<?php $s='bc6'; check($s);?>>
                                        <input type="checkbox" value="bc7" name="seat[]" <?php $s='bc7'; check($s);?>><input type="checkbox" value="bc8" name="seat[]" <?php $s='bc8'; check($s);?>><input type="checkbox" value="bc9" name="seat[]" <?php $s='bc9'; check($s);?>>
                                        <input type="checkbox" value="bc10" name="seat[]" <?php $s='bc10'; check($s);?>><input type="checkbox" value="bc11"name="seat[]" <?php $s='bc11'; check($s);?>><input type="checkbox" value="bc12" name="seat[]" <?php $s='bc12'; check($s);?>>
                                        <input type="checkbox" value="bc13" name="seat[]" <?php $s='bc13'; check($s);?>><input type="checkbox" value="bc14" name="seat[]" <?php $s='bc14'; check($s);?>><input type="checkbox" value="bc15" name="seat[]" <?php $s='bc15'; check($s);?>>
                                        <input type="checkbox" value="bc16" name="seat[]" <?php $s='bc16'; check($s);?>><input type="checkbox" value="bc17" name="seat[]" <?php $s='bc17'; check($s);?>><input type="checkbox" value="bc18" name="seat[]" <?php $s='bc18'; check($s);?>>
                                        <input type="checkbox" value="bc19" name="seat[]" <?php $s='bc19'; check($s);?>><input type="checkbox" value="bc20" name="seat[]" <?php $s='bc20'; check($s);?>><input type="checkbox" value="bc21" name="seat[]" <?php $s='bc21'; check($s);?>>
                                        <input type="checkbox" value="bc22" name="seat[]" <?php $s='bc22'; check($s);?>><input type="checkbox" value="bc23" name="seat[]" <?php $s='bc23'; check($s);?>><input type="checkbox" value="bc24" name="seat[]" <?php $s='bc24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="bd1" name="seat[]" <?php $s='bd1'; check($s);?>><input type="checkbox" value="bd2" name="seat[]" <?php $s='bd2'; check($s);?>><input type="checkbox" value="bd3" name="seat[]" <?php $s='bd3'; check($s);?>>
                                        <input type="checkbox" value="bd4" name="seat[]" <?php $s='bd4'; check($s);?>><input type="checkbox" value="bd5" name="seat[]" <?php $s='bd5'; check($s);?>><input type="checkbox" value="bd6" name="seat[]" <?php $s='bd6'; check($s);?>>
                                        <input type="checkbox" value="bd7" name="seat[]" <?php $s='bd7'; check($s);?>><input type="checkbox" value="bd8" name="seat[]" <?php $s='bd8'; check($s);?>><input type="checkbox" value="bd9" name="seat[]" <?php $s='bd9'; check($s);?>>
                                        <input type="checkbox" value="bd10" name="seat[]" <?php $s='bd10'; check($s);?>><input type="checkbox" value="bd11" name="seat[]" <?php $s='bd11'; check($s);?>><input type="checkbox" value="bd12" name="seat[]" <?php $s='bd12'; check($s);?>>
                                        <input type="checkbox" value="bd13" name="seat[]" <?php $s='bd13'; check($s);?>><input type="checkbox" value="bd14" name="seat[]" <?php $s='bd14'; check($s);?>><input type="checkbox" value="bd15" name="seat[]" <?php $s='bd15'; check($s);?>>
                                        <input type="checkbox" value="bd16" name="seat[]" <?php $s='bd16'; check($s);?>><input type="checkbox" value="bd17" name="seat[]" <?php $s='bd17'; check($s);?>><input type="checkbox" value="bd18" name="seat[]" <?php $s='bd18'; check($s);?>>
                                        <input type="checkbox" value="bd19" name="seat[]" <?php $s='bd19'; check($s);?>><input type="checkbox" value="bd20" name="seat[]" <?php $s='bd20'; check($s);?>><input type="checkbox" value="bd21" name="seat[]" <?php $s='bd21'; check($s);?>>
                                        <input type="checkbox" value="bd22" name="seat[]" <?php $s='bd22'; check($s);?>><input type="checkbox" value="bd23" name="seat[]" <?php $s='bd23'; check($s);?>><input type="checkbox" value="bd24" name="seat[]" <?php $s='bd24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="be1" name="seat[]" <?php $s='be1'; check($s);?>><input type="checkbox" value="be2" name="seat[]" <?php $s='be2'; check($s);?>><input type="checkbox" value="be3" name="seat[]" <?php $s='be3'; check($s);?>>
                                        <input type="checkbox" value="be4" name="seat[]" <?php $s='be4'; check($s);?>><input type="checkbox" value="be5" name="seat[]" <?php $s='be5'; check($s);?>><input type="checkbox" value="be6" name="seat[]" <?php $s='be6'; check($s);?>>
                                        <input type="checkbox" value="be7" name="seat[]" <?php $s='be7'; check($s);?>><input type="checkbox" value="be8" name="seat[]"<?php $s='be8'; check($s);?>><input type="checkbox" value="be9" name="seat[]" <?php $s='be9'; check($s);?>>
                                        <input type="checkbox" value="be10" name="seat[]" <?php $s='be10'; check($s);?>><input type="checkbox" value="be11" name="seat[]" <?php $s='be11'; check($s);?>><input type="checkbox" value="be12" name="seat[]" <?php $s='be12'; check($s);?>>
                                        <input type="checkbox" value="be13" name="seat[]" <?php $s='be13'; check($s);?>><input type="checkbox" value="be14" name="seat[]" <?php $s='be14'; check($s);?>><input type="checkbox" value="be15" name="seat[]" <?php $s='be15'; check($s);?>>
                                        <input type="checkbox" value="be16" name="seat[]" <?php $s='be16'; check($s);?>><input type="checkbox" value="be17" name="seat[]" <?php $s='be17'; check($s);?>><input type="checkbox" value="be18" name="seat[]" <?php $s='be18'; check($s);?>>
                                        <input type="checkbox" value="be19" name="seat[]" <?php $s='be19'; check($s);?>><input type="checkbox" value="be20" name="seat[]" <?php $s='be20'; check($s);?>><input type="checkbox" value="be21" name="seat[]" <?php $s='be21'; check($s);?>>
                                        <input type="checkbox" value="be22" name="seat[]" <?php $s='be22'; check($s);?>><input type="checkbox" value="be23" name="seat[]" <?php $s='be23'; check($s);?>><input type="checkbox" value="be24" name="seat[]" <?php $s='be24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="bf1" name="seat[]" <?php $s='bf1'; check($s);?>><input type="checkbox" value="bf2" name="seat[]"<?php $s='bf2'; check($s);?>><input type="checkbox" value="bf3" name="seat[]" <?php $s='bf3'; check($s);?>>
                                        <input type="checkbox" value="bf4" name="seat[]" <?php $s='bf4'; check($s);?>><input type="checkbox" value="bf5"  name="seat[]"<?php $s='bf5'; check($s);?>><input type="checkbox" value="bf6" name="seat[]" <?php $s='bf6'; check($s);?>>
                                        <input type="checkbox" value="bf7" name="seat[]" <?php $s='bf7'; check($s);?>><input type="checkbox" value="bf8"  name="seat[]"<?php $s='bf8'; check($s);?>><input type="checkbox" value="bf9" name="seat[]" <?php $s='bf9'; check($s);?>>
                                        <input type="checkbox" value="bf10" name="seat[]" <?php $s='bf10'; check($s);?>><input type="checkbox" value="bf11" name="seat[]" <?php $s='bf11'; check($s);?>><input type="checkbox" value="bf12" name="seat[]" <?php $s='bf12'; check($s);?>>
                                        <input type="checkbox" value="bf13" name="seat[]" <?php $s='bf13'; check($s);?>><input type="checkbox" value="bf14" name="seat[]" <?php $s='bf14'; check($s);?>><input type="checkbox" value="bf15" name="seat[]" <?php $s='bf15'; check($s);?>>
                                        <input type="checkbox" value="bf16" name="seat[]" <?php $s='bf16'; check($s);?>><input type="checkbox" value="bf17" name="seat[]" <?php $s='bf17'; check($s);?>><input type="checkbox" value="bf18" name="seat[]" <?php $s='bf18'; check($s);?>>
                                        <input type="checkbox" value="bf19" name="seat[]" <?php $s='bf19'; check($s);?>><input type="checkbox" value="bf20" name="seat[]" <?php $s='bf20'; check($s);?>><input type="checkbox" value="bf21" name="seat[]" <?php $s='bf21'; check($s);?>>
                                        <input type="checkbox" value="bf22" name="seat[]" <?php $s='bf22'; check($s);?>><input type="checkbox" value="bf23" name="seat[]" <?php $s='bf23'; check($s);?>><input type="checkbox" value="bf24" name="seat[]" <?php $s='bf24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="bg1" name="seat[]" <?php $s='bg1'; check($s);?>><input type="checkbox" value="bg2" name="seat[]" <?php $s='bg2'; check($s);?>><input type="checkbox" value="bg3" name="seat[]" <?php $s='bg3'; check($s);?>>
                                        <input type="checkbox" value="bg4" name="seat[]" <?php $s='bg4'; check($s);?>><input type="checkbox" value="bg5" name="seat[]" <?php $s='bg5'; check($s);?>><input type="checkbox" value="bg6" name="seat[]" <?php $s='bg6'; check($s);?>>
                                        <input type="checkbox" value="bg7" name="seat[]" <?php $s='bg7'; check($s);?>><input type="checkbox" value="bg8" name="seat[]" <?php $s='bg8'; check($s);?>><input type="checkbox" value="bg9" name="seat[]" <?php $s='bg9'; check($s);?>>
                                        <input type="checkbox" value="bg10" name="seat[]" <?php $s='bg10'; check($s);?>><input type="checkbox" value="bg11" name="seat[]" <?php $s='bg11'; check($s);?>><input type="checkbox" value="bg12" name="seat[]" <?php $s='bg12'; check($s);?>>
                                        <input type="checkbox" value="bg13" name="seat[]" <?php $s='bg13'; check($s);?>><input type="checkbox" value="bg14" name="seat[]" <?php $s='bg14'; check($s);?>><input type="checkbox" value="bg15" name="seat[]" <?php $s='bg15'; check($s);?>>
                                        <input type="checkbox" value="bg16" name="seat[]" <?php $s='bg16'; check($s);?>><input type="checkbox" value="bg17" name="seat[]" <?php $s='bg17'; check($s);?>><input type="checkbox" value="bg18" name="seat[]" <?php $s='bg18'; check($s);?>>
                                        <input type="checkbox" value="bg19" name="seat[]" <?php $s='bg19'; check($s);?>><input type="checkbox" value="bg20" name="seat[]" <?php $s='bg20'; check($s);?>><input type="checkbox" value="bg21" name="seat[]" <?php $s='bg21'; check($s);?>>
                                        <input type="checkbox" value="bg22" name="seat[]" <?php $s='bg22'; check($s);?>><input type="checkbox" value="bg23" name="seat[]" <?php $s='bg23'; check($s);?>><input type="checkbox" value="bg24" name="seat[]" <?php $s='bg24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="bh1" name="seat[]" <?php $s='bh1'; check($s);?>><input type="checkbox" value="bh2" name="seat[]" <?php $s='bh2'; check($s);?>><input type="checkbox" value="bh3" name="seat[]" <?php $s='bh3'; check($s);?>>
                                        <input type="checkbox" value="bh4" name="seat[]" <?php $s='bh4'; check($s);?>><input type="checkbox" value="bh5" name="seat[]" <?php $s='bh5'; check($s);?>><input type="checkbox" value="bh6" name="seat[]" <?php $s='bh6'; check($s);?>>
                                        <input type="checkbox" value="bh7" name="seat[]" <?php $s='bh7'; check($s);?>><input type="checkbox" value="bh8" name="seat[]" <?php $s='bh8'; check($s);?>><input type="checkbox" value="bh9" name="seat[]" <?php $s='bh9'; check($s);?>>
                                        <input type="checkbox" value="bh10" name="seat[]" <?php $s='bh10'; check($s);?>><input type="checkbox" value="bh11" name="seat[]" <?php $s='bh11'; check($s);?>><input type="checkbox" value="bh12" name="seat[]" <?php $s='bh12'; check($s);?>>
                                        <input type="checkbox" value="bh13" name="seat[]" <?php $s='bh13'; check($s);?>><input type="checkbox" value="bh14" name="seat[]" <?php $s='bh14'; check($s);?>><input type="checkbox" value="bh15" name="seat[]" <?php $s='bh15'; check($s);?>>
                                        <input type="checkbox" value="bh16" name="seat[]" <?php $s='bh16'; check($s);?>><input type="checkbox" value="bh17" name="seat[]" <?php $s='bh17'; check($s);?>><input type="checkbox" value="bh18" name="seat[]" <?php $s='bh18'; check($s);?>>
                                        <input type="checkbox" value="bh19" name="seat[]" <?php $s='bh19'; check($s);?>><input type="checkbox" value="bh20" name="seat[]" <?php $s='bh20'; check($s);?>><input type="checkbox" value="bh21" name="seat[]" <?php $s='bh21'; check($s);?>>
                                        <input type="checkbox" value="bh22" name="seat[]" <?php $s='bh22'; check($s);?>><input type="checkbox" value="bh23" name="seat[]" <?php $s='bh23'; check($s);?>><input type="checkbox" value="bh24" name="seat[]" <?php $s='bh24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="bi1" name="seat[]" <?php $s='bi1'; check($s);?>><input type="checkbox" value="bi2" name="seat[]" <?php $s='bi2'; check($s);?>><input type="checkbox" value="bi3" name="seat[]" <?php $s='bi3'; check($s);?>>
                                        <input type="checkbox" value="bi4" name="seat[]" <?php $s='bi4'; check($s);?>><input type="checkbox" value="bi5" name="seat[]" <?php $s='bi5'; check($s);?>><input type="checkbox" value="bi6" name="seat[]" <?php $s='bi6'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bi7" <?php $s='bi7'; check($s);?>><input type="checkbox" value="bi8" name="seat[]" <?php $s='bi8'; check($s);?>><input type="checkbox" value="bi9" name="seat[]" <?php $s='bi9'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bi10" <?php $s='bi10'; check($s);?>><input type="checkbox" value="bi11" name="seat[]" <?php $s='bi11'; check($s);?>><input type="checkbox" value="bi12" name="seat[]" <?php $s='bi12'; check($s);?>> 
                                        <input type="checkbox" name="seat[]" value="bi13" <?php $s='bi13'; check($s);?>><input type="checkbox" value="bi14" name="seat[]" <?php $s='bi14'; check($s);?>><input type="checkbox" value="bi15" name="seat[]" <?php $s='bi15'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bi16" <?php $s='bi16'; check($s);?>><input type="checkbox" value="bi17" name="seat[]" <?php $s='bi17'; check($s);?>><input type="checkbox" value="bi18" name="seat[]" <?php $s='bi18'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bi19" <?php $s='bi19'; check($s);?>><input type="checkbox" value="bi20" name="seat[]" <?php $s='bi20'; check($s);?>><input type="checkbox" value="bi21" name="seat[]" <?php $s='bi21'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bi22" <?php $s='bi20'; check($s);?>><input type="checkbox" value="bi23" name="seat[]" <?php $s='bi23'; check($s);?>><input type="checkbox" value="bi24" name="seat[]" <?php $s='bi24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" name="seat[]" value="bj1" <?php $s='bj1'; check($s);?>><input type="checkbox" value="bj2" name="seat[]" <?php $s='bj2'; check($s);?>><input type="checkbox" value="bj3" name="seat[]" <?php $s='bj3'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bj4" <?php $s='bj4'; check($s);?>><input type="checkbox" value="bj5" name="seat[]" <?php $s='bj5'; check($s);?>><input type="checkbox" value="bj6" name="seat[]" <?php $s='bj6'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bj7" <?php $s='bj7'; check($s);?>><input type="checkbox" value="bj8" name="seat[]" <?php $s='bj8'; check($s);?>><input type="checkbox" value="bj9" name="seat[]" <?php $s='bj9'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bj10" <?php $s='bj10'; check($s);?>><input type="checkbox" value="bj11" name="seat[]" <?php $s='bj11'; check($s);?>><input type="checkbox" value="bj12" name="seat[]" <?php $s='bj12'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bj13" <?php $s='bj13'; check($s);?>><input type="checkbox" value="bj14" name="seat[]" <?php $s='bj14'; check($s);?>><input type="checkbox" value="bj15" name="seat[]" <?php $s='bj15'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bj16" <?php $s='bj16'; check($s);?>><input type="checkbox" value="bj17" name="seat[]" <?php $s='bj17'; check($s);?>><input type="checkbox" value="bj18" name="seat[]" <?php $s='bj18'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bj19" <?php $s='bj19'; check($s);?>><input type="checkbox" value="bj20" name="seat[]" <?php $s='bj20'; check($s);?>><input type="checkbox" value="bj21" name="seat[]" <?php $s='bj21'; check($s);?>>
                                        <input type="checkbox" name="seat[]" value="bj22" <?php $s='bj22'; check($s);?>><input type="checkbox" value="bj23" name="seat[]" <?php $s='bj23'; check($s);?>><input type="checkbox" value="bj24" name="seat[]" <?php $s='bj24'; check($s);?>>
                                        
                                        
                                        
                                        <br>
                                        
                                        <hr>
                                        <p>BALCONY</p>
                                        <input type="checkbox" value="fa1" name="seat[]" <?php $s='fa1'; check($s);?>><input type="checkbox" value="fa2" name="seat[]" <?php $s='fa2'; check($s);?>><input type="checkbox" value="fa3" name="seat[]" <?php $s='fa3'; check($s);?>>
                                        <input type="checkbox" value="fa4" name="seat[]" <?php $s='fa4'; check($s);?>><input type="checkbox" value="fa5" name="seat[]" <?php $s='fa5'; check($s);?>><input type="checkbox" value="fa6" name="seat[]" <?php $s='fa6'; check($s);?>>
                                        <input type="checkbox" value="fa7" name="seat[]" <?php $s='fa7'; check($s);?>><input type="checkbox" value="fa8" name="seat[]" <?php $s='fa8'; check($s);?>><input type="checkbox" value="fa9" name="seat[]" <?php $s='fa9'; check($s);?>>
                                        <input type="checkbox" value="fa10" name="seat[]" <?php $s='fa10'; check($s);?>><input type="checkbox" value="fa11" name="seat[]" <?php $s='fa11'; check($s);?>><input type="checkbox" value="fa12" name="seat[]" <?php $s='fa12'; check($s);?>>
                                        <input type="checkbox" value="fa13" name="seat[]" <?php $s='fa13'; check($s);?>><input type="checkbox" value="fa14" name="seat[]" <?php $s='fa14'; check($s);?>><input type="checkbox" value="fa15" name="seat[]" <?php $s='fa15'; check($s);?>>
                                        <input type="checkbox" value="fa16" name="seat[]" <?php $s='fa16'; check($s);?>><input type="checkbox" value="fa17" name="seat[]" <?php $s='fa17'; check($s);?>><input type="checkbox" value="fa18" name="seat[]" <?php $s='fa18'; check($s);?>>
                                        <input type="checkbox" value="fa19" name="seat[]" <?php $s='fa19'; check($s);?>><input type="checkbox" value="fa20" name="seat[]" <?php $s='fa20'; check($s);?>><input type="checkbox" value="fa21" name="seat[]" <?php $s='fa21'; check($s);?>>
                                        <input type="checkbox" value="fa22" name="seat[]" <?php $s='fa22'; check($s);?>><input type="checkbox" value="fa23" name="seat[]" <?php $s='fa23'; check($s);?>><input type="checkbox" value="fa24" name="seat[]" <?php $s='fa24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="fb1" name="seat[]" <?php $s='fb1'; check($s);?>><input type="checkbox" value="fb2" name="seat[]" <?php $s='fb2'; check($s);?>><input type="checkbox" value="fb3" name="seat[]" <?php $s='fb3'; check($s);?>>
                                        <input type="checkbox" value="fb4" name="seat[]" <?php $s='fb4'; check($s);?>><input type="checkbox" value="fb5" name="seat[]" <?php $s='fb5'; check($s);?>><input type="checkbox" value="fb6" name="seat[]" <?php $s='fb6'; check($s);?>>
                                        <input type="checkbox" value="fb7" name="seat[]" <?php $s='fb7'; check($s);?>><input type="checkbox" value="fb8" name="seat[]" <?php $s='fb8'; check($s);?>><input type="checkbox" value="fb9" name="seat[]" <?php $s='fb9'; check($s);?>>
                                        <input type="checkbox" value="fb10" name="seat[]" <?php $s='fb10'; check($s);?>><input type="checkbox" value="fb11" name="seat[]" <?php $s='fb11'; check($s);?>><input type="checkbox" value="fb12" name="seat[]" <?php $s='fb12'; check($s);?>>
                                        <input type="checkbox" value="fb13" name="seat[]" <?php $s='fb13'; check($s);?>><input type="checkbox" value="fb14" name="seat[]" <?php $s='fb14'; check($s);?>><input type="checkbox" value="fb15" name="seat[]" <?php $s='fb15'; check($s);?>>
                                        <input type="checkbox" value="fb16" name="seat[]" <?php $s='fb16'; check($s);?>><input type="checkbox" value="fb17" name="seat[]" <?php $s='fb17'; check($s);?>><input type="checkbox" value="fb18" name="seat[]" <?php $s='fb18'; check($s);?>>
                                        <input type="checkbox" value="fb19" name="seat[]" <?php $s='fb19'; check($s);?>><input type="checkbox" value="fb20" name="seat[]" <?php $s='fb20'; check($s);?>><input type="checkbox" value="fb21" name="seat[]" <?php $s='fb21'; check($s);?>>
                                        <input type="checkbox" value="fb22" name="seat[]" <?php $s='fb22'; check($s);?>><input type="checkbox" value="fb23" name="seat[]" <?php $s='fb23'; check($s);?>><input type="checkbox" value="fb24" name="seat[]" <?php $s='fb24'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="fc1" name="seat[]" <?php $s='fc1'; check($s);?>><input type="checkbox" value="fc2" name="seat[]" <?php $s='fc2'; check($s);?>><input type="checkbox" value="fc3" name="seat[]" <?php $s='fc3'; check($s);?>>
                                        <input type="checkbox" value="fc4" name="seat[]" <?php $s='fc4'; check($s);?>><input type="checkbox" value="fc5" name="seat[]" <?php $s='fc5'; check($s);?>><input type="checkbox" value="fc6" name="seat[]"<?php $s='fc6'; check($s);?>>
                                        <input type="checkbox" value="fc7" name="seat[]" <?php $s='fc7'; check($s);?>><input type="checkbox" value="fc8" name="seat[]" <?php $s='fc8'; check($s);?>><input type="checkbox" value="fc9" name="seat[]" <?php $s='fc9'; check($s);?>>
                                        <input type="checkbox" value="fc10" name="seat[]" <?php $s='fc10'; check($s);?>><input type="checkbox" value="fc11" name="seat[]" <?php $s='fc11'; check($s);?>><input type="checkbox" value="fc12" name="seat[]" <?php $s='fc12'; check($s);?>>
                                        <input type="checkbox" value="fc13" name="seat[]" <?php $s='fc13'; check($s);?>><input type="checkbox" value="fc14" name="seat[]" <?php $s='fc14'; check($s);?>><input type="checkbox" value="fc15" name="seat[]" <?php $s='fc15'; check($s);?>>
                                        <input type="checkbox" value="fc16" name="seat[]" <?php $s='fc16'; check($s);?>><input type="checkbox" value="fc17" name="seat[]" <?php $s='fc17'; check($s);?>><input type="checkbox" value="fc18" name="seat[]" <?php $s='fc18'; check($s);?>>
                                        <input type="checkbox" value="fc19" name="seat[]" <?php $s='fc19'; check($s);?>><input type="checkbox" value="fc20" name="seat[]" <?php $s='fc20'; check($s);?>><input type="checkbox" value="fc21" name="seat[]" <?php $s='fc21'; check($s);?>>
                                        <input type="checkbox" value="fc22" name="seat[]" <?php $s='fc21'; check($s);?>><input type="checkbox" value="fc23" name="seat[]" <?php $s='fc23'; check($s);?>><input type="checkbox" value="fc24" name="seat[]" <?php $s='fc24'; check($s);?>>
                                        <br>
                                        <hr>
                                        <p>LUXURY</p>
                                        <input type="checkbox" value="la1" name="seat[]" <?php $s='la1'; check($s);?>><input type="checkbox" value="la2" name="seat[]" <?php $s='la2'; check($s);?>><input type="checkbox" value="la3"name="seat[]" <?php $s='la3'; check($s);?>>
                                        <input type="checkbox" value="la4" name="seat[]" <?php $s='la4'; check($s);?>><input type="checkbox" value="la5" name="seat[]" <?php $s='la5'; check($s);?>><input type="checkbox" value="la6" name="seat[]" <?php $s='la6'; check($s);?>>
                                        <input type="checkbox" value="la7" name="seat[]" <?php $s='la7'; check($s);?>><input type="checkbox" value="la8" name="seat[]" <?php $s='la8'; check($s);?>><input type="checkbox" value="la9" name="seat[]" <?php $s='la9'; check($s);?>>
                                        <input type="checkbox" value="la10" name="seat[]" <?php $s='la10'; check($s);?>><input type="checkbox" value="la11" name="seat[]" <?php $s='la11'; check($s);?>><input type="checkbox" value="la12" name="seat[]" <?php $s='la12'; check($s);?>>
                                        <input type="checkbox" value="la13" name="seat[]" <?php $s='la13'; check($s);?>><input type="checkbox" value="la14" name="seat[]" <?php $s='la14'; check($s);?>><input type="checkbox" value="la15" name="seat[]" <?php $s='la15'; check($s);?>>
                                        
                                        <br>
                                        <input type="checkbox" value="lb1" name="seat[]" <?php $s='lb1'; check($s);?>><input type="checkbox" value="lb2" name="seat[]" <?php $s='lb2'; check($s);?>><input type="checkbox" value="lb3" name="seat[]" <?php $s='lb3'; check($s);?>>
                                        <input type="checkbox" value="lb4" name="seat[]" <?php $s='lb4'; check($s);?>><input type="checkbox" value="lb5" name="seat[]" <?php $s='lb5'; check($s);?>><input type="checkbox" value="lb6" name="seat[]" <?php $s='lb6'; check($s);?>>
                                        <input type="checkbox" value="lb7" name="seat[]" <?php $s='lb7'; check($s);?>><input type="checkbox" value="lb8" name="seat[]" <?php $s='lb8'; check($s);?>><input type="checkbox" value="lb9" name="seat[]" <?php $s='lb9'; check($s);?>>
                                        <input type="checkbox" value="lb10" name="seat[]" <?php $s='lb10'; check($s);?>><input type="checkbox" value="lb11" name="seat[]" <?php $s='lb11'; check($s);?>><input type="checkbox" value="lb12" name="seat[]" <?php $s='lb12'; check($s);?>>
                                        <input type="checkbox" value="lb13" name="seat[]" <?php $s='lb13'; check($s);?>><input type="checkbox" value="lb14" name="seat[]" <?php $s='lb14'; check($s);?>><input type="checkbox" value="lb15" name="seat[]" <?php $s='lb15'; check($s);?>>
                                        <br>
                                        <br>
                                        <br>
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
                                        $q="SELECT bcost,fcost,lcost FROM shows WHERE shows_id=$eid";
                                        $qi=mysqli_query($con,$q);
                                        if($qi)
                                        {
                                        $qo=mysqli_fetch_assoc($qi);
                                        echo 'GROUND:'.$qo['bcost'].'rs         '.'BALCONY:'.$qo['fcost'].'rs       '.'LUXURY:'.$qo['lcost'].'rs       ';
                                        }
                                        ?>
                                        <br>
                                        <ion-button color="success" type="submit">BOOK MADI</ion-button>
                                  </form>
                                    </div>
                                    </ion-card>
                                    </center>
                        </ion-col>
                    </ion-row>
                </ion-grid>
               
            </ion-content>
    </ion-app>
</body>
</html>
