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
    </head>
    <body>
        <ion-app>
                <ion-toolbar color="primary">
                        <img src="logo.png" style="height:70px;">
                        <ion-button slot="end" color="success"><?php  echo $_SESSION['venue'];?></ion-button>
                        <ion-button slot="end" color="success" href="alout.php">LOGOUT</ion-button>
                </ion-toolbar>
                <ion-grid>
                    <ion-row>
                        <ion-col>
                            <ion-card>
                                <ion-card-header>
                                    <ion-title>
                                    ACCOUNT INFO
                                </ion-title>
                                
                                </ion-card-header>
                                <ion-card-content>
                                <p>WELCOME,
                                <?php
                                echo $_SESSION['oname'];
                                echo "<br>";
                                ?>
                                </p>
                                <p>ADMIN ID: BMCOM00
                                <?php
                                echo $_SESSION['id'];
                                ?>
                                </p>
                                <p>VENUE:
                                <?php
                                echo $_SESSION['venue'];
                                ?>
                                </p>
                                <p>CITY:
                                <?php
                                echo $_SESSION['city'];
                                ?>
                                </p>
                                <p>EMAIL:
                                <?php
                                echo $_SESSION['email'];
                                ?>
                                </p>
                                <p>MOBILE:
                                <?php
                                echo $_SESSION['mobile'];
                                ?>
                                </p>
                                <p>NUMBER OF SCREENS:
                                <?php
                                echo $_SESSION['nos'];
                                ?>
                                </p>
                                <ion-card-content>
                            </ion-card>
                            <ion-col >
                            <ion-card>
                            <ion-button color="success" fill="solid" href="add.php">ADD SHOWS</ion-button>
                            <ion-button color="success" fill="solid" href="view.php">VIEW SHOWS</ion-button>
                            </ion-card>
                            </ion-col>
                        </ion-col>
                    </ion-row>
                </ion-grid>
        </ion-app>
    </body>
</html>