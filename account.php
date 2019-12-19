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
if($_SESSION['disp']===null)
{
  $disp=0;
}
else{
  $disp=$_SESSION['disp'];
}
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
  function pay(a,b)
  {
    document.cookie="pid="+a;
    document.cookie="sid="+b;
  }
  </script>
</head>
<body>
    <ion-app>
    
    <ion-menu side="start">
      <ion-header>
        <ion-toolbar color="success">
            <ion-title>WELCOME, <?php echo strtoupper($_SESSION['uname']); ?></ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-content>
        <ion-list>
          <ion-item lines="none">
            <ion-icon name="home" slot="start"></ion-icon>
            <ion-button fill="clear" href="index.php" size="medium">HOME</ion-label>
          </ion-item>
          <ion-item lines="none">
            <ion-icon name="person" slot="start"></ion-icon>
            <ion-button href="sacc.php" fill="clear"  size="medium">PROFILE</ion-label>
          </ion-item>
          <ion-item lines="none">
            <ion-icon name="chatbubbles" slot="start"></ion-icon>
            <ion-button href="tic.php" fill="clear"  size="medium">TICKETS</ion-label>
          </ion-item lines="none">
        </ion-list>
      </ion-content>
    </ion-menu>
    <div class="ion-page" main>
      <ion-header>
        <ion-toolbar color="primary">
          <ion-buttons slot="start">
            <ion-menu-button></ion-menu-button>
          </ion-buttons>
          <img src="logo.png" style="height:70px;">
          <ion-button slot="end" color="success" href="lout.php">LOGOUT</ion-button>
        </ion-toolbar>
      </ion-header>
      <?php if($disp===0){
        $id=$_SESSION['uid'];
        $q="SELECT COUNT(*) as total FROM ticket WHERE user_id=$id";
        $q1=mysqli_query($con,$q);
        $qr=mysqli_fetch_assoc($q1);
        $w="SELECT COUNT(*) as success FROM ticket WHERE user_id=$id AND cancel=0 AND acancel=0";
        $w1=mysqli_query($con,$w);
        $wr=mysqli_fetch_assoc($w1);
        $r="SELECT COUNT(*) as total FROM ticket WHERE user_id=$id AND cancel=1";
        $r1=mysqli_query($con,$r);
        $rr=mysqli_fetch_assoc($r1);
        $t=date("H:i:s");
        $d=date("Y-m-d");
        $u="SELECT COUNT(*) as total FROM ticket WHERE user_id=$id AND cancel=0 AND acancel=1";
        $u1=mysqli_query($con,$u);
        if($u1)
        {
        $ur=mysqli_fetch_assoc($u1);
        }
        $p="SELECT SUM(cost) as total FROM ticket WHERE user_id=$id and cancel=0 and acancel=0";
        $p1=mysqli_query($con,$p);
        if($p1)
        {
        $pr=mysqli_fetch_assoc($p1);
        }
        $v="SELECT SUM(quantity) as total FROM ticket WHERE user_id=$id AND cancel=0 AND acancel=0";
        $v1=mysqli_query($con,$v);
        if($v1)
        {
        $vr=mysqli_fetch_assoc($v1);
        }
        ?>
      <ion-content>
      <ion-grid>
      <ion-row>
      <ion-col size-md="4">
      <ion-card color="dark">
      <center>
      <ion-card-header>
      <ion-title>TOTAL BOOKINGS</ion-title>
      </ion-card-header>
      <ion-card-content>
      <font size="10"><?php echo $qr['total'];?> </font>
      </ion-card-content>
      </center>
      </ion-card>
      </ion-col>
      <ion-col size-md="4">
      <ion-card color="success">
      <center>
      <ion-card-header>
      <ion-title>SUCCESSFULL ENTERTAINMENT</ion-title>
      </ion-card-header>
      <ion-card-content>
      <font size="10"><?php echo $wr['success'];?> </font>
      </ion-card-content>
      </center>
      </ion-card>
      </ion-col>
      <ion-col size-md="4">
      <ion-card color="danger">
      <center>
      <ion-card-header>
      <ion-title>CANCELLED</ion-title>
      </ion-card-header>
      <ion-card-content>
      <font size="10"><?php echo $rr['total'];?> </font>
      </ion-card-content>
      </center>
      </ion-card>
      </ion-col>
      </ion-row>
      <ion-row>
      <ion-col size-md="4">
      <ion-card color="medium">
      <center>
      <ion-card-header>
      <ion-title>UNDELIVERED PROMISES</ion-title>
      </ion-card-header>
      <ion-card-content>
      <font size="10"><?php echo $ur['total'];?> </font>
      </ion-card-content>
      </center>
      </ion-card>
      </ion-col>
      <ion-col size-md="4">
      <ion-card color="warning">
      <center>
      <ion-card-header>
      <ion-title>TOTAL TRANSACTION</ion-title>
      </ion-card-header>
      <ion-card-content>
      <font size="10"><?php if($pr['total']!=NULL){ echo $pr['total'];}else{ echo'0';}?> </font>
      </ion-card-content>
      </center>
      </ion-card>
      </ion-col>
      <ion-col size-md="4">
      <ion-card color="tertiary">
      <center>
      <ion-card-header>
      <ion-title>TOTAL SEATS BOOKED</ion-title>
      </ion-card-header>
      <ion-card-content>
      <font size="10"><?php if($vr['total']!=NULL){ echo $vr['total'];}else{ echo'0';}?> </font>
      </ion-card-content>
      </center>
      </ion-card>
      </ion-col>
      </ion-row>
      </ion-grid>
      </ion-content>
<?php }if($disp===1){?>
        <ion-content padding>
      <ion-grid>
        <ion-row>
          <ion-col size-md="5" offset="3.5">
          <ion-card>
            <div text-center>
              <ion-card-header>
                  <ion-title>YOUR PROFILE</ion-title>
              </ion-card-header>
              <ion-card-content>
                <center>
                <table>
                  <tr>
                <td><p><font size="4"><b>NAME:</b></font></p></td><td><p><font size="4"><?php echo  strtoupper($_SESSION['uname']);?></font></p></td></tr>
                <tr><td><p><font size="4"><b>USER ID:</b></font></p></td><td><p><font size="4"><?php echo  strtoupper($_SESSION['uid']);?></font></p></td></tr>
                <tr><td><p><font size="4"><b>MOBILE:</b></font></p></td><td><p><font size="4"><?php echo  strtoupper($_SESSION['mobile']);?></font></p></td></tr>
                <tr><td><p><font size="4"><b>EMAIL:</b></font></p></td><td><p><font size="4"><?php echo  strtoupper($_SESSION['email']);?></font></p></td></tr>
                </table>
                </center>
              </ion-card-content>
      </ion-row>
      </ion-col>
      </div>
          </ion-card>
          </ion-grid>
      </ion-content>
      <?php } if($disp===2){?>
        <ion-content>
        <?php
        $id=$_SESSION['uid'];
        $q="SELECT * FROM ticket WHERE user_id=$id ORDER BY date  DESC";
        $qin=mysqli_query($con,$q);
        if($qin)
        {
        while($row=mysqli_fetch_assoc($qin))
        {
          $sid=$row['showid'];
          $ticket=$row['ticket_id'];
          $m="SELECT * FROM shows WHERE shows_id=$sid";
          $min=mysqli_query($con,$m);
          $mr=mysqli_fetch_assoc($min);
          $mid=$mr['movie_id'];
          $mn="SELECT * FROM movie WHERE movie_id=$mid";
          $mnin=mysqli_query($con,$mn);
          $mnr=mysqli_fetch_assoc($mnin);
          $tid=$row['theatre_id'];
          $mn1="SELECT * FROM theatres_list WHERE uid='$tid'";
          $mnin1=mysqli_query($con,$mn1);
          $mnr1=mysqli_fetch_assoc($mnin1);
        ?>
        <ion-card>
          <ion-card-header>
            <ion-title><?php echo $mnr['movie_name'];?></ion-title>
        </ion-card-header>
        <ion-card-content>
          <p>AMOUNT: <?php echo $row['cost'];?></p>
          <p>NUMBER OF TICKETS: <?php echo $row['quantity'];?></p>
          <p>VENUE: <?php echo $mnr1['theatre_name'];?></p>
          <p>SEATS: <?php echo $row['seatid'];?></p>
          <p>DATE: <?php echo date("d-m-Y",strtotime($row['date']));?></p>
          <?php 
          if($row['cancel']==='0'){
            date_default_timezone_set('Asia/Kolkata');
            $d=date("Y-m-d");
            $t=date("H:i:sa");
            $e=strtotime($mr['time']);
          if($mr['date']>=$d && $row['acancel']==='0')
          {
            if($mr['date']>$d)
            {
          ?>
          <ion-button onclick="pay(<?php echo $ticket.','.$sid;?>)" href="ct.php" slot="end"> CANCEL TICKET</ion-button>
          <?php }if($mr['date']===$d && $t<=date("H:i:sa",$e)){?>
            <ion-button onclick="pay(<?php echo $ticket;?>)" href="ct.php" slot="end"> CANCEL TICKET</ion-button>
          <?php }}}if($row['cancel']==='1'){?>
          <p><font color="red">YOU CANCELLED THE BOOKING</font></p>
          <?php }if($row['acancel']==='1' && $row['cancel']==='0'){?>
            <p><font color="red">SORRY FOR INCOVENIENCE,SHOW WAS CANCELLED,YOUR AMOUNT WILL BE REFUNDED</font></p>
          <?php }?>
          
        </ion-card-content>
        </ion-card>
        <?php } } ?>
        </ion-content>
      <?php } ?>
    </div>
  </ion-app>
 
    
</ion-app>
</body>
</html>