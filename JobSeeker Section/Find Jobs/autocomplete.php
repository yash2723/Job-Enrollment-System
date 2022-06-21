<?php
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server , $username , $password);

    if(!$con)
    {
        // die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    if(!empty($_POST["keyword"])) {
        $query ="SELECT J_Name FROM `job enrollment system`.`job_details` WHERE J_Name like '%" . $_POST["keyword"] . "%' ORDER BY J_Name LIMIT 10";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
        if($count < 1){
            echo "Not found your job.";
        }
        else
        {
            $alert='<div class="autocomplete" id="state-list">';  //id=state-list and autocomplete are inbuild
            while($row = mysqli_fetch_array($result)){
                $name = $row["J_Name"];
                $alert.="<div class='autocomplete-items' onClick='selectJ(\"$name\")'>$name</div>";
            }
            $alert.="</div>";
            echo $alert;
        }
    } 
?>
