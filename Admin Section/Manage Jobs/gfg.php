<?php

    // Get the user id
    $user_id = $_REQUEST['jid'];

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server , $username , $password);

    if(!$con)
    {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";


    if ($user_id != "") {
	
        // Get corresponding first name and
        // last name for that user id	
        $query = mysqli_query($con, "SELECT * FROM `job enrollment system`.`job_details` WHERE Job_Id='$user_id'");

        $row = mysqli_fetch_array($query);

        if(isset($row['Job_Id'])) {

            // Get the first name
            $jname=$row['J_Name'];
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

    }
    else{
        echo '<script>alert("Not done")</script>';
    }



    // Store it in a array
    $result = array("$jname","$jtype","$jdesig","$jskills","$jquali","$jsalary","$jexp","$jplace","$jvacancy","$l_date");

    // Send in JSON encoded form
    $myJSON = json_encode($result);
    echo $myJSON;

?>
