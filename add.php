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
                        <ion-button slot="end" color="success"><?php echo $_SESSION['venue'];?></ion-button>
                        <ion-button slot="end" color="success" href="alout.php">LOGOUT</ion-button>
                </ion-toolbar>
                <ion-grid>
                    <ion-row>
                        <ion-col>
                            <ion-card>
                                <ion-card-header>
                                    <div text-center>
                                    <h3><?php echo $_SESSION['venue']; ?></h3>
                                    </div>
                                </ion-card-header>
                                <ion-card-content>
                                <form method="post" action="madd.php">
                                <ion-item lines="none">
                                    <ion-label>SELECT THE MOVIE:</ion-label>
                                    <select name="show">
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
                                        $list="SELECT movie_name,movie_id,language FROM movie";
                                        $check=mysqli_query($con,$list);
                                        while($shows=mysqli_fetch_assoc($check)) {
                                        $id=$shows['movie_id'] ;
                                        $name=$shows['movie_name'] ;
                                        $lan=$shows['language']; 
                                    echo '<option value="'.$id.'">'.$name.'('.$lan.')</option>';
                                     }
                                        ?> 
                                        </select>
                                </ion-item>
                                <ion-item lines="none">
                                <ion-label>DATE OF SHOW:</ion-label>
                                <input type="date" name="date" min="<?php echo date("Y-m-d");?>">
                                </ion-item>
                                <ion-item lines="none">
                                <ion-label>TIME OF SHOW:</ion-label>
                                <input type="time" name="time">
                                </ion-item>
                                <ion-item lines="none">
                                <ion-label>SELECT SCREEN:</ion-label>
                                <select name="screen">
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
                                        $screenquery="SELECT screens FROM theatres_list";
                                        $screenqsend=mysqli_query($con,$screenquery);
                                        $screenoutput=mysqli_fetch_assoc($screenqsend);
                                        if($screenoutput)
                                        {
                                            echo $screenoutput['screens'];
                                            $i=$screenoutput['screens'];
                                        }
                                        for($k=1;$k<=$i;$k++){
                                            echo '<option value="'.$k.'">'.$k.'</option>';
                                        }
                                        ?>                           
                                </select>
                                </ion-item>
                                <ion-item lines="none">
                                    <ion-label>GROUND SEAT COST:</ion-label>
                                    <input type="number" name="gf">
                                </ion-item>
                                <ion-item lines="none">
                                    <ion-label>BALCONY SEAT COST:</ion-label>
                                    <input type="number" name="bf">
                                </ion-item>
                                <ion-item lines="none">
                                    <ion-label>LUXURY SEAT COST:</ion-label>
                                    <input type="number" name="lf">
                                </ion-item>
                                <div text_center>
                                <ion-row>
                                        <ion-col size="4.3"></ion-col>
                                        <ion-col size="4">
                                        <ion-button color="success" type="submit">ADD SHOW</ion-button>     
                                </ion-col>
                                    <ion-col size="3.7"></ion-col>         
                                </ion-row>
                                    </div>
                                    </form>
                                </ion-card-content>
                            </ion-card>
                        </ion-col>
                    </ion-row>
                </ion-grid>
        </ion-app>
    </body>


</html>