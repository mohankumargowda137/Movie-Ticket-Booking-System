<?php
session_start();
if($_SESSION['log']===1)
{
    $_SESSION['user']=1;
}
else{
    $_SESSION['user']=0;
    $_SESSION['type']='no';
}
$_SESSION['mid']=0;
?>
<html>
<head>
    <title>BOOK MY SLOT</title>
    <link rel="icon" href="slogo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/css/ionic.bundle.css"/>
    <script>
        var slides = document.querySelector('ion-slides');
        // Optional parameters to pass to the swiper instance. See http://idangero.us/swiper/api/ for valid options.
        slides.options = {
        initialSlide: 1,
        speed: 400
        }
        function set(a)
        {
         var b=a;
         document.cookie = "mid="+b;
        }
        
  </script>
 
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
                <ion-button md slot="end" color="success" href="accountr.php">WELCOME,'.$_SESSION['uname'].'</ion-button>
                <ion-button slot="end" color="success" href="lout.php">LOGOUT</ion-button> '; 
            }
            else{
               echo ' <ion-button slot="end" color="success" fill="solid" href="clogin.html">LOGIN</ion-button>
                <ion-button slot="end" color="success" fill="solid" href="apanel.php">ADMIN</ion-button>';
            }
            ?>
            </ion-toolbar>
        </ion-header>
        <ion-content>
      
        <ion-slides pager="true">

<ion-slide>
  <img src="b1.jpg">
</ion-slide>

<ion-slide>
  <img src="b2.png">
</ion-slide>

<ion-slide>
  <img src="b3.jpg">
</ion-slide>
</ion-slides>
            <ion-grid>
            <form action="list.php" method="post">
                <ion-row>
                    <ion-col size-md="4">
                            <ion-card>
                                    <ion-card-header>
                                        <div text-center>
                                                <ion-title>KURUKSHETRA</ion-title>
                                        </div>
                                    </ion-card-header>
                                    <img src="kurukshetra.jpg" height="200px" width="40px">
                                    <div text-center>
                                        <p>LANGUAGE:KANNADA</p>
                                        <p>MYTHOLOGICAL</p>
                                        <ion-button onclick="set(2)" href="list.php">BOOK</ion-button>
                                    </div>
                                </ion-card>
                    </ion-col>
                    <ion-col size-md="4">
                            <ion-card>
                                    <ion-card-header>
                                        <div text-center>
                                                <ion-title>SAHOO</ion-title>
                                        </div>
                                    </ion-card-header>
                                    <img src="Saaho.jpg" height="200px" width="40px">
                                    <div text-center>
                                        <p>LANGUAGE:TELUGU</p>
                                        <p>ACTION</p>
                                        <ion-button  onclick="set(3)" href="list.php">BOOK</ion-button>
                                    </div>
                                </ion-card>
                    </ion-col>
                    <ion-col size-md="4">
                            <ion-card>
                                    <ion-card-header>
                                        <div text-center>
                                                <ion-title>MISSION MANGALYAAN</ion-title>
                                        </div>
                                    </ion-card-header>
                                    <img src="mm.jpg" height="200px" width="40px">
                                    <div text-center>
                                        <p>LANGUAGE:HINDI</p>
                                        <p>SCIENCE | REALITY</p>
                                        <ion-button onclick="set(12)" href="list.php">BOOK</ion-button>
                                    </div>
                                </ion-card>
                    </ion-col>
                </ion-row>
                <ion-grid>
                    <ion-row>
                            <ion-col size-md="4">
                                    <ion-card>
                                            <ion-card-header>
                                                <div text-center>
                                                        <ion-title>BATLA HOUSE</ion-title>
                                                </div>
                                            </ion-card-header>
                                            <img src="bh.jpeg" height="200px" width="40px">
                                            <div text-center>
                                                <p>LANGUAGE:HINDI</p>
                                                <p>ACTION | THRILLER</p>
                                                <ion-button onclick="set(10)" href="list.php">BOOK</ion-button>
                                            </div>
                                        </ion-card>
                            </ion-col>
                            <ion-col size-md="4">
                                    <ion-card>
                                            <ion-card-header>
                                                <div text-center>
                                                        <ion-title>THE LION KING</ion-title>
                                                </div>
                                            </ion-card-header>
                                            <img src="lk.jpg" height="200px" width="40px">
                                            <div text-center>
                                                <p>LANGUAGE:ENGLISH</p>
                                                <p>FICTION | ANIMATED</p>
                                                <ion-button  onclick="set(9)" href="list.php">BOOK</ion-button>
                                            </div>
                                        </ion-card>
                            </ion-col>
                            <ion-col size-md="4">
                                    <ion-card>
                                            <ion-card-header>
                                                <div text-center>
                                                        <ion-title>PEHLWAAN</ion-title>
                                                </div>
                                            </ion-card-header>
                                            <img src="pwan.jpg" height="200px" width="40px">
                                            <div text-center>
                                                <p>LANGUAGE:KANNADA</p>
                                                <p>ACTION | SPORT</p>
                                                <ion-button  onclick="set(5)" href="list.php">BOOK</ion-button>
                                            </div>
                                        </ion-card>
                            </ion-col>
                    </ion-row>
                    <ion-row>
                    <ion-col size-md="4">
                                    <ion-card>
                                            <ion-card-header>
                                                <div text-center>
                                                        <ion-title>KISS</ion-title>
                                                </div>
                                            </ion-card-header>
                                            <img src="kiss.jpg" height="200px" width="40px">
                                            <div text-center>
                                                <p>LANGUAGE:KANNADA</p>
                                                <p>LOVE | YOUTH</p>
                                                <ion-button  onclick="set(8)" href="list.php">BOOK</ion-button>
                                            </div>
                                        </ion-card>
                            </ion-col>
                            <ion-col size-md="4">
                                    <ion-card>
                                            <ion-card-header>
                                                <div text-center>
                                                        <ion-title>THE LION KING</ion-title>
                                                </div>
                                            </ion-card-header>
                                            <img src="war.jpg" height="200px" width="40px">
                                            <div text-center>
                                                <p>LANGUAGE:HINDI</p>
                                                <p>ACTION | ADVENTURE</p>
                                                <ion-button  onclick="set(13)" href="list.php">BOOK</ion-button>
                                            </div>
                                        </ion-card>
                            </ion-col>
                            <ion-col size-md="4">
                                    <ion-card>
                                            <ion-card-header>
                                                <div text-center>
                                                        <ion-title>THE LION KING</ion-title>
                                                </div>
                                            </ion-card-header>
                                            <img src="chi.jpg" height="200px" width="40px">
                                            <div text-center>
                                                <p>LANGUAGE:HINDI</p>
                                                <p>COMEDY | YOUTH</p>
                                                <ion-button  onclick="set(7)" href="list.php">BOOK</ion-button>
                                            </div>
                                        </ion-card>
                            </ion-col>
                    </ion-row>
                    </form>
                </ion-grid>
            </ion-grid>
        </ion-content>
        
    </ion-app>
</body>
</html>
