<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="usercorrect.css">
    <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahaj Technologies - Result</title>
</head>

<body>

    <!-- Navbar Section -->

    <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../Profile Page/images/web-logo1.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
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
                                <li><a class="dropdown-item" href="../Job Alerts/index.php">Job Alerts</a></li>
                                <li><a class="dropdown-item" href="../Change Password/index.php">Change Password</a></li>
                                <li><a class="dropdown-item" href="../Logout/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../Find Jobs/index.php">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>

                    <li class="nav-item">

                    <a style='color: white !important;' class="nav-link btn btn-primary register-btn" href="Sign-up/sign-up.php">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                    </a>

          </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- End Navbar Section -->

    <div class="header" style="font-weight: bold; font-size: 55px; text-decoration: underline;">
        Your Result
    </div>
    <div class="card">
        <div class="card-body">
            <?php
            $server = "localhost";
            $dbuser = "root";
            $conn = mysqli_connect($server, $dbuser);
            if (!$conn) {
                die("could not connect" . mysqli_connect_error());
            }

            // print_r($_SESSION);
            // echo "<br>";
            $uid = $_POST["uid"];
            $emailadd = $_SESSION["mail"];
            $dbjob1 = $_SESSION["dbjob"];
            $dbjob = $_SESSION["dbjob"];
            $sql1 = "SELECT `fname`,`lname`,`EMAIL`,`ANS_NO1`,`ANS_NO2`,`ANS_NO3`,`ANS_NO4`,`ANS_NO5`,`ANS_NO6`,`ANS_NO7`,`ANS_NO8`,`ANS_NO9`,`ANS_NO10`,`ANS_NO11`,`ANS_NO12`,`ANS_NO13`,`ANS_NO14`,`ANS_NO15` FROM `test response`.`$dbjob1`  WHERE `EMAIL`='$emailadd';";
            $res1 = mysqli_query($conn, $sql1);
            if ($res1) {
                $row = mysqli_fetch_assoc($res1);
                $fname = $row["fname"];
                $lname = $row["lname"];
                $usermail = $row["EMAIL"];
                $ro1 = $row["ANS_NO1"];
                $ro2 = $row["ANS_NO2"];
                $ro3 = $row["ANS_NO3"];
                $ro4 = $row["ANS_NO4"];
                $ro5 = $row["ANS_NO5"];
                $ro6 = $row["ANS_NO6"];
                $ro7 = $row["ANS_NO7"];
                $ro8 = $row["ANS_NO8"];
                $ro9 = $row["ANS_NO9"];
                $ro10 = $row["ANS_NO10"];
                $ro11 = $row["ANS_NO11"];
                $ro12 = $row["ANS_NO12"];
                $ro13 = $row["ANS_NO13"];
                $ro14 = $row["ANS_NO14"];
                $ro15 = $row["ANS_NO15"];
                $dbjob = $_SESSION["dbjob"];
            
            ?>
                <div class="container w-60">
                    <div class="card border-secondary" id="card_main">
                        <div class="card-body">

                            <?php
                            echo "<div style='font-weight:bold; font-size: 25px'>NAME :- </div>" . $fname . " " . $lname . "<br>";
                            echo "<div style='font-weight:bold; margin-top: 10px; font-size: 25px'>EMAIL :- </div>" . $usermail . "<br>";
                            ?>
                        </div>
                    </div>
                    <br><br>
                    <?php

                    echo "<table class='table table-hover'>" . "<tr style='background-color: #b3d9ff'>" . "<th style='font-size:25px'>" . "Questions" . "</th>" . "<th style='font-size:25px'>" . "Your Answer" . "</th>" . "<th style='font-size:25px'>" . "Correct / Incorrect" . "</th style='font-size:25px'>" . "<th style='font-size:25px'>" . "Correct Answer" . "</th>" . "</tr>";

                    $count = 0;
                    $qn1 = 1;
                    $sql0 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn1';";
                    $res0 = mysqli_query($conn, $sql0);
                    if ($res0) {
                        $row1 = mysqli_fetch_assoc($res0);

                        $ro44 = $row1["CORR_OPT"];
                        $ro45 = $row1["QUES_ID"];
                        $ques1 = $row1["QUEST"];
                        if ($ro1 == $ro44) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques1 . "</td>" . "<td>" . $ro1 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro44" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques1 . "</td>" . "<td>" . $ro1 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro44" . "</td>" . "</tr>";
                        }
                    }
                    $qn2 = 2;
                    $sql2 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn2';";
                    $res2 = mysqli_query($conn, $sql2);
                    if ($res2) {
                        //echo "query succeeded!";
                        $row1 = mysqli_fetch_assoc($res2);


                        $ro16 = $row1["CORR_OPT"];
                        $ro17 = $row1["QUES_ID"];
                        $ques2 = $row1["QUEST"];
                        if ($ro2 == $ro16) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques2 . "</td>" . "<td>" . $ro2 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro16" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques2 . "</td>" . "<td>" . $ro2 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro16" . "</td>" . "</tr>";
                        }
                    }
                    $qn3 = 3;
                    $sql3 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn3';";
                    $res3 = mysqli_query($conn, $sql3);
                    if ($res3) {
                        $row1 = mysqli_fetch_assoc($res3);


                        $ro18 = $row1["CORR_OPT"];
                        $ro19 = $row1["QUES_ID"];
                        $ques3 = $row1["QUEST"];
                        if ($ro3 == $ro18) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques3 . "</td>" . "<td>" . $ro3 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro18" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques3 . "</td>" . "<td>" . $ro3 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro18" . "</td>" . "</tr>";
                        }
                    }
                    $qn4 = 4;
                    $sql4 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn4';";
                    $res4 = mysqli_query($conn, $sql4);
                    if ($res4) {
                        $row1 = mysqli_fetch_assoc($res4);


                        $ro20 = $row1["CORR_OPT"];
                        $ro21 = $row1["QUES_ID"];
                        $ques4 = $row1["QUEST"];
                        if ($ro4 == $ro20) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques4 . "</td>" . "<td>" . $ro4 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro20" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques4 . "</td>" . "<td>" . $ro4 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro20" . "</td>" . "</tr>";
                        }
                    }

                    $qn5 = 5;
                    $sql5 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn5';";
                    $res5 = mysqli_query($conn, $sql5);
                    if ($res5) {
                        $row1 = mysqli_fetch_assoc($res5);


                        $ro22 = $row1["CORR_OPT"];
                        $ro23 = $row1["QUES_ID"];
                        $ques5 = $row1["QUEST"];
                        if ($ro5 == $ro22) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques5 . "</td>" . "<td>" . $ro5 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro22" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques5 . "</td>" . "<td>" . $ro5 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro22" . "</td>" . "</tr>";
                        }
                    }

                    $qn6 = 6;
                    $sql6 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn6';";
                    $res6 = mysqli_query($conn, $sql6);
                    if ($res6) {
                        $row1 = mysqli_fetch_assoc($res6);


                        $ro24 = $row1["CORR_OPT"];
                        $ro25 = $row1["QUES_ID"];
                        $ques6 = $row1["QUEST"];
                        if ($ro6 == $ro24) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques6 . "</td>" . "<td>" . $ro6 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro24" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques6 . "</td>" . "<td>" . $ro6 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro24" . "</td>" . "</tr>";
                        }
                    }
                    $qn7 = 7;
                    $sql7 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn7';";
                    $res7 = mysqli_query($conn, $sql7);
                    if ($res7) {
                        $row1 = mysqli_fetch_assoc($res7);


                        $ro26 = $row1["CORR_OPT"];
                        $ro27 = $row1["QUES_ID"];
                        $ques7 = $row1["QUEST"];
                        if ($ro7 == $ro26) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques7 . "</td>" . "<td>" . $ro7 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro26" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques7 . "</td>" . "<td>" . $ro7 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro26" . "</td>" . "</tr>";
                        }
                    }




                    $qn8 = 8;
                    $sql8 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn8';";
                    $res8 = mysqli_query($conn, $sql8);
                    if ($res8) {
                        $row1 = mysqli_fetch_assoc($res8);


                        $ro28 = $row1["CORR_OPT"];
                        $ro29 = $row1["QUES_ID"];
                        $ques8 = $row1["QUEST"];
                        if ($ro8 == $ro28) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques8 . "</td>" . "<td>" . $ro8 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro28" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques8 . "</td>" . "<td>" . $ro8 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro28" . "</td>" . "</tr>";
                        }
                    }

                    $qn9 = 9;
                    $sql9 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn9';";
                    $res9 = mysqli_query($conn, $sql9);
                    if ($res9) {
                        $row1 = mysqli_fetch_assoc($res9);


                        $ro30 = $row1["CORR_OPT"];
                        $ro31 = $row1["QUES_ID"];
                        $ques9 = $row1["QUEST"];
                        if ($ro9 == $ro30) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques9 . "</td>" . "<td>" . $ro9 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro30" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques9 . "</td>" . "<td>" . $ro9 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro30" . "</td>" . "</tr>";
                        }
                    }

                    $qn10 = 10;
                    $sql10 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn10';";
                    $res10 = mysqli_query($conn, $sql10);
                    if ($res10) {
                        $row1 = mysqli_fetch_assoc($res10);


                        $ro32 = $row1["CORR_OPT"];
                        $ro33 = $row1["QUES_ID"];
                        $ques10 = $row1["QUEST"];
                        if ($ro10 == $ro32) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques10 . "</td>" . "<td>" . $ro10 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro32" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques10 . "</td>" . "<td>" . $ro10 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro32" . "</td>" . "</tr>";
                        }
                    } else {
                        echo "hmm" . $conn->error;
                    }
                    $qn11 = 11;
                    $sql11 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn11';";
                    $res11 = mysqli_query($conn, $sql11);
                    if ($res11) {
                        $row1 = mysqli_fetch_assoc($res11);


                        $ro34 = $row1["CORR_OPT"];
                        $ro35 = $row1["QUES_ID"];
                        $ques11 = $row1["QUEST"];
                        if ($ro11 == $ro34) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques11 . "</td>" . "<td>" . $ro11 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro34" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques11 . "</td>" . "<td>" . $ro11 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro34" . "</td>" . "</tr>";
                        }
                    }

                    $qn12 = 12;
                    $sql12 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn12';";
                    $res12 = mysqli_query($conn, $sql12);
                    if ($res12) {
                        $row1 = mysqli_fetch_assoc($res12);


                        $ro36 = $row1["CORR_OPT"];
                        $ro37 = $row1["QUES_ID"];
                        $ques12 = $row1["QUEST"];
                        if ($ro12 == $ro36) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques12 . "</td>" . "<td>" . $ro12 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro36" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques12 . "</td>" . "<td>" . $ro12 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro36" . "</td>" . "</tr>";
                        }
                    }
                    $qn13 = 13;
                    $sql13 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn13';";
                    $res13 = mysqli_query($conn, $sql13);
                    if ($res13) {
                        $row1 = mysqli_fetch_assoc($res13);


                        $ro38 = $row1["CORR_OPT"];
                        $ro39 = $row1["QUES_ID"];
                        $ques13 = $row1["QUEST"];
                        if ($ro13 == $ro38) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques13 . "</td>" . "<td>" . $ro13 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro38" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques13 . "</td>" . "<td>" . $ro13 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro38" . "</td>" . "</tr>";
                        }
                    }
                    $qn14 = 14;
                    $sql14 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn14';";
                    $res14 = mysqli_query($conn, $sql14);
                    if ($res14) {
                        $row1 = mysqli_fetch_assoc($res14);


                        $ro40 = $row1["CORR_OPT"];
                        $ro41 = $row1["QUES_ID"];
                        $ques14 = $row1["QUEST"];
                        if ($ro14 == $ro40) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques14 . "</td>" . "<td>" . $ro14 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro40" . "</td>" . "</tr>";
                        } else {
                            echo "<tr>" . "<td>" . $ques14 . "</td>" . "<td>" . $ro14 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i> " . "</td>" . "<td>" . "$ro40" . "</td>" . "</tr>";
                        }
                    }

                    $qn15 = 15;
                    $sql15 = "SELECT * FROM `test questions`.`$dbjob` WHERE `QUES_ID`='$qn15'";
                    $res15 = mysqli_query($conn, $sql15);
                    if ($res15) {
                        $row1 = mysqli_fetch_assoc($res15);


                        $ro42 = $row1["CORR_OPT"];
                        $ro43 = $row1["QUES_ID"];
                        $ques15 = $row1["QUEST"];
                        if ($ro15 == $ro42) {
                            $count = $count + 1;
                            echo "<tr>" . "<td>" . $ques15 . "</td>" . "<td>" . $ro15 . "</td>" . "<td>" . "<i class='fas fa-check-circle' style='font-size: 33px;'></i>" . "</td>" . "<td>" . "$ro42" . "</td>" . "</tr>" . "</table>";
                        } else {
                            echo "<tr>" . "<td>" . $ques15 . "</td>" . "<td>" . $ro15 . "</td>" . "<td>" . "<i class='fas fa-times-circle' style='font-size: 33px;'></i> " . "</td>" . "<td>" . "$ro42" . "</td>" . "</tr>" . "</table>";
                        }
                    }

                    ?>
                    <br><br>
                    <div style="text-align: center;font-size:20px" class="card text-center border-success" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text"> <?php
                                                    //echo $count."/"."15";
                                                    /*echo $ro1.$ro2.$ro3.$ro4.$ro15;
                                                        echo $ro16;
                                                        echo $ro17;
                                                    */        }
                                                $sql16 = "SELECT * FROM `test questions`.`$dbjob`";
                                                $res16 = mysqli_query($conn, $sql16);
                                                $num = mysqli_num_rows($res16);
                                                echo "<b style='font-size: 35px'>Your score is </b>" . "<b style='font-size: 30px'>" .$count . "</b>" . "/" . "<b style='font-size: 30px'>" . $num . "</b>" . "<br>" . "<br>";
                                               
                                                $_SESSION["marks"] = $count;
                                               
                                                    ?>
                            </p>
                        </div>
                    </div>
                    <?php

                    $sq = "UPDATE `test response`.`$dbjob` SET `JS_TESTMARKS`='$count' WHERE `EMAIL`='$emailadd' ;";
                    $re = mysqli_query($conn, $sq);
                    if ($re) {
                        echo "";
                    } else {
                        "not set" . $conn->error;
                    }
                    ?>
                </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>