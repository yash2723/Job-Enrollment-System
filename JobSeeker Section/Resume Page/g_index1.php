<?php
error_reporting(E_ALL ^ E_WARNING);
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server , $username , $password);

if(!$con)
{
    die("Connection to this database failed due to" . mysqli_connect_error());
}
//echo "Success connecting to the db";


start:

$sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_resume_details`";

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

    $sql = "SELECT * FROM `job enrollment system`.`jobseeker_resume_details` WHERE JS_EmailID='$login_mail' ";

    $result = mysqli_query($con,$sql);

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
        $col17 = $row['Qualification']; 
        $col18 = $row['JSR_AvailabilityToJoin']; 
        $col19 = $row['JSR_ExpectedSalary']; 

        if (isset($_POST['ResumeHeadline'])) {

            $ResumeHeadline = $_POST['ResumeHeadline'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Headline`='$ResumeHeadline' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['ResumeHeadline']);
                goto start;
            }
        
        }

        if (isset($_POST['KeySkills'])) {

            $KeySkills = $_POST['KeySkills'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Skills`='$KeySkills' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['KeySkills']);
                goto start;
            }
        
        }

        if (isset($_POST['Employment'])) {

            $Employment = $_POST['Employment'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Employment`='$Employment' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Employment']);
                goto start;
            }
        
        }

        if (isset($_POST['Education'])) {

            $Education = $_POST['Education'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Education`='$Education' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Education']);
                goto start;
            }
        
        }

        if (isset($_POST['Projects'])) {

            $Projects = $_POST['Projects'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Projects`='$Projects' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Projects']);
                goto start;
            }
        
        }

        if (isset($_POST['ProfileSummary'])) {

            $ProfileSummary = $_POST['ProfileSummary'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_ProfileSummary`='$ProfileSummary' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['ProfileSummary']);
                goto start;
            }
        
        }

        if (isset($_POST['OnlineProfile'])) {

            $OnlineProfile = $_POST['OnlineProfile'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_OnlineProfile`='$OnlineProfile' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['OnlineProfile']);
                goto start;
            }
        
        }

        if (isset($_POST['WorkSample'])) {

            $WorkSample = $_POST['WorkSample'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_WorkSample`='$WorkSample' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['WorkSample']);
                goto start;
            }
        
        }

        if (isset($_POST['ResearchPublication'])) {

            $ResearchPublication = $_POST['ResearchPublication'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_ResearchPublication`='$ResearchPublication' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['ResearchPublication']);
                goto start;
            }
        
        }

        if (isset($_POST['Patent'])) {

            $Patent = $_POST['Patent'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Patent`='$Patent' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Patent']);
                goto start;
            }
        
        }

        if (isset($_POST['Certification'])) {

            $Certification = $_POST['Certification'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_Certification`='$Certification' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Certification']);
                goto start;
            }
        
        }

        if (isset($_POST['Industry'])) {

            $ExpYears = $_POST['ExpYears'];
            $Company = $_POST['Company'];
            $Role = $_POST['Role'];
            $JobType = $_POST['JobType'];
            $EmploymentType = $_POST['EmploymentType'];
            $DesiredShift = $_POST['DesiredShift'];
            $AvailabilityToJoin = $_POST['AvailabilityToJoin'];
            $ExpectedSalary = $_POST['ExpectedSalary'];

            $sql = "UPDATE `job enrollment system`.`jobseeker_resume_details` SET `JSR_ExpYears`='$ExpYears',`JSR_Company`='$Company',`JSR_Role`='$Role',`JSR_JobType`='$JobType',`JSR_EmploymentType`='$EmploymentType',`JSR_DesiredShift`='$DesiredShift',`JSR_AvailabilityToJoin`='$AvailabilityToJoin',`JSR_ExpectedSalary`='$ExpectedSalary' WHERE JS_EmailID='$login_mail' ";

            if($con->query($sql) == true)
            {
                echo '<script>alert("Update Successfully.")</script>';
                unset($_POST['Industry']);
                goto start;
            }
        
        }

    }
    
}
else{

    if (isset($_POST['ResumeHeadline']) || isset($_POST['KeySkills']) || isset($_POST['Employment']) || isset($_POST['Education']) || isset($_POST['Projects']) || isset($_POST['ProfileSummary']) || isset($_POST['OnlineProfile']) || isset($_POST['WorkSample']) || isset($_POST['ResearchPublication']) || isset($_POST['Patent']) || isset($_POST['Certification']) || isset($_POST['Industry']) || isset($_POST['FunctionalArea']) || isset($_POST['Role']) || isset($_POST['JobType']) || isset($_POST['EmploymentType']) || isset($_POST['DesiredShift']) || isset($_POST['AvailabilityToJoin']) || isset($_POST['ExpectedSalary'])) {

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
        $Industry = $_POST['Industry'];
        $FunctionalArea = $_POST['FunctionalArea'];
        $Role = $_POST['Role'];
        $JobType = $_POST['JobType'];
        $EmploymentType = $_POST['EmploymentType'];
        $DesiredShift = $_POST['DesiredShift'];
        $AvailabilityToJoin = $_POST['AvailabilityToJoin'];
        $ExpectedSalary = $_POST['ExpectedSalary'];

            
        $sql = "INSERT INTO `job enrollment system`.`jobseeker_resume_details` (`JS_EmailID`, `JSR_Headline`, `JSR_Skills`, `JSR_Employment`, `JSR_Education`, `JSR_Projects`, `JSR_ProfileSummary`, `JSR_OnlineProfile`, `JSR_WorkSample`, `JSR_ResearchPublication`, `JSR_Patent`, `JSR_Certification`, `JSR_Industry`, `JSR_FunctionalArea`, `JSR_Role`, `JSR_JobType`, `JSR_EmploymentType`, `JSR_DesiredShift`, `JSR_AvailabilityToJoin`, `JSR_ExpectedSalary`) VALUES ('$login_mail', '$ResumeHeadline', '$KeySkills', '$Employment', '$Education', '$Projects', '$ProfileSummary', '$OnlineProfile', '$WorkSample', '$ResearchPublication', '$Patent', '$Certification', '$Industry', '$FunctionalArea', '$Role', '$JobType', '$EmploymentType', '$DesiredShift', '$AvailabilityToJoin', '$ExpectedSalary');";

        if($con->query($sql) == true)
        {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="style1.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

    <title>Resume Page</title>
</head>

<body>



    <!-- Navbar Section -->

    <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./images/web-logo1.png" alt="">
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
                    <li><a class="dropdown-item" href="../Profile Page/index.php">Profile</a></li>
                    <li><a style="color: #6c63ff;" class="dropdown-item" href="../Resume Page/index.php">My Resume</a></li>
                    <li><a class="dropdown-item" href="../Find Jobs/index.php">Find Job</a></li>
                    <li><a class="dropdown-item" href="../Saved Jobs/index.php">Saved Jobs</a></li>
                    <li><a class="dropdown-item" href="../Applied Jobs/index.php">Applied Jobs</a></li>
                    <li><a class="dropdown-item" href="../Job Alerts/index.php">Job Alerts</a></li>
                    <li><a class="dropdown-item" href="../Change Password/index.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="../Logout/logout.php">Logout</a></li>
                </ul>
                </div>
            </li>

            <li class="nav-item">
                <!-- <a class="nav-link" href="#">For Employer</a> -->

                <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    For Employer
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Company Profile</a></li>
                    <li><a class="dropdown-item" href="#">Post Job</a></li>
                    <li><a class="dropdown-item" href="#">Browse Candidates</a></li>
                </ul>
                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Jobseeker Section Page/Find Jobs/index.html">
                <i class="fas fa-search"></i>
                </a>
            </li>

            <li class="nav-item">

                <a class="nav-link btn btn-primary register-btn" href="Sign-up/sign-up.php">
                <i class="fas fa-user-plus"></i>
                Sign Up
                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link btn btn-primary login-btn" href="Sign-in/sign-in.php">
                <i class="fas fa-lock"></i>
                Login
                </a>

            </li>

            </ul>

            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->

        </div>
        </div>
    </nav>
    <!-- </div> -->

    <!-- End Navbar Section -->

    <!--  -->


    <div class="container" style="padding-top: 200px;">
        <div class="row">

            <div class="col-8">

                <div class="resume-headline shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Resume Headline</h2>

                            <p class="card-text">
                                <?php 
                                if($flag == 1 && $col1 != '') { 
                                    echo $col1;
                                }
                                else {
                                    echo "B.Tech in Computer Science. Ability to work with C++, Java, and PHP.
                                    Can work well under pressure and make the best of any situation. Passionate individual
                                    with great interpersonal and communication skills.";
                                }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="Resume Headline">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Resume Headline</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                    <textarea class="form-control" name="ResumeHeadline" id="textarea1" rows="5"
                                                        placeholder="Type Description "><?php if($flag == 1){ echo $col1;}?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
                                    if($flag == 1 && $col2 != '') {
                                        $arr = explode(",",$col2);
                                        for ($i = 0; $i < count($arr)-1 ; $i++) {
                                            echo "<button type='button' class='btn btn-outline-primary btn-sm'>".$arr[$i]."</button> ";
                                        }
                                    }
                                    else {
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

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Key Skills</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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

                                                        textarea.addEventListener("keyup", function (event) {
                                                            if (event.keyCode == 13) {
                                                                
                                                                alltext += textarea.value + ",";
                                                                var text = textarea.value;
                                                                msg.innerHTML += '<div class="alert alert-primary alert-dismissible fade show" role = "alert" > ' + 
                                                                text +
                                                                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div> ';
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
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="form2()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- <div class="employment shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Experience</h2>

                            <p class="card-text">
                                <?php 
                                    // if($flag == 1 && $col3 != '') { 
                                    //     echo $col3;
                                    // }
                                    // else {
                                    //     echo "
                                    //     Software Engineer <br>
                                    //     Freelance Software Development <br>
                                    //     Feb 2020 - Present 1 year 1 month
                                    //     <br>
                                    //     Gujarat , India
                                    //     <br>
                                    //     Collaborating with clients to build advanced software applications, develop websites,
                                    //     and administrate networks. Work is done on a contract basis.";
                                    // }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Employment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form3" action="index.php" method="post">
                                                <div class="mb-3">
                                                    It is the first thing recruiters notice in your profile. Write
                                                    concisely what makes you unique and right person for the job you are
                                                    looking for.
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputPassword4" class="form-label"></label>
                                                    <textarea class="form-control" name="Employment" id="inputPassword4" rows="5"
                                                        placeholder="Type Description ">
                                                        <?php
                                                        //  if($flag == 1){ echo $col3;}
                                                         ?>
                                                        </textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="form3()">Save</button>
                                        </div>
                                        <script>
                                            function form3() {
                                                document.getElementById("form3").submit();
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> -->

                <div class="education shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Education</h2>

                            <p class="card-text">
                                <?php 
                                    if($flag == 1 && $col4 != '') { 
                                        echo $col4;
                                    }
                                    else {
                                        echo "
                                        Mention your employment details including your current and previous company work
                                        experience <br><br>

                                        M.S. University, Vadodara - B.E. Computer Engineering, <br>
                                        XXX vidhyalaya, Vadodara - 12th 2017, <br>
                                        Vadodara - 10th 2015";
                                    }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal3" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Education</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                    <textarea class="form-control" name="Education" id="inputPassword4" rows="5"
                                                        placeholder="M.S. University, Vadodara - B.E. Computer Engineering, XXX vidhyalaya, Vadodara - 12th 2017, Vadodara - 10th 2015 "><?php if($flag == 1){ echo $col4;}?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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

                <!-- <div class="it-skills shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">IT Skills</h2>

                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>

                            <p class="card-text">

                            <table class="table table-striped">
                                <thead>
                                    <tr class="table-info">
                                        <th scope="col">Skills</th>
                                        <th scope="col">Version</th>
                                        <th scope="col">Last Used</th>
                                        <th scope="col">Experience</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">Bootstrap</td>
                                        <td>3</td>
                                        <td>2020</td>
                                        <td>1 Year 5 Months</td>
                                        <td><a href=""><img src="./images/edit-icon.png" alt=""></a></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">HTML</td>
                                        <td>5</td>
                                        <td>2020</td>
                                        <td>2 Year</td>
                                        <td><a href=""><img src="./images/edit-icon.png" alt=""></a></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">CSS</td>
                                        <td>3</td>
                                        <td>2020</td>
                                        <td>1 Year 6 Months</td>
                                        <td><a href=""><img src="./images/edit-icon.png" alt=""></a></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">JavaScript</td>
                                        <td>ES6</td>
                                        <td>2020</td>
                                        <td>1 Year</td>
                                        <td><a href=""><img src="./images/edit-icon.png" alt=""></a></td>
                                    </tr>
                                </tbody>
                            </table>

                            </p>

                            <a href="#" class="card-link">Card link</a>
                              <a href="#" class="card-link">Another link</a>

                            <button type="button" class="btn btn-primary btn-sm edit-btn">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                        </div>
                    </div>
                </div> -->

                <div class="projects shadow">
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title">Projects</h2>

                            <p class="card-text">
                                <?php 
                                    if($flag == 1 && $col5 != '') { 
                                        echo $col5;
                                    }
                                    else {
                                        echo "
                                        Mention your Projects <br><br>
                                        For example,<br>

                                        1.) Online Voting System - 2020, <br>
                                        2.) Job Enrollment System - 2019, <br>
                                        3.) Social Media App - 2018";
                                    }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal4" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Projects</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                    <textarea class="form-control" name="Projects" id="inputPassword4" rows="5"
                                                        placeholder="1) Online Voting System - 2020, 2) Job Enrollment System - 2019, 3) Social Media App - 2018"><?php if($flag == 1){ echo $col5;}?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
                                    if($flag == 1 && $col6 != '') { 
                                        echo $col6;
                                    }
                                    else {
                                        echo "
                                        Your Profile Summary should mention the highlights of your career and education, what
                                        your professional interests are, and what kind of a career you are looking for. Write a
                                        meaningful summary of more than 50 characters.";
                                    }
                                ?>
                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal5" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Profile Summary</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                    <textarea class="form-control" name="ProfileSummary" id="inputPassword4" rows="5"
                                                        placeholder="Type Description "><?php if($flag == 1){ echo $col6;}?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
                                        if($flag == 1 && $col7 != '') { 
                                            echo $col7;
                                        }
                                        else {
                                            echo "
                                            Add link to Online profiles (e.g. Linkedin, Facebook etc.).";
                                        }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal6" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal6" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Online Profile</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
                                                        <textarea class="form-control" name="OnlineProfile" id="inputPassword4" rows="5"
                                                            placeholder="www.linkedin.com, www.facebook.com"><?php if($flag == 1){ echo $col7;}?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
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
                                        if($flag == 1 && $col8 != '') { 
                                            echo $col8;
                                        }
                                        else {
                                            echo "Add link to your Projects Github link if any.";
                                        }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal7" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal7" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Work Sample</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
                                                        <textarea class="form-control" name="WorkSample" id="inputPassword4" rows="5"
                                                            placeholder="Type Description "><?php if($flag == 1){ echo $col8;}?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
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
                                        if($flag == 1 && $col9 != '') { 
                                            echo $col9;
                                        }
                                        else {
                                            echo "Add links to your Online publications.";
                                        }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal8" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal8" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Research Publication</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
                                                        <textarea class="form-control" name="Research Publication" id="inputPassword4" rows="5"
                                                            placeholder="Type Description "><?php if($flag == 1){ echo $col9;}?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
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
                                        if($flag == 1 && $col10 != '') { 
                                            echo $col10;
                                        }
                                        else {
                                            echo "Add details of Patents you have filed.";
                                        }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal9" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal9" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Patent</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
                                                        <textarea class="form-control" name="Patent" id="inputPassword4" rows="5"
                                                            placeholder="Type Description "><?php if($flag == 1){ echo $col10;}?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
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
                                        if($flag == 1 && $col11 != '') { 
                                            echo $col11;
                                        }
                                        else{
                                            echo "Add details of Certification you have filed.";
                                        }
                                    ?>
                                </p>

                                <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal10" data-bs-whatever="">
                                    <img src="./images/edit-icon1-transparent.png" alt="">
                                    Edit
                                </button>

                                <div class="modal fade" id="exampleModal10" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Certification</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
                                                        <textarea class="form-control" name="Certification" id="inputPassword4" rows="5"
                                                            placeholder="Type Description "><?php if($flag == 1){ echo $col11;}?></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
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
                                                    if($flag == 1 && $col12 != '') { 
                                                        echo $col12;
                                                    }
                                                    else {
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
                                                    if($flag == 1 && $col13 != '') { 
                                                        echo $col13;
                                                    }
                                                    else {
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
                                                    if($flag == 1 && $col14 != '') { 
                                                        echo $col14;
                                                    }
                                                    else {
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
                                                    if($flag == 1 && $col15 != '') { 
                                                        echo $col15;
                                                    }
                                                    else {
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
                                                    if($flag == 1 && $col16 != '') { 
                                                        echo $col16;
                                                    }
                                                    else {
                                                        echo "Full Time";
                                                    }    
                                                ?>     
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Qualification</h5>
                                            <p class="card-text">
                                                <?php 
                                                    // if($flag == 1 && $col17 != '') { 
                                                    //     echo $col17;
                                                    // }
                                                    // else {
                                                    //     echo "Add Your Qualification";
                                                    // }    
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
<!-- 
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Availability to Join</h5>
                                            <p class="card-text">
                                                <?php 
                                                    // if($flag == 1 && $col18 != '') { 
                                                    //     echo $col18;
                                                    // }
                                                    // else {
                                                    //     echo "12 july";
                                                    // }    
                                                ?>      
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Expected Salary</h5>
                                            <p class="card-text">
                                                <?php 
                                                    // if($flag == 1 && $col19 != '') { 
                                                    //     echo $col19;
                                                    // }
                                                    // else {
                                                    //     echo "1 Lakhs";
                                                    // }    
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div> --> -->

                            </div>

                            </p>

                            <button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal11" data-bs-whatever="">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button>

                            <div class="modal fade" id="exampleModal11" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Experience</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                        <input type="text" name="Industry" class="form-control" id="input1" placeholder="2 Years" value="<?php if($flag == 1){ echo $col12;}?>">
                                                    </div>
                        
                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input2" class="form-label">Company name (for which you worked Previously) :</label>
                                                        <input type="text" name="Company" class="form-control" id="input2" placeholder="Microsoft, Google" value="<?php if($flag == 1){ echo $col13;}?>">
                                                    </div>
                        
                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input3" class="form-label">Position in Company :</label>
                                                        <input type="text" name="Role" class="form-control" id="input3" placeholder="Web Designer" value="<?php if($flag == 1){ echo $col14;}?>">
                                                    </div>
                        
                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input4" class="form-label">Job Type :</label>
                                                        <input type="text" name="JobType" class="form-control" id="input4" placeholder="permanent" value="<?php if($flag == 1){ echo $col15;}?>">
                                                    </div>
                        
                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input5" class="form-label">Employment Type :</label>
                                                        <input type="text" name="EmploymentType" class="form-control" id="input5" placeholder="Full Time" value="<?php if($flag == 1){ echo $col16;}?>">
                                                    </div>
                        
                                                    <!-- <div class="col-md-6" style="width: 90%;">
                                                        <label for="input6" class="form-label">Qualification :</label>
                                                        <input type="text" name="Qualification" class="form-control" id="input6" placeholder="Add Desired Shift" value="<?php if($flag == 1){ echo $col17;}?>">
                                                    </div> -->
<!--                         
                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input7" class="form-label">Availability to Join :</label>
                                                        <input type="text" name="AvailabilityToJoin" class="form-control" id="input7" placeholder="12 july" value="<?php if($flag == 1){ echo $col18;}?>">
                                                    </div> -->
<!--                         
                                                    <div class="col-md-6" style="width: 90%;">
                                                        <label for="input8" class="form-label">Expected Salary :</label>
                                                        <input type="text" name="ExpectedSalary" class="form-control" id="input8" placeholder="1 Lakhs" value="<?php if($flag == 1){ echo $col19;}?>">
                                                    </div> --> 

                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
                                <div class="btn-success"  style="height: 30px;
    text-align: center; cursor: pointer;">Generate CV</div>
                                    <!-- <label for="formFile" class="form-label">
                                        <img src="./images/upload-image-icon.jpg" alt="">
                                        Upload Resume File
                                    </label> -->
                                    <!-- <input class="form-control" type="file" id="formFile"> -->
                                </div>
                            </form>

                            <!-- <button type="button" class="btn btn-primary btn-sm edit-btn">
                                <img src="./images/edit-icon1-transparent.png" alt="">
                                Edit
                            </button> -->

                        </div>
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

</body>

</html>