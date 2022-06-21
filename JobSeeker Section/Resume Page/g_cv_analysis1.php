<?php
  session_start();
  $login_mail = $_SESSION['mail'];
  $Job_Name = $_SESSION['Job_Name'];

   $server = "localhost";
   $username = "root";
   $password = "";
   $conn = mysqli_connect($server, $username, $password);
 
   if(!$conn){
       die("connection to database failed due to " . mysqli_connect_error());
   }
   

 
  $job_id = $_POST['Applied_Job_ID'];
  $sql1= "SELECT * FROM `job enrollment system`.`job_details` WHERE Job_Id='$job_id' ";
  $result1 = mysqli_query($conn,$sql1);

  while ($row1 = mysqli_fetch_array($result1)) {
    $col2 = $row1['J_KeySkill'];   
    $col4 = $row1['J_Experience'];
  }


  $marks = 0;

  //  fetching data of job seekers CV 
  $sql2 = "SELECT * FROM `job enrollment system`.`jobseeker_resume_details` WHERE JS_EmailID='$login_mail' ";

  $result2 = mysqli_query($conn,$sql2);

  while ($row2 = mysqli_fetch_array($result2)) {
    $col5 = $row2['JSR_Skills'];
    $col7 = $row2['JSR_ExpYears'];
    $col8 = $row2['JSR_Projects'];
  }

  // experience evaluatiion

  if(!($col4=='') && !($col7=='')){
      $jExp = (int) filter_var($col4, FILTER_SANITIZE_NUMBER_INT);
      $jsExp = (int) filter_var($col7, FILTER_SANITIZE_NUMBER_INT);
      
  //     //preg_match_all('!\d+!', $col4, $jExp);   // extracting 4 from "4 Years" 
  //     // preg_match_all('!\d+!', $col7, $jsExp);
        
      if($jsExp>=$jExp){
          $rem = $jsExp-$jExp;
          if($rem == 0){
            $marks+=1;
          }
          elseif($rem>0 && $rem<3)
          {
            $marks+=2;
          }
          elseif($rem>=3 && $rem<6){
              $marks+=4;
          }
          elseif($rem>=6){
            $marks+=5;
          }
      }
  }
  

  // project evaluation
  if(!($col8=='')){
    $projects= explode(",",$col8);
    $noOfProjects = count($projects);
    if($noOfProjects>0 && $noOfProjects<3){
      $marks+=1;
    }
    elseif($noOfProjects>=3 && $noOfProjects<6){
      $marks+=3;
    }
    elseif($noOfProjects>=6){
      $marks+=5;
    }
  }
  
  // skills evaluation
  if(!($col5=='') && !($col2=='')){
    $J_skill= explode(",",$col2);
      $noOfskills = count($J_skill);
      $Js_skill= explode(",",$col5);
      $noOfJskills = count($Js_skill)-1;

      foreach($Js_skill as $key => $value) {
        $Js_skill[$key] = trim($value);
      }
      $result=array_intersect($J_skill, $Js_skill);
      
      if($result == $J_skill){
        $marks+=2;
        if($noOfskills<$noOfJskills){
          $marks+=3;
        }
      }
    
    
  }
  
  $sql = "INSERT INTO `test response`.`$Job_Name` (`EMAIL`,`JS_CVMARKS`) VALUES ('$login_mail', '$marks') ";
  mysqli_query($conn,$sql);

  header("Location: ../Give Test/jsresponse.php")

?>

