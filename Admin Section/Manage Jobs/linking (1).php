 <?php
$servername = 'localhost';
        $username = 'root';
        $dbase = 'searchbar';
        $pass = '';
        // Create connection
        $conn = new mysqli($servername, $username, $pass, $dbase);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 


if(isset($_POST['job_operation'])){
  $set = $_REQUEST['job_operation'];
  if($set == "add_job"){
        $data2=$_REQUEST['select_job'];
       error_reporting(E_ALL ^ E_WARNING);
      // collect value of input field
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
        $sql = mysqli_query($conn,"INSERT INTO job_details(`Job_id`, `J_Name`, `J_Type`, `J_Designation`, `J_KeySkill`, `J_Qualification`, `J_Salary`, `J_Experience`, `J_Place`, `J_Vacancies`, `J_Date`) VALUES ('$data1','$data2','$data3','$data4','$data5','$data6','$data7','$data8','$data9','$data10','$data11')");
            $b=1;
            $a = " job added successfully";
           $sql2 = mysqli_query($conn,"INSERT INTO stat_table(`id`,`status`,`jname`) VALUES ('$b', '$a', '$data2')");

            echo '<script>alert("New job added successfully.")</script>';
            echo "<p>New Job added successfully</p>";
    }
  

 }

   if($set == "delete_job"){
    $user_id = $_REQUEST['jid'];
    $set = $_REQUEST['select_job'];
    
    if($user_id !== "" && $set != ""){
         $query = mysqli_query($conn, "SELECT * FROM job_details WHERE Job_id='$user_id' AND J_Name='$set'");

  
    $row = mysqli_fetch_array($query);
   error_reporting(E_ALL ^ E_WARNING);
  
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
$del_query = "DELETE FROM job_details WHERE Job_id = '$user_id'";
$run = $conn->query($del_query);

echo '<script>alert("Job deleted successfully.")</script>';
 echo "<p>New Job deleted successfully</p>";
 }
}
    if($set == "update_job"){
        $user_id = $_REQUEST['jid'];
        $data2 = $_REQUEST['select_job'];
        $data1 = $_POST['jid'];

        error_reporting(E_ALL ^ E_WARNING);

// Report runtime errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
//error_reporting(E_ALL);


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
       $query = "UPDATE job_details SET Job_id='$data1', J_Name='$data2', J_Type='$data3', J_Designation='$data4', J_KeySkill='$data5', J_Qualification='$data6', J_Salary='$data7', J_Experience='$data8', J_Place='$data9', J_Vacancies='$data10', J_Date='$data11' WHERE Job_id = '$user_id' ";
        $run = $conn->query($query);

        echo '<script>alert("Job updated successfully.")</script>';
         echo "<p>New updated added successfully</p>";
    }
    
}
}

  
  





// Get the user id

?>
