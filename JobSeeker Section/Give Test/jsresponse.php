<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  $Job_Name = $_SESSION['Job_Name'];

  $apply_job_id = $_POST['Applied_Job_ID'];

  $server="localhost";
  $dbuser="root";
  $conn = mysqli_connect($server,$dbuser);
  if(! $conn)
  {
    die("could not connect".mysqli_connect_error());
  }

  $_SESSION["timezone"] = date_default_timezone_get();
  $p = date("H");
  $startime = date("$p:i:s");

  date_default_timezone_set('Asia/Kolkata');
  $date=date("Y-m-d");
  $startt=date("H:i:s");

  $flag = 0;

  if(isset($_POST["Aptitude"]))
  {
    
    $sql = "SELECT `ENT_Type`,`ENT_Date`,`ENT_StartTime`,`ENT_EndTime` FROM `job enrollment system`.`enrollment_test_details` WHERE CURRENT_TIMESTAMP>`ENT_StartTime` AND `ENT_Date`='$date' AND `ENT_Type`='$Job_Name' ";
    $res = mysqli_query($conn,$sql);
    
    if($res)
    {
      while($row=mysqli_fetch_assoc($res))
      {
        $dbjob = $row["ENT_Type"];

        if ($Job_Name != $dbjob) {
          echo "<script> alert('Your test is not scheduled.') </script>";
        }
        else {
          $flag = 1;
          $_SESSION["dbjob"] = $row["ENT_Type"];
          $_SESSION["stime"] = $row["ENT_StartTime"];
          $_SESSION["etime"] = $row["ENT_EndTime"];
          $_SESSION["test_date"] = $row["ENT_Date"];
          $b = date("H")+1;
          $z = $_SESSION["stime"];
          $d1 = strtotime($_SESSION["stime"]);
          $d=strtotime(date("H:i:s")); 
          $c=strtotime(date("H:i:s"));
          $c1=strtotime($_SESSION["etime"]);
          $rem=$c1-$c;
          $_SESSION["start"]=date("h:i:s");

          if($d>$d1)
          { 
            //echo "not time to test!";
            // header("Location:http://localhost/project/jsresponse.php");

            if($d<$c1)
            {
              $em=$_SESSION["mail"];
              $sql1="SELECT `EMAIL` FROM `test response`.`$dbjob`";
              $res1=mysqli_query($conn,$sql1);
              if($res1)
              {
                // while($row1=mysqli_fetch_assoc($res1))
                // {
                //   $email=$row1["EMAIL"];
                // }
                // if($em==$email)
                // {
                //   echo "<script> alert('Cant give test again!') </script>";
                // }
    
                // else
                // {
                  $nowtime=$_SESSION["start"];
                  $sql3="SELECT * FROM `job enrollment system`.`jobseeker_basic_details` WHERE `JS_EmailID`='$em'";
                  $res3=mysqli_query($conn,$sql3);
                  if($res3)
                  {
                    while($row2=mysqli_fetch_assoc($res3))
                    {
                      $fname=$row2['JS_FirstName'];
                      $lname=$row2['JS_LastName'];
                    }
                  }

                  // $sql2 = "INSERT INTO `test response`.`$dbjob` (`fname`,`lname`,`EMAIL`,`START_TIME`) VALUES ('$fname','$lname','$em','$nowtime') ";

                  $sql2 = "UPDATE `test response`.`$dbjob` SET `fname`='$fname',`lname`='$lname',`START_TIME`='$nowtime' WHERE EMAIL='$em' ";

                  if($conn->query($sql2) == true)
                  {
                    header("Location: quiz_instruction.php");
                  }

                // }
              }
            } 
            else
            {
              echo "<script> alert('Test finished.') </script>";
            }

          }
          else
          {
            // header("Location:http://localhost/project/usertest.php?pageno=1");
            echo "<script> alert('Test will start on scheduled time!') </script>";  
          }
        }
      }
    }
    else
    {
      echo "hmm".$conn->error;
    }
    //print_r($_SESSION);

  }
?>  

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="jsresponse.css">
  <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

</head>
<body>
  

  <!-- Navbar Section -->
  
  <!-- <div class="container"> -->
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
  <!-- </div> -->
  
  <!-- End Navbar Section -->

  <div class="card text-center">

    <div class="card-body">

      <h3 class="card-title"> <?php echo $Job_Name ?> Test</h3>

      <table class="table">
        <tbody>
          <tr>
            <th scope="row">Current Time : </th>
            <td><span id='ct6'></span></td>
          </tr>
          <tr>
            <th scope="row">Test Date : </th>
            <td><?php echo $_SESSION["test_date"]; ?></td>
          </tr>
          <tr>
            <th scope="row">Start Time : </th>
            <td><?php if($flag == 1) { echo $_SESSION['stime']; } else{ echo "No time specified."; } ?></td>
          </tr>
          <tr>
            <th scope="row">End Time : </th>
            <td><?php if($flag == 1) { echo $_SESSION['etime']; } else{ echo "No time specified."; } ?></td>
          </tr>
        </tbody>
      </table>

      <p class="card-text"></p>

      <form action="jsresponse.php" method="POST">
        <input type="submit" name="Aptitude" class="nav-link btn btn-primary" value="Give test" 
          <?php 
            $c=strtotime(date("H:i:s"));
            if($flag == 1) { $c1=strtotime($_SESSION["etime"]); }
          ?> 
        >                                
      </form>

      
      <form action="../Resume Page/g_cv_analysis1.php" method="POST">
        <input type="submit" name="Aptitude" class="nav-link btn btn-primary mt-4" value="Analyze CV">       
        <input type='hidden' name='Applied_Job_ID' value="<?php echo $apply_job_id; ?>">                         
      </form>

    </div>

  </div>

  <script>

    function display_ct6() {
      var x = new Date()
      var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
      hours = x.getHours( ) % 12;
      hours = hours ? hours : 12;hours=hours.toString().length==1? 0+hours.toString() :hours;

      minutes=x.getMinutes().toString();
      minutes=minutes.length==1? 0+minutes :minutes;
      seconds=x.getSeconds().toString();
      seconds=seconds.length==1? 0+seconds :seconds;
      var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
      x1 = x1 + " - " +  hours + ":" +  minutes + ":" + seconds + ":" + ampm;
      document.getElementById('ct6').innerHTML = x1;
      display_c6();
    }

    function display_c6() {
      var refresh=1000; // Refresh rate in milli seconds
      mytime=setTimeout('display_ct6()',refresh)
    }

    display_c6();

  </script>
                
  </body>
</html>


  