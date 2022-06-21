<?php
error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ALL ^ E_NOTICE);

session_start();
$login_mail = $_SESSION['mail'];

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}
//echo "Success connecting to the db";

profile_start:

$sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_personal_details`";


$result = mysqli_query($con, $sql);

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

    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {

        $JS_Name = $row['JS_Name'];
        $JS_Profession = $row['JS_Profession'];
        $JS_ProfileImg_name = $row['JS_ProfileImg_name'];
        $JS_ProfileImg_type = $row['JS_ProfileImg_type'];
        $JS_ProfileImg_size = $row['JS_ProfileImg_size'];

        //echo "question no.".$col1."<br>".$col2."<br>"."<br>";

        if (isset($_POST['submit-img']) || isset($_POST['submit-img-res'])) {

            if (isset($_POST['submit-img'])) {
                $file = rand(1000, 100000) . "-" . $_FILES['camera-icon']['name'];
                $file_loc = $_FILES['camera-icon']['tmp_name'];
                $file_size = $_FILES['camera-icon']['size'];
                $file_type = $_FILES['camera-icon']['type'];
                $folder = "../Profile Page/upload/";

                /* new file size in KB */
                $new_size = $file_size / 1024;
                /* new file size in KB */

                /* make file name in lower case */
                $new_file_name = strtolower($file);

                $final_file = str_replace(' ', '-', $new_file_name);

                if (move_uploaded_file($file_loc, $folder . $final_file)) {
                    $sql = "UPDATE `job enrollment system`.`jobseeker_personal_details` SET `JS_ProfileImg_name`='$final_file',`JS_ProfileImg_type`='$file_type',`JS_ProfileImg_size`='$new_size' WHERE JS_EmailID='$login_mail' ";

                    mysqli_query($con, $sql);
                    // echo "File sucessfully upload";
                    echo '<script>alert("File sucessfully upload.")</script>';
                    unset($_POST['submit-img']);
                    goto profile_start;
                } else {
                    echo "Error.Please try again";
                }
            } else {
                $file = rand(1000, 100000) . "-" . $_FILES['camera-icon-res']['name'];
                $file_loc = $_FILES['camera-icon-res']['tmp_name'];
                $file_size = $_FILES['camera-icon-res']['size'];
                $file_type = $_FILES['camera-icon-res']['type'];
                $folder = "../Profile Page/upload/";

                /* new file size in KB */
                $new_size = $file_size / 1024;
                /* new file size in KB */

                /* make file name in lower case */
                $new_file_name = strtolower($file);

                $final_file = str_replace(' ', '-', $new_file_name);

                if (move_uploaded_file($file_loc, $folder . $final_file)) {
                    $sql = "UPDATE `job enrollment system`.`jobseeker_personal_details` SET `JS_ProfileImg_name`='$final_file',`JS_ProfileImg_type`='$file_type',`JS_ProfileImg_size`='$new_size' WHERE JS_EmailID='$login_mail' ";

                    mysqli_query($con, $sql);
                    // echo "File sucessfully upload";
                    echo '<script>alert("File sucessfully upload.")</script>';
                    unset($_POST['submit-img-res']);
                    goto profile_start;
                } else {
                    echo "Error.Please try again";
                }
            }
        }
    }
} else {

    //echo "Code in else block";

    if (isset($_POST['submit-img'])) {
        $file = rand(1000, 100000) . "-" . $_FILES['camera-icon']['name'];
        $file_loc = $_FILES['camera-icon']['tmp_name'];
        $file_size = $_FILES['camera-icon']['size'];
        $file_type = $_FILES['camera-icon']['type'];
        $folder = "../Profile Page/upload/";

        /* new file size in KB */
        $new_size = $file_size / 1024;
        /* new file size in KB */

        /* make file name in lower case */
        $new_file_name = strtolower($file);

        $final_file = str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $sql = "INSERT INTO `job enrollment system`.`jobseeker_personal_details` (`JS_EmailID`, `JS_ProfileImg_name`,`JS_ProfileImg_type`,`JS_ProfileImg_size`) VALUES('$login_mail','$final_file','$file_type','$new_size')";
            mysqli_query($con, $sql);
            // echo "File sucessfully upload";
            echo '<script>alert("File sucessfully upload.")</script>';
            unset($_POST['submit-img']);
            goto profile_start;
        } else {
            echo "Error.Please try again";
        }
    }

    if (isset($_POST['submit-img-res'])) {
        $file = rand(1000, 100000) . "-" . $_FILES['camera-icon-res']['name'];
        $file_loc = $_FILES['camera-icon-res']['tmp_name'];
        $file_size = $_FILES['camera-icon-res']['size'];
        $file_type = $_FILES['camera-icon-res']['type'];
        $folder = "../Profile Page/upload/";

        /* new file size in KB */
        $new_size = $file_size / 1024;
        /* new file size in KB */

        /* make file name in lower case */
        $new_file_name = strtolower($file);

        $final_file = str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $sql = "INSERT INTO `job enrollment system`.`jobseeker_personal_details` (`JS_EmailID`, `JS_ProfileImg_name`,`JS_ProfileImg_type`,`JS_ProfileImg_size`) VALUES('$login_mail','$final_file','$file_type','$new_size')";
            mysqli_query($con, $sql);
            // echo "File sucessfully upload";
            echo '<script>alert("File sucessfully upload.")</script>';
            unset($_POST['submit-img-res']);
            goto profile_start;
        } else {
            echo "Error.Please try again";
        }
    }
}


start:

$sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_resume_details`";

$result = mysqli_query($con, $sql);

$flag = 0;

while ($row = mysqli_fetch_array($result)) {
    $col1 = $row['JS_EmailID'];

    if ($col1 == $login_mail) {
        $flag = 1;
        break;
    }
}

if ($flag == 1) {

    $sql = "SELECT * FROM `job enrollment system`.`jobseeker_resume_details` WHERE JS_EmailID='$login_mail' ";

    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $col1 = $row['JSR_Headline'];
        $col2 = $row['JSR_Skills'];
        $col3 = $row['JSR_Employment'];
        $col4 = $row['JSR_Education'];
        $col5 = $row['JSR_Projects'];
        $col6 = $row['JSR_ProfileSummary'];
        $col7 = $row['JSR_OnlineProfile'];
        $col8 = $row['JSR_WorkSample'];
        $col9 = $row['JSR_ResearchPublication'];
        $col10 = $row['JSR_Patent'];
        $col11 = $row['JSR_Certification'];
        $col12 = $row['JSR_ExpYears']; //years of experience
        $col13 = $row['JSR_Company']; // company names
        $col14 = $row['JSR_Role'];
        $col15 = $row['JSR_JobType'];
        $col16 = $row['JSR_EmploymentType'];

        if (isset($_POST['ResumeHeadline'])) {

            $ResumeHeadline = $_POST['ResumeHeadline'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Headline`='$ResumeHeadline' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['ResumeHeadline']);
                goto start;
            }
        }

        if (isset($_POST['KeySkills'])) {

            $KeySkills = $_POST['KeySkills'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Skills`='$KeySkills' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['KeySkills']);
                goto start;
            }
        }

        if (isset($_POST['Employment'])) {

            $Employment = $_POST['Employment'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Employment`='$Employment' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Employment']);
                goto start;
            }
        }

        if (isset($_POST['Education'])) {

            $Education = $_POST['Education'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Education`='$Education' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Education']);
                goto start;
            }
        }

        if (isset($_POST['Projects'])) {

            $Projects = $_POST['Projects'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Projects`='$Projects' WHERE JS_EmailID='$login_mail' ";
            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Projects']);
                goto start;
            }
        }

        if (isset($_POST['ProfileSummary'])) {

            $ProfileSummary = $_POST['ProfileSummary'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_ProfileSummary`='$ProfileSummary' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['ProfileSummary']);
                goto start;
            }
        }

        if (isset($_POST['OnlineProfile'])) {

            $OnlineProfile = $_POST['OnlineProfile'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_OnlineProfile`='$OnlineProfile' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['OnlineProfile']);
                goto start;
            }
        }

        if (isset($_POST['WorkSample'])) {

            $WorkSample = $_POST['WorkSample'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_WorkSample`='$WorkSample' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['WorkSample']);
                goto start;
            }
        }

        if (isset($_POST['ResearchPublication'])) {

            $ResearchPublication = $_POST['ResearchPublication'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_ResearchPublication`='$ResearchPublication' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['ResearchPublication']);
                goto start;
            }
        }

        if (isset($_POST['Patent'])) {

            $Patent = $_POST['Patent'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Patent`='$Patent' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Patent']);
                goto start;
            }
        }

        if (isset($_POST['Certification'])) {

            $Certification = $_POST['Certification'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Certification`='$Certification' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Certification']);
                goto start;
            }
        }

        if (isset($_POST['ExpYears'])) {

            $ExpYears = $_POST['ExpYears'];
            $Company = $_POST['Company'];
            $Role = $_POST['Role'];
            $JobType = $_POST['JobType'];
            $EmploymentType = $_POST['EmploymentType'];
   
            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_ExpYears`='$ExpYears',`JSR_Company`='$Company',`JSR_Role`='$Role',`JSR_JobType`='$JobType',`JSR_EmploymentType`='$EmploymentType' WHERE JS_EmailID='$login_mail' ";

            if ($con->query($sql) == true) {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['ExpYears']);
                goto start;
            }
        }
    }
} else {

    if (isset($_POST['ResumeHeadline']) || isset($_POST['KeySkills']) || isset($_POST['Employment']) || isset($_POST['Education']) || isset($_POST['Projects']) || isset($_POST['ProfileSummary']) || isset($_POST['OnlineProfile']) || isset($_POST['WorkSample']) || isset($_POST['ResearchPublication']) || isset($_POST['Patent']) || isset($_POST['Certification']) || isset($_POST['ExpYears']) || isset($_POST['Company']) || isset($_POST['Role']) || isset($_POST['JobType']) || isset($_POST['EmploymentType'])) {

        $ResumeHeadline = $_POST['ResumeHeadline'];
        $KeySkills = $_POST['KeySkills'];
        $Employment = $_POST['Employment'];
        $Education = $_POST['Education'];
        $Projects = $_POST['Projects'];
        $ProfileSummary = $_POST['ProfileSummary'];
        $OnlineProfile = $_POST['OnlineProfile'];
        $WorkSample = $_POST['WorkSample'];
        $ResearchPublication = $_POST['ResearchPublication'];
        $Patent = $_POST['Patent'];
        $Certification = $_POST['Certification'];
        $ExpYears = $_POST['ExpYears'];
        $Company = $_POST['Company'];
        $Role = $_POST['Role'];
        $JobType = $_POST['JobType'];
        $EmploymentType = $_POST['EmploymentType'];
        $DesiredShift = $_POST['DesiredShift'];
        $AvailabilityToJoin = $_POST['AvailabilityToJoin'];
        $ExpectedSalary = $_POST['ExpectedSalary'];


        $sql = "INSERT INTO `job enrollment system`.`jobseeker_resume_details` (`JS_EmailID`, `JSR_Headline`, `JSR_Skills`, `JSR_Employment`, `JSR_Education`, `JSR_Projects`, `JSR_ProfileSummary`, `JSR_OnlineProfile`, `JSR_WorkSample`, `JSR_ResearchPublication`, `JSR_Patent`, `JSR_Certification`, `JSR_ExpYears`, `JSR_Company`, `JSR_Role`, `JSR_JobType`, `JSR_EmploymentType`) VALUES ('$login_mail', '$ResumeHeadline', '$KeySkills', '$Employment', '$Education', '$Projects', '$ProfileSummary', '$OnlineProfile', '$WorkSample', '$ResearchPublication', '$Patent', '$Certification', '$ExpYears', '$Company', '$Role', '$JobType', '$EmploymentType');";

        if ($con->query($sql) == true) {
            echo '<script>alert("Inserted Successfully.")</script>';
            goto start;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

    <title>Resume Page</title>
</head>

<body>



    <!-- Navbar Section -->

    <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">
                <img src="./images/web-logo1.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                For Candidates
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="../Profile Page/index.php">Profile</a></li>
                                <li><a style="color: #6c63ff;" class="dropdown-item" href="../Resume Page/index.php">My Resume</a></li>
                                <li><a class="dropdown-item" href="../Find Jobs/index.php">Find Job</a></li>
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

    <a class="btn btn-primary hamburger" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
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

                                    <input type="file" name="camera-icon-res" id="camera-icon-res" style="display: none;">

                                    <label for="camera-icon-res">
                                        <?php
                                        if ($profile_flag == 1 && $JS_ProfileImg_name) {
                                            echo '<img src="../Profile Page/upload/' . $JS_ProfileImg_name . ' " " class="card-img-top preview-img-res" alt="..." style="height: 256px; border-radius: 160px; cursor: pointer;">';
                                        } else {
                                            echo '<img src="./images/person-icon4.png" class="card-img-top preview-img-res" alt="..."
                                                style="height: 256px; border-radius: 160px; cursor: pointer;">';
                                        }

                                        ?>
                                    </label>

                                    <button type="submit" name="submit-img-res" class="camera-icon" style="background-color: #6c63ff; border: 2px solid white;">
                                        <i class="far fa-save" style="font-size: 30px; color: white;"></i>
                                    </button>

                                </form>

                                <script>
                                    var inpFile1 = document.getElementById('camera-icon-res');
                                    var previewImage1 = document.querySelector('.preview-img-res');

                                    // previewImage.style.src = '../images/alert-icon.png';

                                    inpFile1.addEventListener("change", function() {
                                        var file = this.files[0];
                                        // console.log(file);

                                        if (file) {
                                            var reader = new FileReader();

                                            reader.addEventListener("load", function() {
                                                console.log(this);
                                                previewImage1.src = this.result;
                                            });

                                            reader.readAsDataURL(file);
                                        }

                                    });
                                </script>

                            </div>

                            <div class="card-body">

                                <h2 class="card-title"><?php if ($profile_flag == 1) {
                                                            echo $JS_Name;
                                                        } ?></h2>

                                <p class="card-text"><?php if ($profile_flag == 1) {
                                                            echo $JS_Profession;
                                                        } ?></p>

                            </div>

                            <ul class="list-group list-group-flush">
                                <a href="../Profile Page/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/profile-icon.webp" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <span>Profile</span>
                                    </li>
                                </a>
                                <a href="../Resume Page/index.php">
                                    <li class="list-group-item highlight-item">
                                        <!-- <img src="./images/resume-icon.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg>
                                        <span> My Resume </span>
                                    </li>
                                </a>
                                <a href="../Find Jobs/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/resume-icon.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                        <span> Find Jobs </span>
                                    </li>
                                </a>
                                <a href="../Saved Jobs/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/SaveJob-icon-transparent.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                        <span> Saved Jobs </span>
                                    </li>
                                </a>
                                <a href="../Applied Jobs/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/apply-icon-removebg.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                        </svg>
                                        <span> Applied Jobs </span>
                                    </li>
                                </a>
                                <a href="../Change Password/index.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/changepassword-icon-transparent.png" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                                        </svg>
                                        <span> Change Password </span>
                                    </li>
                                </a>
                                <a href="../Logout/logout.php">
                                    <li class="list-group-item">
                                        <!-- <img src="./images/logout-icon.webp" alt=""> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
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


    <div class="container" style="padding-top: 200px;">
        <div class="row">

            <div class="col-3 first-col" style="width: 18rem;">

                <div class="card" style="width: 16rem;">

                    <div class="profile-img">

                        <form action="index.php" method="post" id="profileImg-form" enctype="multipart/form-data">

                            <input type="file" name="camera-icon" id="camera-icon">

                            <label for="camera-icon">
                                <?php
                                if ($profile_flag == 1 && $JS_ProfileImg_name) {
                                    echo '<img src="../Profile Page/upload/' . $JS_ProfileImg_name . ' " " class="card-img-top preview-img" alt="..." style="height: 256px; border-radius: 160px; cursor: pointer;">';
                                } else {
                                    echo '<img src="./images/person-icon4.png" class="card-img-top preview-img" alt="..."
                                        style="height: 256px; border-radius: 160px; cursor: pointer;">';
                                }

                                ?>
                            </label>

                            <button type="submit" name="submit-img" class="camera-icon" style="background-color: #6c63ff; border: 2px solid white;">
                                <i class="far fa-save" style="font-size: 30px; color: white;"></i>
                            </button>

                        </form>

                        <script>
                            var inpFile = document.getElementById('camera-icon');
                            var previewImage = document.querySelector('.preview-img');

                            // previewImage.style.src = '../images/alert-icon.png';

                            inpFile.addEventListener("change", function() {
                                var file = this.files[0];
                                // console.log(file);

                                if (file) {
                                    var reader = new FileReader();

                                    reader.addEventListener("load", function() {
                                        console.log(this);
                                        previewImage.src = this.result;
                                    });

                                    reader.readAsDataURL(file);
                                }

                            });
                        </script>

                    </div>

                    <div class="card-body">

                        <h2 class="card-title"><?php if ($profile_flag == 1) {
                                                    echo $JS_Name;
                                                } ?></h2>

                        <p class="card-text"><?php if ($profile_flag == 1) {
                                                    echo $JS_Profession;
                                                } ?></p>

                    </div>

                    <ul class="list-group list-group-flush">
                        <a href="../Profile Page/index.php">
                            <li class="list-group-item">
                                <!-- <img src="./images/profile-icon.webp" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <span>Profile</span>
                            </li>
                        </a>
                        <a href="../Resume Page/index.php">
                            <li class="list-group-item highlight-item">
                                <!-- <img src="./images/resume-icon.png" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
                                </svg>
                                <span> My Resume </span>
                            </li>
                        </a>
                        <a href="../Find Jobs/index.php">
                            <li class="list-group-item">
                                <!-- <img src="./images/resume-icon.png" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                                <span> Find Jobs </span>
                            </li>
                        </a>
                        <a href="../Saved Jobs/index.php">
                            <li class="list-group-item">
                                <!-- <img src="./images/SaveJob-icon-transparent.png" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                                <span> Saved Jobs </span>
                            </li>
                        </a>
                        <a href="../Applied Jobs/index.php">
                            <li class="list-group-item">
                                <!-- <img src="./images/apply-icon-removebg.png" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                </svg>
                                <span> Applied Jobs </span>
                            </li>
                        </a>
                        <a href="../Change Password/index.php">
                            <li class="list-group-item">
                                <!-- <img src="./images/changepassword-icon-transparent.png" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                                </svg>
                                <span> Change Password </span>
                            </li>
                        </a>
                        <a href="../Logout/logout.php">
                            <li class="list-group-item">
                                <!-- <img src="./images/logout-icon.webp" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                                <span>Logout</span>
                            </li>
                        </a>
                    </ul>

                </div>

            </div>

            <div class="col-8">

                <div class="resume-headline shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Resume Headline</h2>

                            <p class="card-text">
                                <?php
                                if ($flag == 1 && $col1 != '') {
                                    echo $col1;
                                } else {
                                    echo "B.Tech in Computer Science. Ability to work with C++, Java, and PHP.
                                    Can work well under pressure and make the best of any situation. Passionate individual
                                    with great interpersonal and communication skills.";
                                }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Resume Headline">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Resume Headline</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form1" action="index.php" method="post">
                                                <div class="mb-3">
                                                    It is the first thing recruiters notice in your profile. Write
                                                    concisely what makes you unique and right person for the job you are
                                                    looking for.
                                                </div>
                                                <div class="mb-3">
                                                    <label for="textarea1" class="form-label"></label>
                                                    <textarea class="form-control" name="ResumeHeadline" id="textarea1" rows="5" placeholder="Type Description "><?php if ($flag == 1) {
                                                                                                                                                                        echo $col1;
                                                                                                                                                                    } ?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="form1()">Save</button>
                                        </div>

                                        <script>
                                            function form1() {
                                                document.getElementById("form1").submit();
                                            }
                                        </script>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="key-skills shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Key Skills</h2>


                            <div class="skills">
                                <?php
                                if ($flag == 1 && $col2 != '') {
                                    $arr = explode(",", $col2);
                                    for ($i = 0; $i < count($arr) - 1; $i++) {
                                        echo "<button type='button' class='btn btn-outline-primary btn-sm'>" . $arr[$i] . "</button> ";
                                    }
                                } else {
                                    echo "
                                            <button type='button' class='btn btn-outline-primary btn-sm'>JavaScript</button>

                                            <button type='button' class='btn btn-outline-primary btn-sm'>CSS</button>

                                            <button type='button' class='btn btn-outline-primary btn-sm'>HTML</button>

                                            <button type='button' class='btn btn-outline-primary btn-sm'>Bootstrap</button>

                                            <button type='button' class='btn btn-outline-primary btn-sm'>Web Designing</button>
                                        ";
                                }
                                ?>
                            </div>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Key Skills</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form2" action="index.php" method="post">
                                                <div class="mb-3">
                                                    It is the first thing recruiters notice in your profile. Write
                                                    concisely what makes you unique and right person for the job you are
                                                    looking for.
                                                </div>
                                                <div class="mb-3">

                                                    <div class="msg">

                                                    </div>

                                                    <label for="textarea2" class="form-label"></label>
                                                    <textarea class="form-control" name="KeySkills" id="textarea2" rows="5" placeholder="Type Description "></textarea>

                                                    <script>
                                                        var msg = document.querySelector('.msg');
                                                        var textarea = document.getElementById('textarea2');
                                                        var alltext = "";

                                                        textarea.addEventListener("keyup", function(event) {
                                                            if (event.keyCode == 13) {

                                                                alltext += textarea.value + ",";
                                                                var text = textarea.value;
                                                                msg.innerHTML += '<div class="alert alert-primary alert-dismissible fade show" role = "alert" >' +
                                                                    text +
                                                                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
                                                                textarea.value = '';

                                                            }
                                                        });

                                                        function form2() {
                                                            textarea.value = alltext;
                                                            document.getElementById("form2").submit();
                                                        }
                                                    </script>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="form2()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="education shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Education</h2>

                            <p class="card-text">
                                <?php
                                if ($flag == 1 && $col4 != '') {
                                    echo $col4;
                                } else {
                                    echo "
                                        Mention your employment details including your current and previous company work
                                        experience <br><br>

                                        M.S. University, Vadodara - B.E. Computer Engineering, <br>
                                        XXX vidhyalaya, Vadodara - 12th 2017, <br>
                                        Vadodara - 10th 2015";
                                }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Education</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form4" action="index.php" method="post">
                                                <div class="mb-3">
                                                    It is the first thing recruiters notice in your profile. Write
                                                    concisely what makes you unique and right person for the job you are
                                                    looking for.
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputPassword4" class="form-label"></label>
                                                    <textarea class="form-control" name="Education" id="inputPassword4" rows="5" placeholder="M.S. University, Vadodara - B.E. Computer Engineering, XXX vidhyalaya, Vadodara - 12th 2017, Vadodara - 10th 2015 "><?php if ($flag == 1) {
                                                                                                                                                                                                                                                                        echo $col4;
                                                                                                                                                                                                                                                                    } ?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="form4()">Save</button>
                                        </div>
                                        <script>
                                            function form4() {
                                                document.getElementById("form4").submit();
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="projects shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Projects</h2>

                            <p class="card-text">
                                <?php
                                if ($flag == 1 && $col5 != '') {
                                    echo $col5;
                                } else {
                                    echo "
                                        Mention your Projects <br><br>
                                        For example,<br>

                                        1.) Online Voting System - 2020, <br>
                                        2.) Job Enrollment System - 2019, <br>
                                        3.) Social Media App - 2018";
                                }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal4" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Projects</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form5" action="index.php" method="post">
                                                <div class="mb-3">
                                                    It is the first thing recruiters notice in your profile. Write
                                                    concisely what makes you unique and right person for the job you are
                                                    looking for.
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputPassword4" class="form-label"></label>
                                                    <textarea class="form-control" name="Projects" id="inputPassword4" rows="5" placeholder="1) Online Voting System - 2020, 2) Job Enrollment System - 2019, 3) Social Media App - 2018"><?php if ($flag == 1) {
                                                                                                                                                                                                                                                echo $col5;
                                                                                                                                                                                                                                            } ?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="form5()">Save</button>
                                        </div>
                                        <script>
                                            function form5() {
                                                document.getElementById("form5").submit();
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="profile-summary shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Profile Summary</h2>

                            <p class="card-text">
                                <?php
                                if ($flag == 1 && $col6 != '') {
                                    echo $col6;
                                } else {
                                    echo "
                                        Your Profile Summary should mention the highlights of your career and education, what
                                        your professional interests are, and what kind of a career you are looking for. Write a
                                        meaningful summary of more than 50 characters.";
                                }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal5" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Profile Summary</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form6" action="index.php" method="post">
                                                <div class="mb-3">
                                                    It is the first thing recruiters notice in your profile. Write
                                                    concisely what makes you unique and right person for the job you are
                                                    looking for.
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputPassword4" class="form-label"></label>
                                                    <textarea class="form-control" name="ProfileSummary" id="inputPassword4" rows="5" placeholder="Type Description "><?php if ($flag == 1) {
                                                                                                                                                                            echo $col6;
                                                                                                                                                                        } ?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="form6()">Save</button>
                                        </div>
                                        <script>
                                            function form6() {
                                                document.getElementById("form6").submit();
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="accomplishments shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Accomplishments</h2>

                            <div class="online-profile accomplishment-section">

                                <h5 class="card-subtitle mb-2">Online Profile</h5>

                                <p class="card-text">
                                    <?php
                                    if ($flag == 1 && $col7 != '') {
                                        echo $col7;
                                    } else {
                                        echo "
                                            Add link to Online profiles (e.g. Linkedin, Facebook etc.).";
                                    }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal6" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Online Profile</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form7" action="index.php" method="post">
                                                    <div class="mb-3">
                                                        It is the first thing recruiters notice in your profile. Write
                                                        concisely what makes you unique and right person for the job you
                                                        are
                                                        looking for.
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputPassword4" class="form-label"></label>
                                                        <textarea class="form-control" name="OnlineProfile" id="inputPassword4" rows="5" placeholder="www.linkedin.com, www.facebook.com"><?php if ($flag == 1) {
                                                                                                                                                                                                echo $col7;
                                                                                                                                                                                            } ?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="form7()">Save</button>
                                            </div>
                                            <script>
                                                function form7() {
                                                    document.getElementById("form7").submit();
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="separator"></div>

                            <div class="online-profile accomplishment-section">

                                <h5 class="card-subtitle mb-2">Work Sample
                                </h5>

                                <p class="card-text">
                                    <?php
                                    if ($flag == 1 && $col8 != '') {
                                        echo $col8;
                                    } else {
                                        echo "Add link to your Projects Github link if any.";
                                    }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal7" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Work Sample</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form8" action="index.php" method="post">
                                                    <div class="mb-3">
                                                        It is the first thing recruiters notice in your profile. Write
                                                        concisely what makes you unique and right person for the job you
                                                        are
                                                        looking for.
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputPassword4" class="form-label"></label>
                                                        <textarea class="form-control" name="WorkSample" id="inputPassword4" rows="5" placeholder="Type Description "><?php if ($flag == 1) {
                                                                                                                                                                            echo $col8;
                                                                                                                                                                        } ?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="form8()">Save</button>
                                            </div>
                                            <script>
                                                function form8() {
                                                    document.getElementById("form8").submit();
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="separator"></div>

                            <div class="online-profile accomplishment-section">

                                <h5 class="card-subtitle mb-2">Research Publication
                                </h5>

                                <p class="card-text">
                                    <?php
                                    if ($flag == 1 && $col9 != '') {
                                        echo $col9;
                                    } else {
                                        echo "Add links to your Online publications.";
                                    }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal8" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Research Publication</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form9" action="index.php" method="post">
                                                    <div class="mb-3">
                                                        It is the first thing recruiters notice in your profile. Write
                                                        concisely what makes you unique and right person for the job you
                                                        are
                                                        looking for.
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputPassword4" class="form-label"></label>
                                                        <textarea class="form-control" name="Research Publication" id="inputPassword4" rows="5" placeholder="Type Description "><?php if ($flag == 1) {
                                                                                                                                                                                    echo $col9;
                                                                                                                                                                                } ?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="form9()">Save</button>
                                            </div>
                                            <script>
                                                function form9() {
                                                    document.getElementById("form9").submit();
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="separator"></div>

                            <div class="online-profile accomplishment-section">

                                <h5 class="card-subtitle mb-2">Patent
                                </h5>

                                <p class="card-text">
                                    <?php
                                    if ($flag == 1 && $col10 != '') {
                                        echo $col10;
                                    } else {
                                        echo "Add details of Patents you have filed.";
                                    }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal9" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Patent</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form10" action="index.php" method="post">
                                                    <div class="mb-3">
                                                        It is the first thing recruiters notice in your profile. Write
                                                        concisely what makes you unique and right person for the job you
                                                        are
                                                        looking for.
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputPassword4" class="form-label"></label>
                                                        <textarea class="form-control" name="Patent" id="inputPassword4" rows="5" placeholder="Type Description "><?php if ($flag == 1) {
                                                                                                                                                                        echo $col10;
                                                                                                                                                                    } ?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="form10()">Save</button>
                                            </div>
                                            <script>
                                                function form10() {
                                                    document.getElementById("form10").submit();
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="separator"></div>

                            <div class="online-profile accomplishment-section">

                                <h5 class="card-subtitle mb-2">Certification
                                </h5>

                                <p class="card-text">
                                    <?php
                                    if ($flag == 1 && $col11 != '') {
                                        echo $col11;
                                    } else {
                                        echo "Add details of Certification you have filed.";
                                    }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal10" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Certification</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form11" action="index.php" method="post">
                                                    <div class="mb-3">
                                                        It is the first thing recruiters notice in your profile. Write
                                                        concisely what makes you unique and right person for the job you
                                                        are
                                                        looking for.
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputPassword4" class="form-label"></label>
                                                        <textarea class="form-control" name="Certification" id="inputPassword4" rows="5" placeholder="Type Description "><?php if ($flag == 1) {
                                                                                                                                                                                echo $col11;
                                                                                                                                                                            } ?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="form11()">Save</button>
                                            </div>

                                            <script>
                                                function form11() {
                                                    document.getElementById("form11").submit();
                                                }
                                            </script>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>









                <div class="career-profile shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Experience
                            </h2>

                            <p class="card-text">

                                <div class="row row-cols-1 row-cols-md-2 g-4">

                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Years of Experience :</h5>
                                                <p class="card-text">
                                                    <?php
                                                    if ($flag == 1 && $col12 != '') {
                                                        echo $col12;
                                                    } else {
                                                        echo "2 Years";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Company name (for which you worked Previously) :</h5>
                                                <p class="card-text">
                                                    <?php
                                                    if ($flag == 1 && $col13 != '') {
                                                        echo $col13;
                                                    } else {
                                                        echo "Mircrosoft, Google";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Position in Company :</h5>
                                                <p class="card-text">
                                                    <?php
                                                    if ($flag == 1 && $col14 != '') {
                                                        echo $col14;
                                                    } else {
                                                        echo "Web Designer";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Job Type</h5>
                                                <p class="card-text">
                                                    <?php
                                                    if ($flag == 1 && $col15 != '') {
                                                        echo $col15;
                                                    } else {
                                                        echo "permanent";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Employment Type</h5>
                                                <p class="card-text">
                                                    <?php
                                                    if ($flag == 1 && $col16 != '') {
                                                        echo $col16;
                                                    } else {
                                                        echo "Full Time";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal11" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Experience</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form12" action="index.php" method="post">
                                                <div class="mb-3">
                                                    It is the first thing recruiters notice in your profile. Write
                                                    concisely what makes you unique and right person for the job you
                                                    are
                                                    looking for.
                                                </div>
                                                <div class="mb-3">

                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input1" class="form-label">Years of Experience :</label>
                                                        <input type="text" name="ExpYears" class="form-control" id="input1" placeholder="2 Years" value="<?php if ($flag == 1) {
                                                                                                                                                                echo $col12;
                                                                                                                                                            } ?>">
                                                    </div>

                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input2" class="form-label">Company name (for which you worked Previously) :</label>
                                                        <input type="text" name="Company" class="form-control" id="input2" placeholder="Microsoft, Google" value="<?php if ($flag == 1) {
                                                                                                                                                                        echo $col13;
                                                                                                                                                                    } ?>">
                                                    </div>

                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input3" class="form-label">Position in Company :</label>
                                                        <input type="text" name="Role" class="form-control" id="input3" placeholder="Web Designer" value="<?php if ($flag == 1) {
                                                                                                                                                                echo $col14;
                                                                                                                                                            } ?>">
                                                    </div>

                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input4" class="form-label">Job Type :</label>
                                                        <input type="text" name="JobType" class="form-control" id="input4" placeholder="permanent" value="<?php if ($flag == 1) {
                                                                                                                                                                echo $col15;
                                                                                                                                                            } ?>">
                                                    </div>

                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input5" class="form-label">Employment Type :</label>
                                                        <input type="text" name="EmploymentType" class="form-control" id="input5" placeholder="Full Time" value="<?php if ($flag == 1) {
                                                                                                                                                                        echo $col16;
                                                                                                                                                                    } ?>">
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="form12()">Save</button>
                                        </div>
                                        <script>
                                            function form12() {
                                                document.getElementById("form12").submit();
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>




                <div class="attach-resume shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Generate Resume</h2>

                            <p class="card-text">
                                Resume is the most important document recruiters look for. Recruiters generally do not
                                look at profiles without resumes.
                            </p>

                            <form action="">
                                <div class="mb-3">
                                    <a href="g_resume.php" class="btn btn-primary btn-lg" role="button">Generate CV</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>