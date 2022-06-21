<?php

    session_start();
    $login_mail = $_SESSION['mail'];

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server , $username , $password);

    if(!$con)
    {
        // die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    $job_id = $_POST['JobID'];

    if (isset($_POST['Applied_Job_ID'])) {

        $job_id = $_POST['Applied_Job_ID'];

        $applied_job_id = $_POST['Applied_Job_ID'];

        start:

        $sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_applied_jobs_details`";

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

            $sql = "SELECT * FROM `job enrollment system`.`jobseeker_applied_jobs_details` WHERE JS_EmailID='$login_mail' ";

            $result = mysqli_query($con,$sql);

            while ($row = mysqli_fetch_array($result)) {
                
                $col1 = $row['Job_ID']; 

                $arr = explode(" ",$col1);

                if (in_array($applied_job_id, $arr)) {
                    $index = array_search($applied_job_id,$arr);
                    unset($arr[$index]);
                    print_r($arr); 
                    $total_jobs = implode(" ",$arr);
                }
                else {
                    array_push($arr,$applied_job_id);
                    $total_jobs = implode(" ",$arr);
                }
                $sql = "UPDATE `job enrollment system`.`jobseeker_applied_jobs_details` SET `Job_ID`='$total_jobs' WHERE JS_EmailID='$login_mail' ";
                        
                mysqli_query($con,$sql);
                // echo "Update Successfully";
                unset($_POST['apply-btn']);
                // goto start;

            }
        
        }
        else {

            $sql = "INSERT INTO `job enrollment system`.`jobseeker_applied_jobs_details` (`JS_EmailID`, `Job_ID`) VALUES ('$login_mail', '$job_id')";

            if($con->query($sql) == true)
            {
                // echo "Apply your job";
                unset($_POST['apply-btn']);
                // goto start;
            }
            else
            {
                echo "Error.Please try again";
            }

        }



    }

?>











<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/41ab1a280e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="job_details.css">
    <title>Job Finder - Technical Quiz</title>
</head>

<body>

    <!-- Navbar Section -->

    <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../Profile Page/images/web-logo1.png" alt="">
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
                <a class="nav-link" href="#">About</a>
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

            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->

        </div>
        </div>
    </nav>
    <!-- </div> -->

    <!-- End Navbar Section -->


    <!-- main card -->
    <div class="container">

        <?php
            // echo $job_id;

            $app_flag = 0;

            $sql = "SELECT `Job_ID` FROM `job enrollment system`.`jobseeker_applied_jobs_details` WHERE JS_EmailID='$login_mail' ";

            $result = mysqli_query($con,$sql);

            while ($row = mysqli_fetch_array($result)) {
                $GLOBALS['app_job_id'] = $row['Job_ID']; 
            }

            if ($GLOBALS['app_job_id']) {
                
                $arr = explode(" ",$GLOBALS['app_job_id']);

                if (in_array($job_id, $arr)) {
                    $app_flag = 1;
                }
                else {
                    $app_flag = 0;
                }
                
            }
            
            $query = "SELECT * FROM `job enrollment system`.`job_details` WHERE Job_ID='$job_id'";
            $data = mysqli_query($con,$query);

            while ($row = mysqli_fetch_array($data)) {

                $J_Name = $row['J_Name'];
                $J_Type = $row['J_Type'];
                $J_Designation = $row['J_Designation'];
                $J_KeySkill = $row['J_KeySkill'];
                $J_Qualification = $row['J_Qualification'];
                $J_Salary = $row['J_Salary'];
                $J_Experience = $row['J_Experience'];
                $J_Place = $row['J_Place'];
                $J_Vacancies = $row['J_Vacancies'];
                $J_Date = $row['J_Date'];
                $J_Description = $row['J_Description'];

                $arr = explode(".",$J_Description);

                if ($app_flag == 0) {
                    $content_of_btn = "Apply Now";
                }
                else {
                    $content_of_btn = "Applied";
                }

                echo "
                    <div class='card' id='card_main'>
                        <div class='card-img' style='margin : 10px 30px'>
                            <img src='./images/".$J_Name.".png' alt='...' style='width:150px; height:150px;'>
                        </div>
                        <div class='card-body'>
                            <p class='card-title'>".$J_Name."</p>
                            <p class='card-title' id='card_llc'>For a Sahaj Technologies</p>
                            <p class='card-text'><i class='fas fa-graduation-cap'></i> &nbsp; ".$J_Qualification."</p>
                            <p class='card-text'><i class='fas fa-briefcase'></i> &nbsp; ".$J_Experience."</p>
                            <p class='card-text'><i class='fas fa-user-tie'></i> &nbsp; ".$J_KeySkill."</p>
                            <p class='card-text'><i class='fas fa-rupee-sign'></i> &nbsp; ".$J_Salary."</p>
                        </div>
                    </div>

                    <div class='card' id='apply_card'>
                        <hr>
            
                        <form method='post' action='index.php' style='margin: 0.5rem; margin-left: auto;'> 
                            <button onclick='CVTest()' type='submit' name='apply-btn' class='btn btn-primary' id='apply_btn'>".$content_of_btn."</button>
                            <input type='hidden' name='Applied_Job_ID' value=".$job_id.">
                        </form>
                        
                    </div>

                    <div class='card' id='card_details'>
                        <div class='card-body'>
                            <div class='card_details_title'>
                                <div class='card-title'>For a client of Sahaj Technologies - Job Details</div>
                            </div>

                            <hr>

                            <br>

                            <div class='card-text'>
                                <b>Job Summary</b>
                                <ul>
                                    <li><b>Job Type : </b> <span class='job_type'>".$J_Type."</span></li>
                                    <li><b>Job Role : </b> <span class='job_role'>".$J_Designation."</span></li>
                                    <li><b>Job Category : </b> <span class='job_category'>".$J_Name."</span></li>
                                    <li><b>Hiring Process : </b> <span class='job_type'>Face to Face Interview</span></li>
                                    <li><b>Who Can Apply : </b> <span class='job_type'>Experienced (".$J_Experience.")</span></li>
                                </ul>
                            </div>

                            <br>

                            <div class='card-text'>
                                <a href='#'><b>About for Sahaj Techonologies </b></a>
                            </div>
                                
                            <hr>
                            
                            ";
                            if ($app_flag == 1) {
                                $_SESSION['Job_Name'] = $J_Name;
                                echo "<div class='text-center'>
                                        <form action='../Give Test/jsresponse.php' method='post'>
                                            <button type='submit' class='btn btn-primary' id='apply_btn'>Give Test</button>
                                            <input type='hidden' name='Applied_Job_ID' value=".$job_id.">
                                        </form>
                                    </div>";
                            }
                            echo "    
                        </div>
                    </div>
                ";
            }

        ?>

        <!-- <div class="card" id="card_main">
            <div class="card-img">
                <img src="../img/front-end_developer.png" alt="...">
            </div>
            <div class="card-body">
                <p class="card-title">Front End Developer</p>
                <p class="card-title" id="card_llc">For a Sahajanand Infotech Private LTD</p>
                <p class="card-text"><i class="fas fa-graduation-cap"> &nbsp; MCA</i></i></p>
                <p class="card-text"><i class="fas fa-briefcase"> &nbsp; 2-5 Years</i></p>
                <p class="card-text"><i class="fas fa-user-tie"> &nbsp; JavaScript</i></p>
                <p class="card-text"><i class="fas fa-rupee-sign"> &nbsp; 30,000 - 50,000 / Month</i></p>
            </div>
        </div> -->

        <!-- apply now and last date card -->
        <!-- <div class="card" id="apply_card">
            <hr>
            <i class="far fa-calendar-alt"> &nbsp;Last Date <b>11 Apr 2021</b></i>
            <div class="btn btn-primary" id="apply_btn">Apply Now</div>
            <i id="favorite_before" class="far fa-star"></i>
            <i id="favorite_after" class="fas fa-star"></i>
        </div> -->

        <!-- job details card -->
        <!-- <div class="card" id="card_details">
            <div class="card-body">
                <div class="card_details_title">
                    <div class="card-title">For a client of Sahajanand Infotech Private LTD - Job Details</div>
                    <div class="card-title" id="dop">Date of posting: 11 Feb 2021</div>
                </div>
                <hr>
                <div class="card-text">Design & development of mechanical components, plastic components inline with
                    Design Guidelines </div>
                <div class="card-text">
                    <ul>
                        <li>Generating Bill of materials, Manufacturing Drawings & Design reports</li>
                        <li>Strong written and oral communication in English Language, </li>
                        <li>Ready to travel globally & locally for short term/long term assignment</li>
                        <li>Basic Japanese language has an added advantage.</li>
                        <li>Experience on Tool designing added an advantage</li>
                        <li>Knowledge on development of Scooters and motorcycles added an advantage</li>
                    </ul>
                </div>

                <br>
                <div class="card-text">
                    <b>Job Summary</b>
                    <ul>
                        <li><b>Job Type : </b> <span class="job_type">Full Time</span></li>
                        <li><b>Job Role : </b> <span class="job_role">Others</span></li>
                        <li><b>Job Category : </b> <span class="job_category">Full Time</span></li>
                        <li><b>Hiring Process : </b> <span class="job_type">Face to Face Interview</span></li>
                        <li><b>Who Can Apply : </b> <span class="job_type">Experienced (3 to 5 Years)</span></li>
                    </ul>
                </div>

                <br>
                <div class="card-text">
                    <a href="#"><b>About for Sahajanand Infotech Private LTD</b></a>
                </div>
                <hr>

                <div class="text-center">
                    <div class="btn btn-primary" id="apply_btn_2">Apply Now</div>
                </div>
            </div>
        </div> -->

    </div>
</body>

</html>