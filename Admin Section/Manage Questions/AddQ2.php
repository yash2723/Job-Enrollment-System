<?php
error_reporting(E_ALL^E_NOTICE);
session_start();

if (!(isset($_SESSION['admin-mail']))) {
    header("Location: ../../Sign-in/sign-in.php");
}

$server="localhost";
$dbuser="root";
$conn =mysqli_connect($server,$dbuser);
if(! $conn)
{
    die("could not connect".mysqli_connect_error());


}
if(isset($_POST["btnsub"]))
{
  if(!empty($_POST['Operation']))
  {
    foreach(($_POST['Operation']) as $val)
    {
      if($val=="Add Questions")
      {
$ttype=$_POST["ENT_name"];
$qno=$_POST["qno"];
$question=$_POST["question"];
$opt1=$_POST["opt1"];
$opt2=$_POST["opt2"];
$opt3=$_POST["opt3"];
$opt4=$_POST["opt4"];
$corroptno=$_POST["corque"];

    
     if($corroptno==1)
     $sql4 = "INSERT INTO `test questions`.`$ttype`(`QUES_ID`,`QUEST`,`OPT1`,`OPT2`,`OPT3`,`OPT4`,`CORR_OPT`) VALUES ('$qno','$question','$opt1','$opt2','$opt3','$opt4','$opt1')";
     $res4=mysqli_query($conn,$sql4);
     if($res4)
     {
       echo "question added";
     }
    else
    {
      echo "not".$conn->error;
    } 
     if($corroptno==2)
     $sql1 = "INSERT INTO `test questions`.`$ttype`(`QUES_ID`,`QUEST`,`OPT1`,`OPT2`,`OPT3`,`OPT4`,`CORR_OPT`) VALUES ('$qno','$question','$opt1','$opt2','$opt3','$opt4','$opt2')";
     $res1=mysqli_query($conn,$sql1);
     if($res1)
     {
       echo "question added";
     }
    else
    {
      echo "not".$conn->error;
    }  
    if($corroptno==3)
    $sql2 = "INSERT INTO `test questions`.`$ttype`(`QUES_ID`,`QUEST`,`OPT1`,`OPT2`,`OPT3`,`OPT4`,`CORR_OPT`) VALUES ('$qno','$question','$opt1','$opt2','$opt3','$opt4','$opt3')";
    $res2=mysqli_query($conn,$sql2);
    if($res2)
    {
      echo "question added";
    }
   else
   {
     echo "not".$conn->error;
   } 
   if($corroptno==4)
   $sql3 = "INSERT INTO `test questions`.`$ttype`(`QUES_ID`,`QUEST`,`OPT1`,`OPT2`,`OPT3`,`OPT4`,`CORR_OPT`) VALUES ('$qno','$question','$opt1','$opt2','$opt3','$opt4','$opt4')";
   $res3=mysqli_query($conn,$sql3);
   if($res3)
   {
     echo "question added";
   }
  else
  {
    echo "not".$conn->error;
  } 
  
  
  
  
  
  
  
  
  }
elseif ($val=="Update Questions") {
  # code...
  $QUESTION="";
  $OPT1="";
  $OPT2="";
  $OPT3="";
  $OPT4="";
  $QUES="";
  $sql1="";
  $res1="";
  $res2="";
  $res3="";
  $res4="";
  $res5="";
  $REPLACE="";
  $sql2="";
  $sql3="";
  $sql4="";
  $sql5="";
  $OPTION1="";
  $OPTION2="";
  $OPTION3="";
  $OPTION4="";
  $testtype=$_POST["ENT_name"];
  
  $sql="SELECT `QUES_ID`,`QUEST`, `OPT1`, `OPT2`, `OPT3`, `OPT4`,`CORR_OPT` FROM `test questions`.`$testtype`";
  $res=mysqli_query($conn,$sql);
  if($res)
  {
      if(mysqli_num_rows($res)>0)
      {
  while($row=mysqli_fetch_assoc($res))
  {
      $QUES=$_POST["qno"];
          if($QUES==$row["QUES_ID"])  
          {
              $w=$_POST["question"];
              $sql1="UPDATE `test questions`.`$testtype` SET `QUEST`='$w' WHERE `QUES_ID`= '$QUES'";
              $res1=mysqli_query($conn,$sql1);
              if($res1)
                echo "updated!";
            else{
                echo "error";
            }


        
              $x=$_POST["opt1"];
              $sql2="UPDATE `test questions`.`$testtype` SET `OPT1`='$x'WHERE `QUES_ID`='$QUES'";
              $res2=mysqli_query($conn,$sql2);
              if($res2) 
                echo "updated!";
            else{
                echo "error";
            }
              $y=$_POST["opt2"];
              $sql3="UPDATE `test questions`.`$testtype` SET `OPT2`='$y' WHERE `QUES_ID`='$QUES'";
              $res3=mysqli_query($conn,$sql3);
              if($res3)
                echo "updated!";
            else{
                echo "error";
            }
              $z=$_POST["opt3"];
              $sql4="UPDATE `test questions`.`$testtype` SET `OPT3`='$z' WHERE `QUES_ID`='$QUES' ";
              $res4=mysqli_query($conn,$sql4);
              if($res4)
                echo "updated!";
            else{
                echo "error";
            }

  
                $h=$_POST["opt4"];
                $sql5="UPDATE `test questions`.`$testtype` SET `OPT4`='$h' WHERE `QUES_ID`='$QUES' ";
                $res5=mysqli_query($conn,$sql5);
                if($res5)
                  echo "updated!";
              else{
                  echo "error";
              }
          

          $correctans=$_POST["correct"];
          if($correctans==1)
          {
          $sql8="UPDATE `test questions`.`$testtype` SET `CORR_OPT`='$x' WHERE `QUES_ID`='$QUES'";
          if($conn->query($sql8)== true)
          {
              echo "question added!";
              $insert=true;
                                        
          
          
          }
          else
          {
              echo "error:$sql8<br>$conn->error";
          }}
          if($correctans==2)
          {
          $sql9="UPDATE `test questions`.`$testtype` SET `CORR_OPT`='$y' WHERE `QUES_ID`='$QUES'";
          if($conn->query($sql9)== true)
          {
              echo "question added!";
              $insert=true;
      
          
          
          }
          else
          {
              echo "error:$sql9<br>$conn->error";
          }}
         
          if($correctans==3)
          {
          $sql10="UPDATE `test questions`.`$testtype` SET `CORR_OPT`='$z' WHERE `QUES_ID`='$QUES'";
          if($conn->query($sql10)== true)
          {
              echo "question added!";
              $insert=true;
      
          
          
          }
          else
          {
              echo "error:$sql10<br>$conn->error";
          }}
          if($correctans==4)
          {
          $sql11="UPDATE `test questions`.`$testtype` SET `CORR_OPT`='$h' WHERE `QUES_ID`='$QUES'";
          if($conn->query($sql11)== true)
          {
              echo "question added!";
              $insert=true;
      
          
          
          }
          else
          {
              echo "error:$sql11<br>$conn->error";
          }}}
          

echo $correctans;


      }


}


}}
elseif($val=="Delete Questions")
{
  $ttype1=$_POST["ENT_name"];
  $DELQUE=$_POST["qno"];
  $sql50="DELETE  FROM `test questions`.`$ttype1` WHERE `QUES_ID`='$DELQUE'";
  if($conn->query($sql50)===true)
  {
      echo "deleted!";
  }
  else
  {
      echo "error:$sql50<br>$conn->error";
  }

}


}}}
// mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Questions </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
        <link href="AddEditStyles.css" rel="stylesheet">
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php">
        <img src="../../images/web-logo1.png" alt="Website logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../AdminHomePage.php">Home</a>
          </li>

          <li class="nav-item">

            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                For Employer
              </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="../Manage Jobs/Manage_Job.php">Manage Jobs</a></li>
                <li><a class="dropdown-item" href="../Schedule Test/scheduletest.php">Schedule Test</a></li>
                <li><a class="dropdown-item" href="../Manage Questions/AddQ2.php">Manage Questions</a></li>
                <li><a class="dropdown-item" href="../Show Details/ShowDetails.php">Show Details</a></li>
              </ul>
            </div>

          </li>

          <li class="nav-item">
            <a class="nav-link" href="../../company_profiles/company_profile.html">About</a>
          </li>

          <li class="nav-item">

            <a class="nav-link btn btn-primary login-btn" href="../../JobSeeker Section/Logout/logout.php">
              <i class="fas fa-lock"></i>
              Log Out
            </a>

          </li>

        </ul>

      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card fonts-google">
      <div class="card-body">
      <form class="form-vertical" role="form" name="addingForm" method="POST" action="AddQ2.php">

          <h2>Manage Questions</h2><br>
           <div class="form-group" align="center">
            <h1 align="center" style="font-size: 22px; font-weight: bold; margin-bottom: 20px;">&nbsp; Select Operation: </h1>
            <select style="width: 160px" name="Operation[]" id="job_operation">
                <option value="Add Questions">Add Questions</option>
                <option value="Delete Questions">Delete Questions</option>
                <option value="Update Questions">Update Questions</option>
              </select>
          </div>
          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Test Name: </p>
            <div class="col-sm-9">
              <select class="form-control" name="ENT_name">
                <?php      
                  $sql = "SELECT * FROM `job enrollment system`.`enrollment_test_details`";

                  $result = mysqli_query($conn,$sql);

                  while ($row = mysqli_fetch_array($result)) {

                    $ENT_name = $row['ENT_Type'];

                    echo "<option value='".$ENT_name."'>".$ENT_name."</option>";

                  }

                ?>
              <select>
            </div>
          </div>
          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Question Number : </p>
            <div class="col-sm-9">
                <input type="text" name="qno" placeholder="Question" class="form-control" autofocus>
            </div>
        </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter The Question : </p>
              <div class="col-sm-9">
                  <input type="text" name="question" placeholder="Question" class="form-control" autofocus>
              </div>
          </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter option 1 : </p>
              <div class="col-sm-9">
                  <input type="text" name="opt1" placeholder="First Option" class="form-control" autofocus>
              </div>
          </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter option 2 : </p>
              <div class="col-sm-9">
                  <input type="text" name="opt2" placeholder="Second Option" class="form-control" autofocus>
              </div>
          </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter option 3 : </p>
              <div class="col-sm-9">
                  <input type="text" name="opt3" placeholder="Third Option" class="form-control" autofocus>
              </div>
          </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter option 4 : </p>
              <div class="col-sm-9">
                  <input type="text" name="opt4" placeholder="Fourth Option" class="form-control" autofocus>
              </div>
          </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter the correct option : </p>
              <div class="col-sm-9">
                  <input type="text" name="corque" placeholder="Answer" class="form-control" autofocus>
                
              </div>
          </div>
          <input type="submit" name="btnsub"  class="btn btn-primary btn-block" id="btn-submit" value="Submit Question">
        </form>
      </div>
    </div>
  </div>
 

</body>
</html>