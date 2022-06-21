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
    die("Connection to this database failed due to" . mysqli_connect_error());
}

start:

$sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_personal_details`";

$result = mysqli_query($con,$sql);
        
$flag = 0;

while ($row = mysqli_fetch_array($result)) {
    $col1 = $row['JS_EmailID']; 

    if ($col1 == $login_mail) {
            $flag = 1;
            break;
    }
}

if ($flag == 1) {

    $sql = "SELECT * FROM `job enrollment system`.`jobseeker_personal_details` WHERE JS_EmailID='$login_mail' ";

    $result = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($result)) {
        $col1 = $row['JS_Name']; 
        $col2 = $row['JS_Profession']; 
        $col3 = $row['JS_Language']; 
        $col4 = $row['JS_Age']; 
        $col5 = $row['JS_Csalary']; 
        $col6 = $row['JS_Esalary']; 
        $col7 = $row['JS_Description']; 
        $col8 = $row['JS_Phone']; 
        $col9 = $row['JS_Email']; 
        $col10 = $row['JS_Country']; 
        $col11 = $row['JS_Postcode']; 
        $col12 = $row['JS_City']; 
        $col13 = $row['JS_Address']; 
        $col14 = $row['JS_ProfileImg_name']; 
        $col15 = $row['JS_ProfileImg_type']; 
        $col16 = $row['JS_ProfileImg_size']; 

        if (isset($_POST['submit-btn'])) {

            $name = $_POST['name'];
            $profession = $_POST['profession'];
            $language = $_POST['language'];
            $age = $_POST['age'];
            $csalary = $_POST['csalary'];
            $esalary = $_POST['esalary'];
            $description = $_POST['description'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $country = $_POST['country'];
            $postcode = $_POST['postcode'];
            $city = $_POST['city'];
            $address = $_POST['address'];
            
            $sql = "UPDATE `job enrollment system`.`jobseeker_personal_details` SET `JS_Name`='$name',`JS_Profession`='$profession',`JS_Language`='$language',`JS_Age`='$age',`JS_Csalary`='$csalary',`JS_Esalary`='$esalary',`JS_Description`='$description',`JS_Phone`='$phone',`JS_Email`='$email',`JS_Country`='$country',`JS_Postcode`='$postcode',`JS_City`='$city',`JS_Address`='$address' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['submit-btn']);
                goto start;
            }

        }

        if(isset($_POST['submit-img']) || isset($_POST['submit-img-res']))
        {

            if (isset($_POST['submit-img'])) {
                $file = rand(1000,100000)."-".$_FILES['camera-icon']['name'];
                echo $_FILES['camera-icon']['name'];
                $file_loc = $_FILES['camera-icon']['tmp_name'];
                $file_size = $_FILES['camera-icon']['size'];
                $file_type = $_FILES['camera-icon']['type'];
                $folder="upload/";

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
                    echo '<script>alert("Profile Image is successfully updated.")</script>';
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
                $folder="upload/";

                /* new file size in KB */
                $new_size = $file_size/1024;  
                /* new file size in KB */
                        
                /* make file name in lower case */
                $new_file_name = strtolower($file);
                // echo "make file name in lower case"; 
                        
                $final_file=str_replace(' ','-',$new_file_name);
                        
                if(move_uploaded_file($file_loc,$folder.$final_file))
                {
                    $sql = "UPDATE `job enrollment system`.`jobseeker_personal_details` SET `JS_ProfileImg_name`='$final_file',`JS_ProfileImg_type`='$file_type',`JS_ProfileImg_size`='$new_size' WHERE JS_EmailID='$login_mail' ";
                
                    mysqli_query($con,$sql);
                    echo '<script>alert("Profile Image is successfully updated.")</script>';
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

    if(isset($_POST['submit-img']))
    {
        $file = rand(1000,100000)."-".$_FILES['camera-icon']['name'];
        echo $_FILES['camera-icon']['name'];
        $file_loc = $_FILES['camera-icon']['tmp_name'];
        $file_size = $_FILES['camera-icon']['size'];
        $file_type = $_FILES['camera-icon']['type'];
        $folder="upload/";
                
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
            echo '<script>alert("Profile Image is successfully upload.")</script>';
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
        $folder="upload/";

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
            echo '<script>alert("Profile Image is successfully upload.")</script>';
            unset($_POST['submit-img-res']);
            goto start;
        }
        else
        {
            echo "Error.Please try again";
        }
    }

    if (isset($_POST['name'])) {

        $name = $_POST['name'];
        $profession = $_POST['profession'];
        $language = $_POST['language'];
        $age = $_POST['age'];
        $csalary = $_POST['csalary'];
        $esalary = $_POST['esalary'];
        $description = $_POST['description'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $postcode = $_POST['postcode'];
        $city = $_POST['city'];
        $address = $_POST['address'];

        echo "Inserted query fire.";        
        
        $sql = "INSERT INTO `job enrollment system`.`jobseeker_personal_details` (`JS_EmailID`, `JS_Name`, `JS_Profession`, `JS_Language`, `JS_Age`, `JS_Csalary`, `JS_Esalary`, `JS_Description`, `JS_Phone`, `JS_Email`, `JS_Country`, `JS_Postcode`, `JS_City`, `JS_Address`) VALUES ('$login_mail', '$name', '$profession', '$language', '$age', '$csalary', '$esalary', '$description', '$phone', '$email', '$country', '$postcode', '$city', '$address')";

        if($con->query($sql) == true)
        {
            echo '<script>alert("Data is successfully Inserted.")</script>';
            goto start;
        }
        else
        {
            echo "Error.Please try again";
        }

    }

}    

    $con->close();

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
                    <li><a style="color: #6c63ff;" class="dropdown-item" href="../Profile Page/index.php">Profile</a></li>
                    <li><a class="dropdown-item" href="../Resume Page/index.php" onclick="return checkDetails()">My Resume</a></li>
                    <li><a class="dropdown-item" href="../Find Jobs/index.php" onclick="return checkDetails()">Find Job</a></li>
                    <li><a class="dropdown-item" href="../Saved Jobs/index.php" onclick="return checkDetails()">Saved Jobs</a></li>
                    <li><a class="dropdown-item" href="../Applied Jobs/index.php" onclick="return checkDetails()">Applied Jobs</a></li>
                    <li><a class="dropdown-item" href="../Change Password/index.php" onclick="return checkDetails()">Change Password</a></li>
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
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill"
            viewBox="0 0 16 16">
            <path
                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
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

                    <div class="col-3" style="width: 18rem; margin: auto;">

                        <div class="card" style="width: 16rem;">

                            <div class="profile-img">

                                <form action="index.php" method="post" id="profileImg-form" enctype="multipart/form-data">

                                    <input type="file" name="camera-icon-res" id="camera-icon-res" style = "display: none;">

                                    <label for="camera-icon-res" onclick="change_img_res()">
                                        <?php
                                            if ($flag == 1 && $col14) {
                                                echo '<img src="upload/'.$col14.' " " class="card-img-top preview-img-res" alt="..." style="height: 256px; border-radius: 160px; cursor: pointer;">';
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

                                        inpFile1.addEventListener("change", function () {
                                            var file = this.files[0];

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

                                <h2 class="card-title"><?php if($flag == 1){ echo $col1;}?></h2>

                                <p class="card-text"><?php if($flag == 1){ echo $col2;}?></p>

                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item highlight-item">
                                    <!-- <img src="./images/profile-icon.webp" alt=""> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <span>Profile</span>
                                </li>
                                <a href="../Resume Page/index.php" onclick="return checkDetails()">
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
                                <a href="../Find Jobs/index.php" onclick="return checkDetails()">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/resume-icon.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                        <span> Find Jobs </span>
                                    </li>
                                </a>
                                <a href="../Saved Jobs/index.php" onclick="return checkDetails()">
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
                                <a href="../Applied Jobs/index.php" onclick="return checkDetails()">
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
                                <a href="../Change Password/index.php" onclick="return checkDetails()">
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

            <div class="col-3 first-col" style="width: 18rem;">

                <div class="card" style="width: 16rem;">

                    <div class="profile-img">

                        <form action="index.php" method="post" id="profileImg-form" enctype="multipart/form-data">

                            <input type="file" name="camera-icon" id="camera-icon">

                            <label for="camera-icon" onclick="change_img()">
                                <?php
                                    if ($flag == 1 && $col14) {
                                        echo '<img src="upload/'.$col14.' " " class="card-img-top preview-img" alt="..." style="height: 256px; border-radius: 160px; cursor: pointer;">';
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

                                inpFile.addEventListener("change", function () {
                                    var file = this.files[0];

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

                        <h2 class="card-title"><?php if($flag == 1){ echo $col1;}?></h2>

                        <p class="card-text"><?php if($flag == 1){ echo $col2;}?></p>

                    </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item highlight-item">
                                    <!-- <img src="./images/profile-icon.webp" alt=""> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <span>Profile</span>
                                </li>
                                <a href="../Resume Page/index.php" onclick="return checkDetails()">
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
                                <a href="../Find Jobs/index.php" onclick="return checkDetails()">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/resume-icon.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                        <span> Find Jobs </span>
                                    </li>
                                </a>
                                <a href="../Saved Jobs/index.php" onclick="return checkDetails()">
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
                                <a href="../Applied Jobs/index.php" onclick="return checkDetails()">
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
                                <a href="../Change Password/index.php" onclick="return checkDetails()">
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

                        <h2 class="card-title">Basic Information</h2>

                        <div class="separator"></div>

                        <form action="index.php" method="post" class="row g-3" onsubmit="return validateForm()">

                            <div class="col-md-6">
                                <label for="input-fname" class="form-label">Full Name :</label>
                                <input type="text" name="name" value="<?php if($flag == 1){ echo $col1;}?>"
                                    class="form-control" id="input-fname" placeholder="Ramesh Patel">
                            </div>

                            <div class="col-md-6">
                                <label for="input-ptitle" class="form-label">Professional title :</label>
                                <input type="text" name="profession" value="<?php if($flag == 1){ echo $col2;}?>"
                                    class="form-control" id="input-ptitle" placeholder="Web Developer">
                            </div>

                            <div class="col-md-6">
                                <label for="input-language" class="form-label">Language :</label>
                                <input type="text" name="language" value="<?php if($flag == 1){ echo $col3;}?>"
                                    class="form-control" id="input-language" placeholder="English">
                            </div>

                            <div class="col-md-6">
                                <label for="input-age" class="form-label">Age :</label>
                                <input type="text" name="age" value="<?php if($flag == 1){ echo $col4;}?>"
                                    class="form-control" id="input-age" placeholder="21 Year">
                            </div>

                            <div class="col-md-6">
                                <label for="input-csalary" class="form-label">Current Salary :</label>
                                <input type="text" name="csalary" value="<?php if($flag == 1){ echo $col5;}?>"
                                    class="form-control" id="input-csalary" placeholder="1000$">
                            </div>

                            <div class="col-md-6">
                                <label for="input-esalary" class="form-label">Expected Salary :</label>
                                <input type="text" name="esalary" value="<?php if($flag == 1){ echo $col6;}?>"
                                    class="form-control" id="input-esalary" placeholder="1500$">
                            </div>

                            <div class="col-md-12">
                                <label for="input-description" class="form-label">Description :</label>
                                <textarea name="description" class="form-control" id="input-description" cols="30"
                                    rows="10"
                                    placeholder="My name is Ramesh Patel, and I was first made aware of the innovative designs and ethical missions of Moonlight Creative through its work with Auburn University while I was attending. A mutual colleague at Auburn University — Melissa Sunkle — informed me that you are currently seeking junior graphic designers and gave me your contact information.I am reaching out today because I am interested in applying to this junior graphic designer position. I have attached my resume and cover letter to this email, as well as a portfolio of my work. I look forward to hearing back from you."><?php if($flag == 1){ echo $col7;}?></textarea>
                            </div>



                            <h2 class="card-title">Contact Information</h2>

                            <div class="separator" style="width : 100%"></div>

                            <div class="col-md-6">
                                <label for="input-phone" class="form-label">Phone :</label>
                                <input type="phone" name="phone" value="<?php if($flag == 1){ echo $col8;}?>"
                                    class="form-control" id="input-phone" placeholder="+91 1234567890">
                            </div>

                            <div class="col-md-6">
                                <label for="input-email" class="form-label">Email Address :</label>
                                <input type="text" name="email" value="<?php if($flag == 1){ echo $col9;}?>"
                                    class="form-control" id="input-email" placeholder="abc@gmail.com">
                            </div>

                            <div class="col-md-6">
                                <label for="input-country" class="form-label">Country :</label>
                                <input type="text" name="country" value="<?php if($flag == 1){ echo $col10;}?>"
                                    class="form-control" id="input-country" placeholder="India">
                            </div>

                            <div class="col-md-6">
                                <label for="input-postcode" class="form-label">Postcode: :</label>
                                <input type="number" name="postcode" value="<?php if($flag == 1){ echo $col11;}?>"
                                    class="form-control" id="input-postcode" placeholder="390015">
                            </div>

                            <div class="col-md-6">
                                <label for="input-city" class="form-label">City :</label>
                                <input type="text" name="city" value="<?php if($flag == 1){ echo $col12;}?>"
                                    class="form-control" id="input-city" placeholder="Vadodara">
                            </div>

                            <div class="col-md-6">
                                <label for="input-address" class="form-label">Address :</label>
                                <input type="text" name="address" value="<?php if($flag == 1){ echo $col13;}?>"
                                    class="form-control" id="input-address" placeholder="Street">
                            </div>

                        

                            <div class="col-12">
                                <button id="save-btn" name="submit-btn" type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--  -->




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>

</html>