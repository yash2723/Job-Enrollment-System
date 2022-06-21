<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

<?php
$server="localhost";
$dbuser="root";
$conn =mysqli_connect($server,$dbuser);
if(!$conn)
{
    die("could not connect".mysqli_connect_error());
}
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d");
$c=strtotime(date("H:i:s"));
$sql="SELECT `ENT_Type`,`ENT_Date`,`ENT_StartTime`,`ENT_EndTime` FROM `job enrollment system`.`enrollment_test_details`  WHERE CURRENT_TIMESTAMP>`ENT_StartTime` AND `ENT_Date`='$date';";
$res=mysqli_query($conn,$sql);
if($res)
{
while($row=mysqli_fetch_assoc($res))
{
    
    $d=$row["ENT_EndTime"];
    $c1=strtotime($d);
   // echo $d;
    $rem=$c1-$c;
    header("Refresh:1");
    $a1=intdiv($rem,3600);
    $b1= date("i",$rem);
    $c1=date("s",$rem);
    $tim=$a1.":".$b1.":".$c1;
    echo "<span style='font-size: 18px; font-weight: bold' >".$tim."</span>"."<br>";
    $timer=["hours" => $a1,"minutes" => $b1,"seconds" => $c1];
    
}}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    </head>
    <body onload=disp1()>

    <div class="quiz_timer" id="ct7">
                 <span id="ct6">
                    <?php    echo  header("Refresh:1;url=timing.php");?>
             </span>
    </div>
</body>
</html>