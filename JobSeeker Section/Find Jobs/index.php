<?php

    session_start();
    $login_mail = $_SESSION['mail'];

    if (!(isset($_SESSION['mail']))) {
        header("Location: ../../Sign-in/sign-in.php");
    }

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server , $username , $password);

    if(!$con)
    {
        // die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    profile_start:

    $sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_personal_details`";


    $result = mysqli_query($con,$sql);
            
    $profile_flag = 0;

    while ($row = mysqli_fetch_array($result)) {
        $col1 = $row['JS_EmailID']; 

        //echo "question no.".$col1."<br>".$col2."<br>"."<br>";

        if ($col1 == $login_mail) {
                $profile_flag = 1;
                break;
        }
    }

    if ($profile_flag == 1) {
        //echo "Your Email address already registered.";

        $sql = "SELECT * FROM `job enrollment system`.`jobseeker_personal_details` WHERE JS_EmailID='$login_mail' ";

        $result = mysqli_query($con,$sql);

        while ($row = mysqli_fetch_array($result)) {

            $JS_Name = $row['JS_Name']; 
            $JS_Profession = $row['JS_Profession']; 
            $JS_ProfileImg_name = $row['JS_ProfileImg_name']; 
            $JS_ProfileImg_type = $row['JS_ProfileImg_type']; 
            $JS_ProfileImg_size = $row['JS_ProfileImg_size']; 
        
            //echo "question no.".$col1."<br>".$col2."<br>"."<br>";

            if(isset($_POST['submit-img']) || isset($_POST['submit-img-res']))
            {
                // $width = (int)"<script>document.write(window.innerWidth); </script>";
                // echo "$width".gettype($width);
                // $int_cast = intval($width);
                // $a = 1060;
                // echo $a." ".gettype($a);
                // echo $int_cast." ".gettype($int_cast);
                // // $int_width = (int)$width;
                // // echo "W :-- ".$width;

                if (isset($_POST['submit-img'])) {
                    $file = rand(1000,100000)."-".$_FILES['camera-icon']['name'];
                    $file_loc = $_FILES['camera-icon']['tmp_name'];
                    $file_size = $_FILES['camera-icon']['size'];
                    $file_type = $_FILES['camera-icon']['type'];
                    $folder="../Profile Page/upload/";

                    /* new file size in KB */
                    $new_size = $file_size/1024;  
                    /* new file size in KB */
                            
                    /* make file name in lower case */
                    $new_file_name = strtolower($file);
                            
                    $final_file=str_replace(' ','-',$new_file_name);
                            
                    if(move_uploaded_file($file_loc,$folder.$final_file))
                    {
                        $sql = "UPDATE `job enrollment system`.`jobseeker_personal_details` SET `JS_ProfileImg_name`='$final_file',`JS_ProfileImg_type`='$file_type',`JS_ProfileImg_size`='$new_size' WHERE JS_EmailID='$login_mail' ";
                    
                        mysqli_query($con,$sql);
                        // echo "File sucessfully upload";
                        echo '<script>alert("File sucessfully upload.")</script>';
                        unset($_POST['submit-img']);
                        goto profile_start;
                    }
                    else
                    {
                        echo "Error.Please try again";
                    }
                }
                else {
                    $file = rand(1000,100000)."-".$_FILES['camera-icon-res']['name'];
                    $file_loc = $_FILES['camera-icon-res']['tmp_name'];
                    $file_size = $_FILES['camera-icon-res']['size'];
                    $file_type = $_FILES['camera-icon-res']['type'];
                    $folder="../Profile Page/upload/";

                    /* new file size in KB */
                    $new_size = $file_size/1024;  
                    /* new file size in KB */
                            
                    /* make file name in lower case */
                    $new_file_name = strtolower($file); 
                            
                    $final_file=str_replace(' ','-',$new_file_name);
                            
                    if(move_uploaded_file($file_loc,$folder.$final_file))
                    {
                        $sql = "UPDATE `job enrollment system`.`jobseeker_personal_details` SET `JS_ProfileImg_name`='$final_file',`JS_ProfileImg_type`='$file_type',`JS_ProfileImg_size`='$new_size' WHERE JS_EmailID='$login_mail' ";
                    
                        mysqli_query($con,$sql);
                        // echo "File sucessfully upload";
                        echo '<script>alert("File sucessfully upload.")</script>';
                        unset($_POST['submit-img-res']);
                        goto profile_start;
                    }
                    else
                    {
                        echo "Error.Please try again";
                    }
                }
            }


        
        }
        
    }
    else{

        //echo "Code in else block";

        if(isset($_POST['submit-img']))
        {
            $file = rand(1000,100000)."-".$_FILES['camera-icon']['name'];
            $file_loc = $_FILES['camera-icon']['tmp_name'];
            $file_size = $_FILES['camera-icon']['size'];
            $file_type = $_FILES['camera-icon']['type'];
            $folder="../Profile Page/upload/";
                    
            /* new file size in KB */
            $new_size = $file_size/1024;  
            /* new file size in KB */
                    
            /* make file name in lower case */
            $new_file_name = strtolower($file);
                    
            $final_file=str_replace(' ','-',$new_file_name);
                    
            if(move_uploaded_file($file_loc,$folder.$final_file))
            {
                $sql="INSERT INTO `job enrollment system`.`jobseeker_personal_details` (`JS_EmailID`, `JS_ProfileImg_name`,`JS_ProfileImg_type`,`JS_ProfileImg_size`) VALUES('$login_mail','$final_file','$file_type','$new_size')";
                mysqli_query($con,$sql);
                // echo "File sucessfully upload";
                echo '<script>alert("File sucessfully upload.")</script>';
                unset($_POST['submit-img']);
                goto profile_start;
            }
            else
            {
                echo "Error.Please try again";
            }
        }

        if (isset($_POST['submit-img-res'])) {
            $file = rand(1000,100000)."-".$_FILES['camera-icon-res']['name'];
            $file_loc = $_FILES['camera-icon-res']['tmp_name'];
            $file_size = $_FILES['camera-icon-res']['size'];
            $file_type = $_FILES['camera-icon-res']['type'];
            $folder="../Profile Page/upload/";

            /* new file size in KB */
            $new_size = $file_size/1024;  
            /* new file size in KB */
                            
            /* make file name in lower case */
            $new_file_name = strtolower($file); 
                            
            $final_file=str_replace(' ','-',$new_file_name);
                        
            if(move_uploaded_file($file_loc,$folder.$final_file))
            {
                $sql="INSERT INTO `job enrollment system`.`jobseeker_personal_details` (`JS_EmailID`, `JS_ProfileImg_name`,`JS_ProfileImg_type`,`JS_ProfileImg_size`) VALUES('$login_mail','$final_file','$file_type','$new_size')";
                mysqli_query($con,$sql);
                // echo "File sucessfully upload";
                echo '<script>alert("File sucessfully upload.")</script>';
                unset($_POST['submit-img-res']);
                goto profile_start;
            }
            else
            {
                echo "Error.Please try again";
            }
        }

    }

    start:

    $sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_saved_jobs_details`";

    $result = mysqli_query($con,$sql);
            
    $flag = 0;

    while ($row = mysqli_fetch_array($result)) {
        $col1 = $row['JS_EmailID']; 

        //echo "question no.".$col1."<br>".$col2."<br>"."<br>";

        if ($col1 == $login_mail) {
            $flag = 1;
            break;
        }
    }

    if ($flag == 1) {

        $sql = "SELECT * FROM `job enrollment system`.`jobseeker_saved_jobs_details` WHERE JS_EmailID='$login_mail' ";

        $result = mysqli_query($con,$sql);

        while ($row = mysqli_fetch_array($result)) {
            
            $col1 = $row['Job_ID']; 

            $arr = explode(" ",$col1);

            if (isset($_POST['save-btn'])) {

                $save_btn = $_POST['save-btn'];
                $job_id = $_POST['job-id'];

                if (in_array($job_id, $arr)) {
                    $index = array_search($job_id,$arr);
                    unset($arr[$index]);
                    print_r($arr); 
                    $total_jobs = implode(" ",$arr);
                }
                else {
                    array_push($arr,$job_id);
                    $total_jobs = implode(" ",$arr);
                }
                $sql = "UPDATE `job enrollment system`.`jobseeker_saved_jobs_details` SET `Job_ID`='$total_jobs' WHERE JS_EmailID='$login_mail' ";
                    
                mysqli_query($con,$sql);
                // echo "Update Successfully";
                echo '<script>alert("Updated Successfully.")</script>';
                unset($_POST['save-btn']);
                goto start;

            }

        }
    
    }
    else {

        if (isset($_POST['save-btn'])) {

            $save_btn = $_POST['save-btn'];
            $job_id = $_POST['job-id'];

            $sql = "INSERT INTO `job enrollment system`.`jobseeker_saved_jobs_details` (`JS_EmailID`, `Job_ID`) VALUES ('$login_mail', '$job_id')";

            if($con->query($sql) == true)
            {
                // echo "Saved your job";
                echo '<script>alert("Saved Job Successfully.")</script>';
                unset($_POST['save-btn']);
                goto start;
            }
            else
            {
                echo "Error.Please try again";
            }

        }

    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

    <!-- Optional theme -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<link rel="stylesheet" href="jquery-ui.css">
	<link href="search.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">

    <title>Find Job</title>
</head>

<body>



    <!-- Navbar Section -->

    <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="../../index.php">
            <img src="./images/web-logo1.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../../index.php">Home</a>
            </li>

            <li class="nav-item">
                <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    For Candidates
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="../Profile Page/index.php">Profile</a></li>
                    <li><a class="dropdown-item" href="../Resume Page/index.php">My Resume</a></li>
                    <li><a style="color: #6c63ff;" class="dropdown-item" href="../Find Jobs/index.php">Find Job</a></li>
                    <li><a class="dropdown-item" href="../Saved Jobs/index.php">Saved Jobs</a></li>
                    <li><a class="dropdown-item" href="../Applied Jobs/index.php">Applied Jobs</a></li>
                    <li><a class="dropdown-item" href="../Change Password/index.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="../Logout/logout.php">Logout</a></li>
                </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../../company_profiles/company_profile.html">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                <i class="fas fa-search"></i>
                </a>
            </li>

            <li class="nav-item">

                <a style='color: white !important;' class="nav-link btn btn-primary register-btn" href="../Logout/logout.php">
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













    <!-- Search Section -->

    <div class="search-section">

        <div class="container">

            <div class="card">
                <div class="card-body">

                    <h1 class="card-title">Find Jobs</h1>

                    <form method="POST">
                        <div class="search-wrapper">
                            <div class="input-holder">
                                <input type="text" class="search-input" id="search" name="search" placeholder="Search Jobs" />
                                <button class="search-icon" name="search-btn" onclick="searchToggle(this, event);"><span></span></button><br>
                            </div>
                            <span class="close" onclick="searchToggle(this, event);">
                            </span><br>
                            <div id="suggestion-box"><br>&nbsp;         
                            </div> 
                        </div>
                    </form>

                    <script>
                        function searchToggle(obj, evt){
                            var container = $(obj).closest('.search-wrapper');
                            if(!container.hasClass('active')){
                                container.addClass('active');
                                evt.preventDefault();
                            }
                            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                                container.removeClass('active');
                                // clear input
                                container.find('.search-input').val('');
                            }
                        }

                        $(document).ready(function(){
		                    $("#search").keyup(function(){
                                $.ajax({
                                    type: "POST",
                                    url: "autocomplete.php",
                                    data:'keyword='+$(this).val(),
                                    success: function(data){
                                        $("#suggestion-box").show();
                                        $("#suggestion-box").html(data);
                                    }
                                });
		                    });
	                    });

                        function selectJ(val) {
                            $("#search").val(val);
                            $("#suggestion-box").hide();	
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>

    <!-- End Search Section -->
















    <!--  -->

    <a class="btn btn-primary hamburger" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
        </svg>
    </a>
      
      
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Jobseeker Panel</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          
            <div class="container" style="padding-top: 25px;">
                <div class="row">
                    <div class="col-3" style="width: 18rem; margin:auto;">
                        

                        <div class="card" style="width: 16rem;">

                            <div class="profile-img">

                                <form action="index.php" method="post" id="profileImg-form" enctype="multipart/form-data">

                                    <input type="file" name="camera-icon-res" id="camera-icon-res" style = "display: none;">

                                    <label for="camera-icon-res" onclick="change_img_res()">
                                        <?php
                                            if ($profile_flag == 1 && $JS_ProfileImg_name) {
                                                echo '<img src="../Profile Page/upload/'.$JS_ProfileImg_name.' " " class="card-img-top preview-img-res" alt="..." style="height: 256px; border-radius: 160px; cursor: pointer;">';
                                            }
                                            else {
                                                echo '<img src="./images/person-icon4.png" class="card-img-top preview-img-res" alt="..."
                                                style="height: 256px; border-radius: 160px; cursor: pointer;">';
                                            }
                                        
                                        ?>
                                    </label>

                                    <button type="submit" name="submit-img-res" class="camera-icon"
                                        style="background-color: #6c63ff; border: 2px solid white;">
                                        <i class="far fa-save" style="font-size: 30px; color: white;"></i>
                                    </button>

                                </form>

                                <script>

                                    function change_img_res() {

                                        var inpFile1 = document.getElementById('camera-icon-res');
                                        var previewImage1 = document.querySelector('.preview-img-res');

                                        // previewImage.style.src = '../images/alert-icon.png';

                                        inpFile1.addEventListener("change", function () {
                                            var file = this.files[0];
                                            // console.log(file);

                                            if (file) {
                                                var reader = new FileReader();

                                                reader.addEventListener("load", function () {
                                                    console.log("this=res");
                                                    previewImage1.src = this.result;
                                                });

                                                reader.readAsDataURL(file);
                                            }

                                        });

                                    }
                                </script>

                            </div>

                            <div class="card-body">

                                <h2 class="card-title"><?php if($profile_flag == 1){ echo $JS_Name;}?></h2>

                                <p class="card-text"><?php if($profile_flag == 1){ echo $JS_Profession;}?></p>

                            </div>

                            <ul class="list-group list-group-flush">
                                <a href="../Profile Page/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/profile-icon.webp" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <span>Profile</span>
                                    </li>
                                </a>
                                <a href="../Resume Page/index.php">
                                    <li class="list-group-item">
                                    <!-- <img src="./images/resume-icon.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg>
                                        <span>  My Resume </span>
                                    </li>
                                </a>
                                <a href="../Find Jobs/index.php">
                                    <li class="list-group-item highlight-item">
                                        <!-- <img src="./images/resume-icon.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                        <span> Find Jobs </span>
                                    </li>
                                </a>
                                <a href="../Saved Jobs/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/SaveJob-icon-transparent.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-heart" viewBox="0 0 16 16">
                                            <path
                                                d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                        <span> Saved Jobs </span>
                                    </li>
                                </a>
                                <a href="../Applied Jobs/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/apply-icon-removebg.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                            <path fill-rule="evenodd"
                                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                        </svg>
                                        <span> Applied Jobs </span>
                                    </li>
                                </a>
                                
                                <a href="../Change Password/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/changepassword-icon-transparent.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-lock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                                        </svg>
                                        <span> Change Password </span>
                                    </li>
                                </a>
                                <a href="../Logout/logout.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/logout-icon.webp" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                            <path fill-rule="evenodd"
                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                        </svg>
                                        <span>Logout</span>
                                    </li>
                                </a>
                            </ul>

                        </div>

                    </div>
        
                    
                </div>
            </div>

        </div>
      </div>

    <!--  -->






    <!--  -->

    <div class="container" style="padding-top: 100px;">
        <div class="row">

            <div class="col-3 first-col" style="width: 18rem;">

                <div class="card" style="width: 16rem;">

                    <div class="profile-img">

                        <form action="index.php" method="post" id="profileImg-form" enctype="multipart/form-data">

                            <input type="file" name="camera-icon" id="camera-icon">

                            <label for="camera-icon" onclick="change_img()">
                                <?php
                                    if ($profile_flag == 1 && $JS_ProfileImg_name) {
                                        echo '<img src="../Profile Page/upload/'.$JS_ProfileImg_name.' " " class="card-img-top preview-img" alt="..." style="height: 256px; border-radius: 160px; cursor: pointer;">';
                                    }
                                    else {
                                        echo '<img src="./images/person-icon4.png" class="card-img-top preview-img" alt="..."
                                        style="height: 256px; border-radius: 160px; cursor: pointer;">';
                                    }
                                
                                ?>
                            </label>

                            <button type="submit" name="submit-img" class="camera-icon"
                                style="background-color: #6c63ff; border: 2px solid white;">
                                <i class="far fa-save" style="font-size: 30px; color: white;"></i>
                            </button>

                        </form>

                        <script>
                            function change_img() {
                                
                                var inpFile = document.getElementById('camera-icon');
                                var previewImage = document.querySelector('.preview-img');

                                // previewImage.style.src = '../images/alert-icon.png';

                                inpFile.addEventListener("change", function () {
                                    var file = this.files[0];
                                    // console.log(file);

                                    if (file) {
                                        var reader = new FileReader();

                                        reader.addEventListener("load", function () {
                                            console.log("this");
                                            previewImage.src = this.result;
                                        });

                                        reader.readAsDataURL(file);
                                    }

                                });

                            }
                        </script>

                    </div>

                    <div class="card-body">

                        <h2 class="card-title"><?php if($profile_flag == 1){ echo $JS_Name;}?></h2>

                        <p class="card-text"><?php if($profile_flag == 1){ echo $JS_Profession;}?></p>

                    </div>

                            <ul class="list-group list-group-flush">
                                <a href="../Profile Page/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/profile-icon.webp" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <span>Profile</span>
                                    </li>
                                </a>
                                <a href="../Resume Page/index.php">
                                    <li class="list-group-item">
                                    <!-- <img src="./images/resume-icon.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg>
                                        <span>  My Resume </span>
                                    </li>
                                </a>
                                <a href="../Find Jobs/index.php">
                                    <li class="list-group-item highlight-item">
                                        <!-- <img src="./images/resume-icon.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                        <span> Find Jobs </span>
                                    </li>
                                </a>
                                <a href="../Saved Jobs/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/SaveJob-icon-transparent.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-heart" viewBox="0 0 16 16">
                                            <path
                                                d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                        <span> Saved Jobs </span>
                                    </li>
                                </a>
                                <a href="../Applied Jobs/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/apply-icon-removebg.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                            <path fill-rule="evenodd"
                                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                        </svg>
                                        <span> Applied Jobs </span>
                                    </li>
                                </a>
                                <a href="../Change Password/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/changepassword-icon-transparent.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-lock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                                        </svg>
                                        <span> Change Password </span>
                                    </li>
                                </a>
                                <a href="../Logout/logout.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/logout-icon.webp" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                            <path fill-rule="evenodd"
                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                        </svg>
                                        <span>Logout</span>
                                    </li>
                                </a>
                            </ul>

                </div>


            </div>

            <div class="col-8">

                        <div class="card">
        
                            <div class="card-body">
                                <h5 class="card-title">Refined By
                                    <a href="./index.php" class="reset-link">Reset All</a>
                                </h5>
                            </div>
        
                            <div class="separator"></div>
        
                            <div class="accordion accordion-flush" id="accordionFlushExample">

                                <form action="index.php" method="get" id="filter-form">
        
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                                aria-controls="flush-collapseOne">
                                                Job Title
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title"
                                                    value="Front End Developer" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Front End Developer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" value="Back End Developer" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Back End Developer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" value="Full Stack Developer" id="flexRadioDefault3">
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        Full Stack Developer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" value="Graphics Designer" id="flexRadioDefault4">
                                                    <label class="form-check-label" for="flexRadioDefault4">
                                                        Graphics Designer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title"
                                                    value="Data Analyst" id="flexRadioDefault5">
                                                    <label class="form-check-label" for="flexRadioDefault5">
                                                        Data Analyst
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Digital Marketer" id="flexRadioDefault6">
                                                    <label class="form-check-label" for="flexRadioDefault6">
                                                        Digital Marketer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Content Writer" id="flexRadioDefault7">
                                                    <label class="form-check-label" for="flexRadioDefault7">
                                                        Content Writer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Software Engineer" id="flexRadioDefault8">
                                                    <label class="form-check-label" for="flexRadioDefault8">
                                                        Software Engineer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Electronics And Communication Engineer" id="flexRadioDefault9">
                                                    <label class="form-check-label" for="flexRadioDefault9">
                                                        Electronics And Communication Engineer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Photo-Video Editor" id="flexRadioDefault10">
                                                    <label class="form-check-label" for="flexRadioDefault10">
                                                        Photo-Video Editor
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Social Media Manager" id="flexRadioDefault11">
                                                    <label class="form-check-label" for="flexRadioDefault11">
                                                        Social Media Manager
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Master of Business Administration" id="flexRadioDefault12">
                                                    <label class="form-check-label" for="flexRadioDefault12">
                                                        Master of Business Administration
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="User Experience Designer" id="flexRadioDefault13">
                                                    <label class="form-check-label" for="flexRadioDefault13">
                                                        User Experience Designer
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Content Manager" id="flexRadioDefault14">
                                                    <label class="form-check-label" for="flexRadioDefault14">
                                                        Content Manager
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Digital Marketing Manager" id="flexRadioDefault15">
                                                    <label class="form-check-label" for="flexRadioDefault15">
                                                        Digital Marketing Manager
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="SEO Specialist" id="flexRadioDefault16">
                                                    <label class="form-check-label" for="flexRadioDefault16">
                                                        SEO Specialist
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_title" 
                                                    value="Web Analytics Specialist" id="flexRadioDefault17">
                                                    <label class="form-check-label" for="flexRadioDefault17">
                                                        Web Analytics Specialist
                                                    </label>
                                                </div>
            
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                                aria-controls="flush-collapseTwo">
                                                Experience
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="experience"
                                                    value="0" id="flexRadioDefault18">
                                                    <label class="form-check-label" for="flexRadioDefault18">
                                                        0 - 1 Years
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="experience"
                                                    value="1" id="flexRadioDefault19">
                                                    <label class="form-check-label" for="flexRadioDefault19">
                                                        1 - 2 Years
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="experience"
                                                    value="2" id="flexRadioDefault20">
                                                    <label class="form-check-label" for="flexRadioDefault20">
                                                        2 - 3 Years
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="experience"
                                                    value="3" id="flexRadioDefault21">
                                                    <label class="form-check-label" for="flexRadioDefault21">
                                                        3 - 4 Years
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="experience"
                                                    value="4" id="flexRadioDefault22">
                                                    <label class="form-check-label" for="flexRadioDefault22">
                                                        4 - 5 Years
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="experience"
                                                    value="6" id="flexRadioDefault23">
                                                    <label class="form-check-label" for="flexRadioDefault23">
                                                        Above 5 Years
                                                    </label>
                                                </div>
            
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                                aria-controls="flush-collapseThree">
                                                Salary
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="salary"
                                                    value="10000" id="flexRadioDefault24">
                                                    <label class="form-check-label" for="flexRadioDefault24">
                                                        10,000 - 20,000 Rs
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="salary"
                                                    value="20000" id="flexRadioDefault25">
                                                    <label class="form-check-label" for="flexRadioDefault25">
                                                        20,000 - 30,000 Rs
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="salary"
                                                    value="30000" id="flexRadioDefault26">
                                                    <label class="form-check-label" for="flexRadioDefault26">
                                                        30,000 - 40,000 Rs
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="salary"
                                                    value="40000" id="flexRadioDefault27">
                                                    <label class="form-check-label" for="flexRadioDefault27">
                                                        40,000 - 50,000 Rs
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="salary"
                                                    value="50000" id="flexRadioDefault28">
                                                    <label class="form-check-label" for="flexRadioDefault28">
                                                        50,000 - 1,00,000 Rs
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="salary"
                                                    value="100000" id="flexRadioDefault29">
                                                    <label class="form-check-label" for="flexRadioDefault29">
                                                        Above 1,00,000 Rs
                                                    </label>
                                                </div>
            
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                                aria-controls="flush-collapseFour">
                                                Job Type
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_type"
                                                    value="Full Time" id="flexRadioDefault30">
                                                    <label class="form-check-label" for="flexRadioDefault30">
                                                        Full Time
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_type"
                                                    value="Part Time" id="flexRadioDefault31">
                                                    <label class="form-check-label" for="flexRadioDefault31">
                                                        Part Time
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_type"
                                                    value="Freelance" id="flexRadioDefault32">
                                                    <label class="form-check-label" for="flexRadioDefault32">
                                                        Freelance
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_type"
                                                    value="Internship" id="flexRadioDefault33">
                                                    <label class="form-check-label" for="flexRadioDefault33">
                                                        Internship
                                                    </label>
                                                </div>
            
                                                <div class="form-check" onclick="submit_filter_form()">
                                                    <input class="form-check-input" type="radio" name="job_type"
                                                    value="Temporary" id="flexRadioDefault34">
                                                    <label class="form-check-label" for="flexRadioDefault34">
                                                        Temporary
                                                    </label>
                                                </div>
            
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
        
                        </div>

                        <script>
                            function submit_filter_form() {
                                document.getElementById("filter-form").submit();
                            }
                        </script>

                <div class="card">
                    <div class="card-body">

                        <div class="card-title">
                            <h3><?php
                                $query = "SELECT * FROM `job enrollment system`.`job_details`";
                                $data = mysqli_query($con,$query);
                                $total = mysqli_num_rows($data);
                                echo "Total " . $total; 
                            ?> JOBS FOUND</h3>
                        </div>

                        <div class="separator"></div>

                        <div class="card-subtitle">

                            <div class="row">

                                <?php

                                    if ($flag == 1) {
                                    
                                        $sql = "SELECT `Job_ID` FROM `job enrollment system`.`jobseeker_saved_jobs_details` WHERE JS_EmailID='$login_mail' ";

                                        $result = mysqli_query($con,$sql);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $GLOBALS['job_id'] = $row['Job_ID']; 
                                        }
                                    
                                    }

                                    // echo "Job ID : ".$GLOBALS['job_id'];
                                    $saved_arr = explode(" ",$GLOBALS['job_id']);
                                    $saved_job_flag = "unchecked";

                                    $query = "SELECT * FROM `job enrollment system`.`job_details`";
                                    $data = mysqli_query($con,$query);
                                    $total = mysqli_num_rows($data);

                                    if ($total != 0) {
                                        
                                        while ($result = mysqli_fetch_assoc($data)) {

                                            if (in_array($result['Job_Id'], $saved_arr)) {
                                                $saved_job_flag = "style = 'color: #6c63ff;'";
                                            }

                                            if (isset($_GET['job_title']) || isset($_GET['experience']) || isset($_GET['salary']) || isset($_GET['job_type'])) {
                                                
                                                if (isset($_GET['job_title'])) {
                                                    // echo $_GET['job_title'];
                                                    $job_title = $_GET['job_title'];
                                                    if (!($result['J_Name'] == $job_title)) {
                                                        continue;
                                                    }
                                                }
                                                
                                                if (isset($_GET['experience'])) {
                                                    // echo $_GET['experience'];
                                                    $experience = $_GET['experience'];

                                                    preg_match_all('!\d+!', $result['J_Experience'], $db_exp);

                                                    // echo $db_exp[0][0];
                                                    // echo $db_exp[0][1];

                                                    if(strpos($result['J_Experience'], "Month") || strpos($result['J_Experience'], "month")) {

                                                        if ($experience == 0) {
                                                            if (isset($db_exp[0][1])) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 1) {
                                                            if (!($db_exp[0][0] == 1 && isset($db_exp[0][1]))) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 2) {
                                                            if (!($db_exp[0][0] == 2 && isset($db_exp[0][1]))) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 3) {
                                                            if (!($db_exp[0][0] == 3 && isset($db_exp[0][1]))) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 4) {
                                                            if (!($db_exp[0][0] == 4 && isset($db_exp[0][1]))) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 6) {
                                                            if (!($db_exp[0][0] > 5 && isset($db_exp[0][1]))) {
                                                                continue;
                                                            }
                                                        }
                                                    }
                                                    else {

                                                        if ($experience == 0) {
                                                            if (!($db_exp[0][0] == 1)) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 1) {
                                                            if (!($db_exp[0][0] == 1 || $db_exp[0][0] == 2)) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 2) {
                                                            if (!($db_exp[0][0] == 2 || $db_exp[0][0] == 3)) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 3) {
                                                            if (!($db_exp[0][0] == 3 || $db_exp[0][0] == 4)) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 4) {
                                                            if (!($db_exp[0][0] == 4 || $db_exp[0][0] == 5)) {
                                                                continue;
                                                            }
                                                        }

                                                        if ($experience == 6) {
                                                            if (!($db_exp[0][0] > 5)) {
                                                                continue;
                                                            }
                                                        }

                                                    }

                                                }
                                                
                                                if (isset($_GET['salary'])) {
                                                    // echo $_GET['salary'];
                                                    $salary = $_GET['salary'];

                                                    $db_salary = (int) filter_var($result['J_Salary'], FILTER_SANITIZE_NUMBER_INT);

                                                    if($salary == 10000) {
                                                        if (!($db_salary >= 10000 && $db_salary <= 20000)) {
                                                            continue;
                                                        }
                                                    }

                                                    if($salary == 20000) {
                                                        if (!($db_salary >= 20000 && $db_salary <= 30000)) {
                                                            continue;
                                                        }
                                                    }

                                                    if($salary == 30000) {
                                                        if (!($db_salary >= 30000 && $db_salary <= 40000)) {
                                                            continue;
                                                        }
                                                    }

                                                    if($salary == 40000) {
                                                        if (!($db_salary >= 40000 && $db_salary <= 50000)) {
                                                            continue;
                                                        }
                                                    }

                                                    if($salary == 50000) {
                                                        if (!($db_salary >= 50000 && $db_salary <= 100000)) {
                                                            continue;
                                                        }
                                                    }

                                                    if($salary == 100000) {
                                                        if (!($db_salary >= 100000)) {
                                                            continue;
                                                        }
                                                    }

                                                }
                                                
                                                if (isset($_GET['job_type'])) {
                                                    // echo $_GET['job_type'];
                                                    $job_type = $_GET['job_type'];
                                                    if (!($result['J_Type'] == $job_type)) {
                                                        continue;
                                                    }
                                                }

                                            }

                                            if (isset($_POST['search-btn'])) {
                                                $search = $_POST['search'];
                                                if ($search != $result['J_Name']) {
                                                    continue;
                                                }
                                            }

                                            echo "
                                            <div class='job-post'>
                                            <div class='card mb-3' style=''>
                                                <div class='row g-0'>
                                                    <div class='col-md-4'>
                                                        <img class='job-icon' src='../Job Details/images/".$result['J_Name'].".png' alt='...'>
                                                    </div>
                                                    <div class='col-md-8'>
                                                        <div class='card-body'>
                                                            <h4 class='card-title'>".$result['J_Name']."</h4>

                                                            <script>
                                                                function submit_form(a){
                                                                    console.log('Submit the form');
                                                                    a.submit();
                                                                }
                                                            </script>
        
                                                            <form action='index.php' method='post' onclick='submit_form(this)' class='like-form'>
                                                                <label>
                                                                    <input type='checkbox' name='save-btn'>
                                                                    <i class='far fa-heart' ".$saved_job_flag."></i>
                                                                </label>
                                                                <input type='hidden' name='job-id' value=".$result['Job_Id'].">
                                                            </form>
        
                                                            <div class='separator'></div>
        
                                                            <p class='card-text'>
        
                                                                <a href=''>
                                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                                        fill='currentColor' class='bi bi-geo-alt-fill'
                                                                        viewBox='0 0 16 16'>
                                                                        <path
                                                                            d='M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z' />
                                                                    </svg>
                                                                    ".$result['J_Place']."
                                                                </a>
                
                                                                <a href=''>
                                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                                                        fill='currentColor' class='bi bi-bookmarks-fill'
                                                                        viewBox='0 0 16 16'>
                                                                        <path
                                                                            d='M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z' />
                                                                        <path
                                                                            d='M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z' />
                                                                    </svg>
                                                                    ".$result['J_Type']."
                                                                </a>
                
                                                                <a href=''>
                                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cash-stack' viewBox='0 0 16 16'>
                                                                        <path d='M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z'/>
                                                                        <path d='M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z'/>
                                                                    </svg>
                                                                    ".$result['J_Salary']."
                                                                </a>
                
                                                                <a href=''>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-stack' viewBox='0 0 16 16'>
                                                                    <path d='m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z'/>
                                                                    <path d='m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z'/>
                                                                </svg>
                                                                    ".$result['J_Experience']." Experience
                                                                </a>
                
                                                            </p>
        
                                                            <form method='post'>
                                                                <input type='hidden' name='JobID' value=".$result['Job_Id'].">
                                                                <button type='submit' class='btn btn-primary view-details' name='details-btn' formaction='../Job Details/index.php'> View Details </button>
                                                            </form>
        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            ";

                                            $saved_job_flag = "style = 'color: black;'";

                                        }

                                    }

                                ?>


                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--  -->





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
        
</body>

</html>