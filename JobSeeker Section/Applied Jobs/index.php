<?php

session_start();

$login_mail = $_SESSION['mail'];

if (!(isset($_SESSION['mail']))) {
    header("Location: ../../Sign-in/sign-in.php");
}

// echo "$login_mail";

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server , $username , $password);

if(!$con)
{
    die("Connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the db";


start:

$sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_personal_details`";


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
    // echo "Your Email address already registered.";

    $sql = "SELECT * FROM `job enrollment system`.`jobseeker_personal_details` WHERE JS_EmailID='$login_mail' ";

    $result = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($result)) {

        $col1 = $row['JS_Name']; 
        $col2 = $row['JS_Profession']; 
        $col14 = $row['JS_ProfileImg_name']; 
        $col15 = $row['JS_ProfileImg_type']; 
        $col16 = $row['JS_ProfileImg_size']; 
    
        //echo "question no.".$col1."<br>".$col2."<br>"."<br>";

        if(isset($_POST['submit-img']) || isset($_POST['submit-img-res']))
        {

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
                    goto start;
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
                    goto start;
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

    // echo "Code in else block";

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
            goto start;
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

    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

    <title>Jobseeker Page</title>
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
                    <li><a class="dropdown-item" href="../Find Jobs/index.php">Find Job</a></li>
                    <li><a class="dropdown-item" href="../Saved Jobs/index.php">Saved Jobs</a></li>
                    <li><a style="color: #6c63ff;" class="dropdown-item" href="../Applied Jobs/index.php">Applied Jobs</a></li>
                    <li><a class="dropdown-item" href="../Change Password/index.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="../Logout/logout.php">Logout</a></li>
                </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../../company_profiles/company_profile.html">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Find Jobs/index.php">
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








    <!--  -->

    <a class="btn btn-primary hamburger" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample">
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
                    <!-- <div class="col-9">.col-9</div> -->
                    <div class="col-3" style="width: 18rem; margin:auto;">

                        <!-- .col-4<br>Since 9 + 4 = 13 &gt; 12, this 4-column-wide div gets wrapped onto a new line as one
                        contiguous unit. -->

                        <div class="card" style="width: 16rem;">

                            <div class="profile-img">

                                <form action="index.php" method="post" id="profileImg-form" enctype="multipart/form-data">

                                    <input type="file" name="camera-icon-res" id="camera-icon-res" style = "display: none;">

                                    <label for="camera-icon-res">
                                        <?php
                                            if ($flag == 1 && $col14) {
                                                echo '<img src="../Profile Page/upload/'.$col14.' " " class="card-img-top preview-img-res" alt="..." style="height: 256px; border-radius: 160px; cursor: pointer;">';
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

                                    var inpFile1 = document.getElementById('camera-icon-res');
                                    var previewImage1 = document.querySelector('.preview-img-res');

                                    // previewImage.style.src = '../images/alert-icon.png';

                                    inpFile1.addEventListener("change", function () {
                                        var file = this.files[0];
                                        // console.log(file);

                                        if (file) {
                                            var reader = new FileReader();

                                            reader.addEventListener("load", function () {
                                                console.log(this);
                                                previewImage1.src = this.result;
                                            });

                                            reader.readAsDataURL(file);
                                        }

                                    });
                                </script>

                            </div>

                            <div class="card-body">

                                <h2 class="card-title"><?php if($flag == 1){ echo $col1;}?></h2>

                                <p class="card-text"><?php if($flag == 1){ echo $col2;}?></p>

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
                                    <li class="list-group-item">
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
                                    <li class="list-group-item highlight-item">
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













    <!-- Information -->

    <div class="container" style="padding-top: 200px;">
        <div class="row">
            <!-- <div class="col-9">.col-9</div> -->
            <div class="col-3 first-col" style="width: 18rem;">

                <div class="card" style="width: 16rem;">

                    <div class="profile-img">

                        <form action="index.php" method="post" id="profileImg-form" enctype="multipart/form-data">

                            <input type="file" name="camera-icon" id="camera-icon">

                            <label for="camera-icon">
                                <?php
                                    if ($flag == 1 && $col14) {
                                        echo '<img src="../Profile Page/upload/'.$col14.' " " class="card-img-top preview-img" alt="..." style="height: 256px; border-radius: 160px; cursor: pointer;">';
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
                            

                            var inpFile = document.getElementById('camera-icon');
                            var previewImage = document.querySelector('.preview-img');

                            // previewImage.style.src = '../images/alert-icon.png';

                            inpFile.addEventListener("change", function () {
                                var file = this.files[0];
                                // console.log(file);

                                if (file) {
                                    var reader = new FileReader();

                                    reader.addEventListener("load", function () {
                                        console.log(this);
                                        previewImage.src = this.result;
                                    });

                                    reader.readAsDataURL(file);
                                }

                            });
                        </script>

                    </div>

                    <div class="card-body">

                        <h2 class="card-title"><?php if($flag == 1){ echo $col1;}?></h2>

                        <p class="card-text"><?php if($flag == 1){ echo $col2;}?></p>

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
                                    <li class="list-group-item">
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
                                    <li class="list-group-item highlight-item">
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

                    <!-- <div class="card-body">
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div> -->

                </div>

            </div>

            <div class="col-8">

                <div class="card">
                    <div class="card-body">

                        <div class="card-title">
                            <h3><?php
                                $query = "SELECT * FROM `job enrollment system`.`jobseeker_applied_jobs_details` WHERE JS_EmailID='$login_mail'";
                                $data = mysqli_query($con,$query);
                                while ($row = mysqli_fetch_array($data)) {
                                    $jobs = $row['Job_ID'];
                                    $jobs_arr = explode(" ",$jobs);
                                    echo sizeof($jobs_arr);
                                }
                            ?> APPLIED JOBS</h3>
                        </div>

                        <div class="separator"></div>

                        <div class="card-subtitle">

                            <div class="row">

                                <?php

                                    $sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_applied_jobs_details`";

                                    $result = mysqli_query($con,$sql);
                                            
                                    $app_flag = 0;

                                    while ($row = mysqli_fetch_array($result)) {
                                        $email = $row['JS_EmailID']; 

                                        // echo $email;

                                        if ($email == $login_mail) {
                                            $app_flag = 1;
                                            break;
                                        }
                                    }

                                    if ($app_flag == 1) {

                                        $sql = "SELECT `Job_ID` FROM `job enrollment system`.`jobseeker_applied_jobs_details` WHERE JS_EmailID='$login_mail' ";

                                        $result = mysqli_query($con,$sql);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $GLOBALS['job_id'] = $row['Job_ID']; 
                                        }

                                    }

                                    if ($GLOBALS['job_id']) {

                                        $app_arr = explode(" ",$GLOBALS['job_id']);

                                        $query = "SELECT * FROM `job enrollment system`.`job_details`";
                                        $data = mysqli_query($con,$query);
                                        $total = mysqli_num_rows($data);

                                        if ($total != 0) {
                                            
                                            while ($result = mysqli_fetch_assoc($data)) {
                                                if (in_array($result['Job_Id'], $app_arr)) {
                                                    
                                                    echo "
                                                    <div class='job-post'>
                                                        <div class='card mb-3' style=''>
                                                            <div class='row g-0'>
                                                                <div class='col-md-4'>
                                                                    <img class='job-icon' src='../Job Details/images/".$result['J_Name'].".png ' alt='...'>
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

                                                }                                                 
                                            }

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




    <!-- End Information -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

</body>

</html>