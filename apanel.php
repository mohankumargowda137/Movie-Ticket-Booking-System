<?php
session_start();
if (isset($_SESSION['uname']))
{
    unset($_SESSION['uname']);
    $_SESSION['log']=0;
    $_SESSION['user']=0;
}
?>
<html>
    <head>
            <title>BOOK MY SLOT</title>
            <link rel="icon" href="slogo.png" type="image/icon type">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.esm.js"></script>
            <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/dist/ionic/ionic.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@4.7.4/css/ionic.bundle.css"/>
    </head>
    <body>
        <ion-app>
        <ion-toolbar color="primary">
            <img src="logo.png" style="height:70px;">
        </ion-toolbar>
        <ion-content>
            <ion-grid>
                <ion-row>
                    <ion-col size-md="4">

                    </ion-col>
                    <ion-col size-md="4">
                        <ion-card color="dark">
                            <ion-card-header>
                                <div text-center>
                                        <ion-title>WELCOME, ADMIN PANEL</ion-title>
                                        <p>PLEASE ENTER CORRECT CRENDENTIALS</p>
                                </div>
                            </ion-card-header>
                            <ion-card-content>
                                <ion-row>
                                    <ion-col size="4"></ion-col>
                                    <ion-col size="4">
                                <img src="slogo.png" style="border-radius: 100%;height: 80px;width:80px;">
                            </ion-col>
                                <ion-col size="4"></ion-col>         
                            </ion-row>
                            <form action="aindex.php" method="post">
                                <ion-item >
                                <ion-label position="floating">
                                    USER NAME/ REGISTERED MOBILE:
                                </ion-label>
                                <ion-input type="text" name="uid"></ion-input>
                            </ion-item>
                            <ion-item>
                                    <ion-label position="floating">
                                        PASSWORD
                                    </ion-label>
                                    <ion-input type="password" name="pwd"></ion-input>
                                </ion-item>
                                <ion-row>
                                        <ion-col size="3"></ion-col>
                                        <ion-col size="4">
                                                <ion-button color="success" fill="solid" type="submit">LOGIN AS ADMIN</ion-button>
                                </ion-col>
                                    <ion-col size="5"></ion-col>         
                                </ion-row>
                               
                            </form>
                            <div text-center>
                                <ion-text>APPLY FOR ADMIN ACCOUNT,<a href="asignup.html"><b>HERE!</b></a></ion-text>
                            </div>
                            </ion-card-content>
                        </ion-card>
                    </ion-col>
                    <ion-col size-md="4">
                        
                    </ion-col>
                </ion-row>
            </ion-grid>
        </ion-content>
    </ion-app>
    </body>
</html>