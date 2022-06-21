<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Optional theme -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index1.css">
        <link rel="stylesheet" href="main_quiz.css">
        <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>
    
    <title>Sahaj Technologies - Technical Test</title>
    <script type="text/javascript">
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";
window.onhashchange=function(){
    window.location.hash="no-back-button";
}    
    
    
    function display_ct6() {
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
    hours = x.getHours( ) % 12;
    hours = hours ? hours : 12;
    hours=hours.toString().length==1? 0+hours.toString() :hours;
    minutes=x.getMinutes().toString();
    minutes=minutes.length==1? 0+minutes :minutes;
    seconds=x.getSeconds().toString();
    seconds=seconds.length==1? 0+seconds :seconds;
    var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
    x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + ":" + ampm;
    document.getElementById('ct6').innerHTML = x1;
    display_c6();
     }
     function display_c6(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct6()',refresh)
    }
    display_c6();
  </script>
</head>
<body>


     





<?php
error_reporting(E_ALL^E_NOTICE);
session_start();
//include 'C:\xampp\htdocs\project\Front_end_pages\styles\main_quiz.css';
$ro1="";
$ro2="";
$ro3="";
$ro4="";
$ro5="";
$ro6="";
$ro7="";
$ro8="";





$server="localhost";
$dbuser="root";
$conn =mysqli_connect($server,$dbuser);
if(! $conn)
{
    die("could not connect".mysqli_connect_error());

}
$a="";
$b="";
$d="";
$an4="";
$an5="";
$an6="";
$an7="";
$an8="";
$an9="";

$em=$_SESSION["mail"];
$uid=$_SESSION["name"];
$h=date("H");
date_default_timezone_set("Asia/Kolkata");
$start=$_SESSION["start"];
        $mysqlend=date("$v:i:s");//time());
        $dbjob=$_SESSION["dbjob"];
$datejob=$_SESSION["dbjob"];
    $c1=strtotime($_SESSION["etime"]);
    $c=strtotime(date("H:i:s"));
    
    // echo date("H:i:s");
    if($c>$c1)
    {
       // header("Location:http://localhost/project/finish.php");
    echo "finish!";
    }


    $sql="SELECT `QUES_ID`,`QUEST`, `OPT1`, `OPT2`, `OPT3`, `OPT4`,`CORR_OPT` FROM `test questions`.`$datejob`;";
    $res=mysqli_query($conn,$sql);
    $number_of_results=mysqli_num_rows($res);
    $number_of_pages=ceil($number_of_results/1);
    // echo $number_of_pages;
    $pageno=$_GET["pageno"]; 
    if($pageno==""||$pageno==1)
{
    $pageno1=0;
}
else{
    $pageno1=($pageno*1)-1;
}


$sql="SELECT `QUES_ID`,`QUEST`, `OPT1`, `OPT2`, `OPT3`, `OPT4`,`CORR_OPT` FROM `test questions`.`$datejob` LIMIT $pageno1,1 ;";
$result=mysqli_query($conn,$sql);
if($result)
{
while($row=mysqli_fetch_array($result))
{
    $ro1=$row["QUES_ID"];
    $ro2=$row["QUEST"];
    $ro3=$row["OPT1"];
    $ro4=$row["OPT2"];
    $ro5=$row["OPT3"];
    $ro6=$row["OPT4"];
    $ro7=$row["CORR_OPT"];
    ?>
    <?php
 if(isset($_POST["submit1"]))
    {
        if($pageno==15)
        {
        $an15=$_POST["answer"];
        $sql64="UPDATE `test response`.`$dbjob` SET `ANS_NO15`='$an15' WHERE `EMAIL`='$em'";
        $res64=mysqli_query($conn,$sql64);
        if($res64)
        {
            header("Location: quiz_end.php");
       
        }
        $mysqlend=date("H:i:s");
        $sql65="UPDATE `test questions`.`$dbjob` SET `END_TIME`='$mysqlend' WHERE `EMAIL`='$em'";
        $res65=mysqli_query($conn,$sql65);
        if($res64)
        {
           echo "done!";
       
        }


        }}


   
   ?>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../Profile Page/images/web-logo1.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
    
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
    
            <li class="nav-item">
                <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    For Candidates
                </a>
    
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a style="color: #6c63ff;" class="dropdown-item" href="../Profile Page/index.php">Profile</a></li>
                    <li><a class="dropdown-item" href="../Resume Page/index.php">My Resume</a>
                    </li>
                    <li><a class="dropdown-item" href="../Find Jobs/index.php">Find Job</a>
                    </li>
                    <li><a class="dropdown-item" href="../Saved Jobs/index.php">Saved Jobs</a>
                    </li>
                    <li><a class="dropdown-item" href="../Applied Jobs/index.php">Applied
                        Jobs</a></li>
                    <li><a class="dropdown-item" href="../Job Alerts/index.php">Job Alerts</a>
                    </li>
                    <li><a class="dropdown-item" href="../Change Password/index.php">Change
                        Password</a></li>
                    <li><a class="dropdown-item" href="../Logout/logout.php">Logout</a></li>
                </ul>
                </div>
            </li>
    
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
    
            <li class="nav-item">
                <a class="nav-link" href="../Find Jobs/index.php">
                <i class="fas fa-search"></i>
                </a>
            </li>
    
            <li class="nav-item">

                <a style='color: white !important;' class="nav-link btn btn-primary register-btn" href="Sign-up/sign-up.php">
                <i class="fas fa-sign-out-alt"></i>
                Logout
                </a>

            </li>
    
            </ul>
    
        </div>
        </div>
    </nav>

     <div class="container" onmouseleave="myalert('hey')">
    <div class="quiz_title">
            <div class="title_text">
                <?php echo $dbjob ?>
            </div>
        
            <div class="quiz_timer">
                Time Left &nbsp;<span><iframe src="timing.php" width="110" height="25" scrolling="no"></iframe></span>
            </div>
        
        
        </div>
  <div class="quiz_body" id="curmovement"><div class="quiz_question"><span> <?php echo "Question No. ".$ro1."<br>";?></span><?php echo $ro2;?></div>
       

 <form action="jobtest.php?pageno=<?php echo $pageno;?>" method="POST">

    <?php     
$response=array();

if(isset($_POST["submit1"]))
{
    if($pageno==1)
    {
        $a=$_POST["answer"];
    
        $sql50="UPDATE `test response`.`$dbjob` SET `ANS_NO1`='$a' WHERE `EMAIL`='$em'";
        $res50=mysqli_query($conn,$sql50);
        if($res50)
        {
            echo "<script>alert('submited ans!');</script>";
        }
        else
        {
            echo "not con".$conn->error;
        }
    
    }
    if($pageno==2)
    {
        $b=$_POST["answer"];
    
        $sql51="UPDATE `test response`.`$dbjob` SET `ANS_NO2`='$b' WHERE `EMAIL`='$em'";
        $res51=mysqli_query($conn,$sql51);
        if($res51)
        {
            echo "<script>alert('submited ans!');</script>";
        }
        else
        {
            echo "not con".$conn->error;
        }
        
//    }
}
    if($pageno==3)
    {
        $d=$_POST["answer"];
    
        $sql52="UPDATE `test response`.`$dbjob` SET `ANS_NO3`='$d' WHERE `EMAIL`='$em'";
        $res52=mysqli_query($conn,$sql52);
        if($res52)
        {
            echo "<script>alert('submited ans!');</script>";
        }
        else
        {
            echo "not con".$conn->error;
        }
        
    //}
        }
        if($pageno==4)
        {
            $an4=$_POST["answer"];
    
            $sql53="UPDATE `test response`.`$dbjob` SET `ANS_NO4`='$an4' WHERE `EMAIL`='$em'";
            $res53=mysqli_query($conn,$sql53);
            if($res53)
            {
                echo "<script>alert('submited ans!');</script>";
            }
            else
            {
                echo "not con".$conn->error;
            }
            
          }
            if($pageno==5)
            {
                $an5=$_POST["answer"];
    
                $sql54="UPDATE `test response`.`$dbjob` SET `ANS_NO5`='$an5' WHERE `EMAIL`='$em'";
                $res54=mysqli_query($conn,$sql54);
                if($res54)
                {
                    echo "<script>alert('submited ans!');</script>";
                }
                else
                {
                    echo "not con".$conn->error;
                }
                

            }
    
            if($pageno==6){
        $an6=$_POST["answer"];
        
        $sql55="UPDATE `test response`.`$dbjob` SET `ANS_NO6`='$an6' WHERE `EMAIL`='$em'";
        $res55=mysqli_query($conn,$sql55);
        if($res55)
        {
            echo "<script>alert('submited ans!');</script>";
        }
        else
        {
            echo "not con".$conn->error;
        }
        

    }

        if($pageno==7)
    {
        $an7=$_POST["answer"];

        $sql56="UPDATE `test response`.`$dbjob` SET `ANS_NO7`='$an7' WHERE `EMAIL`='$em'";

        $res56=mysqli_query($conn,$sql56);
        if($res56)
        {
            echo "<script>alert('submited ans!');</script>";
        }
        else
        {
            echo "not con".$conn->error;
        }
        
    }
        if($pageno==8)
    {
        $an8=$_POST["answer"];
        
        $sql57="UPDATE `test response`.`$dbjob` SET `ANS_NO8`='$an8' WHERE `EMAIL`='$em'";
        
        $res57=mysqli_query($conn,$sql57);
        if($res57)
        {
            echo "<script>alert('submited ans!');</script>";
        }
        else
        {
            echo "not con".$conn->error;
        }
    



    }
        if($pageno==9)
        {
            $an9=$_POST["answer"];
        
            $sql58="UPDATE `test response`.`$dbjob` SET `ANS_NO9`='$an9' WHERE `EMAIL`='$em'";
        
            $res58=mysqli_query($conn,$sql58);
            if($res58)
            {
                echo "<script>alert('submited ans!');</script>";
            }
            else
            {
                echo "not con".$conn->error;
            }
            

            }
            if($pageno==10)
    {
        $an10=$_POST["answer"];
        $sql59="UPDATE `test response`.`$dbjob` SET `ANS_NO10`='$an10' WHERE `EMAIL`='$em'";
        $res59=mysqli_query($conn,$sql59);
        if($res59)
        {
            echo "<script>alert('submited ans!');</script>";
        }
        else
        {
            echo "not con".$conn->error;
        }
        
}

        if($pageno==11)
        {
            $an11=$_POST["answer"];
            
            $sql60="UPDATE `test response`.`$dbjob` SET `ANS_NO11`='$an11' WHERE `EMAIL`='$em'";
            
            $res60=mysqli_query($conn,$sql60);
            if($res60)
            {
                echo "<script>alert('submited ans!');</script>";
            }
            else
            {
                echo "not con".$conn->error;
            }
            
       
           }
            if($pageno==12)
            {
                $an12=$_POST["answer"];
       
                $sql61="UPDATE `test response`.`$dbjob` SET `ANS_NO12`='$an12' WHERE `EMAIL`='$em'";
       
                $res61=mysqli_query($conn,$sql61);
                if($res61)
                {
                    echo "<script>alert('submited ans!');</script>";
                }
                else
                {
                    echo "not con".$conn->error;
                }
                
             
            }
                

                if($pageno==13)
            {
                $an13=$_POST["answer"];
        
                $sql62="UPDATE `test response`.`$dbjob` SET `ANS_NO13`='$an13' WHERE `EMAIL`='$em'";
        
                $res62=mysqli_query($conn,$sql62);
                if($res62)
                {
                    echo "<script>alert('submited ans!');</script>";
                }
                else
                {
                    echo "not con".$conn->error;
                }
                
            
        }
        if($pageno==14)
        {
        $an14=$_POST["answer"];
                $sql63="UPDATE `test response`.`$dbjob` SET `ANS_NO14`='$an14' WHERE `EMAIL`='$em'";
        
        $res63=mysqli_query($conn,$sql63);
        if($res63)
        {
            echo "<script>alert('submited ans!');</script>";
        }
        else
        {
            echo "not con".$conn->error;
        }
        
    
}


    if($pageno==15)
    {
        $fif=$_POST["answer"];
        $_SESSION["fifteen"]=$response[15];
        print_r($_SESSION);
        $x=$_SESSION["first"];
        $y=$_SESSION["second"];
        $z=$_SESSION["third"];
        $q=$_SESSION["fourth"];    
        $f=$_SESSION["fifth"];
        $s=$_SESSION["sixth"];
        $s1=$_SESSION["seventh"];
        $e=$_SESSION["eighth"];
        $n=$_SESSION["ninth"];
        $t=$_SESSION["tenth"];
        $el=$_SESSION["eleventh"];
        $tw=$_SESSION["twelveth"];
        $thi=$_SESSION["thirteenth"];
        $ft=$_SESSION["fourteenth"];
        $fif=$_SESSION["fifteen"];
        $em=$_SESSION["emailadd"];
        $uid=$_SESSION["name"];
        $emin="<script>document.write(new Date().getMinutes());</script>";
        $eh="<script>document.write(new Date().getHours() %12);</script>";
        $es="<script>document.write(new Date().getSeconds());</script>";
        $endtim=$eh.":".$emin.":".$es;
        $endtime=DateTime::createFromFormat('H:i:s A',$endtim);
        setlocale(LC_ALL,NULL);
        $v=date("H");
        $start=$_SESSION["start"];
        $mysqlend=date("H:i:s");//time());
        echo $v."".$mysqlend;
        $marks=$_SESSION["marks"];
        $dbjob=$_SESSION["dbjob"];
    
}}}}
else
{
    echo "noo!!".$conn->error;
}

?>
   <div class="quiz_options">
                <ul>
                  <div class="first_options">

               <li> <input type="radio" name="answer" value="<?php echo $ro3;?>"><?php echo $ro3."";?></li>
                <li><input type="radio" name="answer" value="<?php echo $ro4;?>"><?php echo $ro4;?><br></li>
                </div>
                  <div class="second_options">
               <li><input type="radio" name="answer" value="<?php echo $ro5;?>"><?php echo $ro5;?><br></li>
                <li><input type="radio" name="answer" value="<?php echo $ro6;?>"><?php echo $ro6;?><br></li>
</ul>
</div>
        
<?php

mysqli_close($conn);
 
?>

<input type="submit"id="btn_next" class="btn btn-success" name="submit1" value="submit"<?php if(isset($_POST["answer"])){ echo 'style="display:none"';} if($c>$c1){  echo 'style="display:none"';}?>>
                       
</div>

<a style="font-size:26px; text-decoration: none; margin-left: 15px; font-weight: 600;" href="jobtest.php?pageno=<?php echo $pageno+1;?>"><?php if($c>$c1){echo '';} else{  
    echo "Next Question ⏭";     
    }?>
                </a>
                <?php if($c>$c1)
{
echo '<style="font: 20px;" >'.'<a style="font-size:20px;" href="quiz_end.php">end</a>'.'<style>';
}?> 
<?php

?></div>
                <br><br>
<?php if($c>$c1)
{
echo'<a href="quiz_end.php">end</a>';
}?>


 </body>

 </html>