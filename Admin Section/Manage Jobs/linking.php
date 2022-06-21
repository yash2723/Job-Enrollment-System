<?php

  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server , $username , $password);

  if(isset($_POST['job_operation'])){

    $set = $_REQUEST['job_operation'];

    if($set == "add_job") {
          
      // collect value of input field
      $data2 = $_REQUEST['select_job'];
      $data1 = $_POST['jid'];
      $data3 = $_POST['jtype'];
      $data4 = $_POST['jdesig'];
      $data5 = $_POST['jskills'];
      $data6 = $_POST['jquali'];
      $data7 = $_POST['jsalary'];
      $data8 = $_POST['jexp'];
      $data9 = $_POST['jplace'];
      $data10 = $_POST['jvacancy'];
      $data11 = $_POST['l_date'];         
          
      if(isset($_POST['submit'])){
              
        $sql = "INSERT INTO `job enrollment system`.`job_details` (`Job_Id`, `J_Name`, `J_Type`, `J_Designation`, `J_KeySkill`, `J_Qualification`, `J_Salary`, `J_Experience`, `J_Place`, `J_Vacancies`, `J_Date`) VALUES ('$data1', '$data2', '$data3', '$data4', '$data5', '$data6', '$data7', '$data8', '$data9', '$data10', '$data11')";

        if($con->query($sql) == true)
        {
          echo '<script>alert("New job added successfully.")</script>';
          header("Location: Manage_Job.php");
        }
        else
        {
          echo "Error.Please try again";
        }
      
      }
    

    }

    if($set == "delete_job"){

      $user_id = $_REQUEST['jid'];
      $set = $_REQUEST['select_job'];
      
      if($user_id !== "" && $set != "") {
        
        $query = mysqli_query($con, "SELECT * FROM `job enrollment system`.`job_details` WHERE Job_Id ='$user_id' AND J_Name='$set' ");
        $row = mysqli_fetch_array($query);
    
        // Get the first name
        $jname = $row['J_Name'];
        $jtype = $row['J_Type'];
        $jdesig = $row['J_Designation'];
        $jskills = $row['J_KeySkill'];
        $jquali = $row['J_Qualification'];
        $jsalary = $row['J_Salary'];
        $jexp = $row['J_Experience'];
        $jplace = $row['J_Place'];
        $jvacancy = $row['J_Vacancies'];
        $l_date = $row['J_Date'];

      }
  
      // Store it in a array
      $result = array("$jname", "$jtype","$jdesig","$jskills","$jquali","$jsalary","$jexp","$jplace","$jvacancy","$l_date");
        
      // Send in JSON encoded form
      $myJSON = json_encode($result);
      echo $myJSON;
      if(isset($_POST['submit'])){
      $del_query = "DELETE FROM `job enrollment system`.`job_details` WHERE Job_Id = '$user_id'";
      $run = $con->query($del_query);
      echo '<script>alert("Job deleted successfully.")</script>';
      header("Location: Manage_Job.php");
      }
    }

    if($set == "update_job"){

      $user_id = $_REQUEST['jid'];
      $data2 = $_REQUEST['select_job'];
      $data1 = $_POST['jid'];
      $data3 = $_POST['jtype'];
      $data4 = $_POST['jdesig'];
      $data5 = $_POST['jskills'];
      $data6 = $_POST['jquali'];
      $data7 = $_POST['jsalary'];
      $data8 = $_POST['jexp'];
      $data9 = $_POST['jplace'];
      $data10 = $_POST['jvacancy'];
      $data11 = $_POST['l_date'];

      if(isset($_POST['submit'])){
        echo "Done";
        $query = "UPDATE `job enrollment system`.`job_details` SET Job_Id='$data1', J_Name='$data2', J_Type='$data3', J_Designation='$data4', J_KeySkill='$data5', J_Qualification='$data6', J_Salary='$data7', J_Experience='$data8', J_Place='$data9', J_Vacancies='$data10', J_Date='$data11' WHERE Job_id = '$user_id' ";
        $run = $con->query($query);
        echo '<script>alert("Job updated successfully.")</script>';
        header("Location: Manage_Job.php");
      }
    
    }
  }

  
  

  $con->close();

// Get the user id

?>
