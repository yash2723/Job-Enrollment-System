<?php
error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ALL ^ E_NOTICE);

$login_mail = $_POST['C_Email'];

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server , $username , $password);

if(!$con)
{
    die("Connection to this database failed due to" . mysqli_connect_error());
}


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
 }

$sql1 = "SELECT * FROM `job enrollment system`.`jobseeker_resume_details` WHERE JS_EmailID='$login_mail' ";

$result1 = mysqli_query($con,$sql1);

while ($row1 = mysqli_fetch_array($result1)) {
    $col17 = $row1['JSR_Headline'];
    $col18 = $row1['JSR_Skills'];
    $col19 = $row1['JSR_Employment']; 
    $col20 = $row1['JSR_Education'];
    $col21 = $row1['JSR_Projects'];
    $col22 = $row1['JSR_ProfileSummary']; 
    $col23 = $row1['JSR_OnlineProfile']; 
    $col24 = $row1['JSR_WorkSample']; 
    $col25 = $row1['JSR_ResearchPublication']; 
    $col26 = $row1['JSR_Patent'];
    $col27 = $row1['JSR_Certification']; 
    $col28 = $row1['JSR_ExpYears']; //years of experience
    $col29 = $row1['JSR_Company']; // company names
    $col30 = $row1['JSR_Role']; //position in company
    $col31 = $row1['JSR_JobType']; 
    $col32 = $row1['JSR_EmploymentType']; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="ShowCV.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
        
        <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>
    <title>Sahaj Technologies - CV Builder</title>
    <script>
        function HTMLtoPDF(){
            var y = document.getElementById("name");
            y.style.display = "none";
            var z = document.getElementById("display");
            z.style.display = "";
            var k = document.getElementById("obj");
            k.style.marginTop = "-50px";
            var x = document.getElementById("printCV");
            x.style.display = "none";
            window.print();
        }
    </script>
</head>
<body>

<!-- main CV Template -->
    <div class="container py-3" id="cv-template">
        <div class="row">

            <div class="col-md-4 py-5 background">
             <!-- first col ->

                <-- profile image -->
                <div class="text-center profile-img">
                    <?php
                    if ($col14) {
                        echo '<img src="../../JobSeeker Section/Profile Page/upload/'.$col14.' " " class="img-fluid myimg" alt="..." style="height: 230px; width: 240px">';
                    }
                    else {
                        echo '<img src="./images/person-icon4.png" class="card-img-top preview-img-res" alt="..."
                    style="height: 256px; border-radius: 160px; cursor: pointer;">';
                    }
                    ?>

                    <div id="display" style="display: none">
                    <h3 class="text-center" style="color: black;"><b>
                        <?php echo $col1; ?>
                    </b></h1>
                    <h4 class="text-center" style="color: black;">
                    <?php echo $col2; ?></h4>
                    </div>

                </div>

                <div class="first_col">
                        <!-- contact -->
                    <div class="container" id="contact_container">
                        <p class="contact_header" style="font-size: 35px; font-weight: 600; padding-top: 40px">CONTACT</p>
                        <p class="email"><i class="fas fa-envelope"></i> &nbsp; <?php echo $col9; ?></p>
                        <p class="js_contact"><i class="fas fa-mobile-alt"></i> &nbsp; <?php echo $col8; ?></p>
                        <p class="address"><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo $col13.', '.$col12.', '.$col10.', '.$col11; ?></p>
                        <?php
                            
                        ?>

                        <p>
                            <?php
                                $counter = 0;
                                $onlineprofile = explode(",", $col23);
                                foreach($onlineprofile as $val){
                                    if((strpos($val, "linkedin"))>0){
                                        if($counter == 0){
                                            echo "<a href='$val' target='_blank'><i class='fab fa-linkedin-in'></i>&nbsp; &nbsp;".$val."</a>";
                                        }
                                        else{
                                            echo "<br><a href='$val' target='_blank'><i class='fab fa-linkedin-in'></i>&nbsp; &nbsp;".$val."</a>";
                                        }
                                    }  
                            
                                    if((strpos($val, "facebook"))>0){
                                        echo "<br><a href='$val' target='_blank'><i class='fab fa-facebook'></i>&nbsp; &nbsp;".$val."</a>";
                                    }   
                                    $counter = $counter + 1; 
                                }
                            ?>

                            <p><a href="www.facebook.com" class="fb-link"> <i class="fab fa-github"></i> &nbsp; <?php echo $col24; ?></a></p>
                        </p>
                    </div>

                    <!-- job seeker skills -->
                    <div class="container mt-5" id="skills_container"> 
                        <p class="skills_header" style="font-size: 35px; font-weight: 600;">SKILLS</p>
                        <ul style="font-size: 22px;">
                            
                            <?php
                                 $skills= explode(",",$col18);
                                 $counter=0;
                                 foreach($skills as $val){
                                    if(!($counter==count($skills)-1))
                                    {
                                        echo "<li>$val</li>";
                                    }
                                    $counter=$counter+1;
                                 } 
                            ?>

                        </ul>
                    </div>

                    <!-- Languages -->
                    <div class="container mt-5" id="lang_container"> 
                        <p class="lang_header" style="font-size: 35px; font-weight: 600;">LANGUAGES</p>
                        <ul style="font-size: 22px;">
                            
                            <?php
                                 $lang= explode(",",$col3);
                                 foreach($lang as $val){
                                        echo "<li>$val</li>";
                                    }
                            ?>
                                 
                        </ul>
                    </div>

                </div>
                
            </div>


            <div class="col-md-8 py-5">
                <!-- second col  -->

              <div id="name">
              <div class="container pt-4 pb-4" style="background-color: rgb(240, 240, 240);">
                    <h1 class="text-center" style="color: black;"><b>
                        <?php echo $col1; ?>
                    </b></h1>
                <h3 class="text-center" style="color: black;">
                    <?php echo $col2; ?>
                </h3>
                </div>
              </div>

                <!-- Objective card -->
                <div class="card" id="obj" style="margin-top: 80px">
                    <div class="card-header background">
                        <h3><b>Objective</b></h3>
                    </div>
                    <div class="card-body p-4" style="color: black; font-size: 22px;">
                        <p style="font-weight: 500; font-family: 'Ubuntu','sans-serif';">
                            <?php echo $col17; ?>
                        </p>
                    </div>
                </div>

                <!-- work experience  -->
                <div class="card mt-4">
                    <div class="card-header background">
                        <h3><b>Work Experience</b></h3>
                    </div>
                    <div class="card-body p-5" style="color: black;">
                        
                        <table class="w-100" style="border: 0px;  font-size: 20px;">
                                    <tr style="padding: 20px;">
                                        <td><p style="font-weight: 500; font-family: 'Ubuntu','sans-serif';"><b>Years of Experience :</b></p></td>
                                        <td> <?php echo $col28; ?> </td>
                                    </tr>

                                    <tr>
                                        <td><p style="font-weight: 500; font-family: 'Ubuntu','sans-serif';"><b>Company names : </b></p></td>
                                        <td>
                                            <?php
                                            $companies= explode(",",$col29);
                                            foreach($companies as $val){
                                                    echo "$val<br>";
                                                }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><p style="font-weight: 500; font-family: 'Ubuntu','sans-serif';"><b>Position in Company :</b></p></td>
                                        <td>
                                        <?php
                                            $pos= explode(",",$col30);
                                            foreach($pos as $val){
                                                    echo "$val<br>";
                                                }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><p style="font-weight: 500; font-family: 'Ubuntu','sans-serif';"><b>Job Type :</b></p></td>
                                        <td><?php echo $col31; ?></td>
                                    </tr>
                                    
                                    <tr>
                                    <td><p style="font-weight: 500; font-family: 'Ubuntu','sans-serif';"><b>Employement Type :</b></p></td>
                                        <td><?php echo $col32; ?></td>
                                    </tr>

                        </table>
                        
                    </div>
                </div>

                <!-- academic qualification  -->
                <div class="card mt-4">
                    <div class="card-header background">
                        <h3><b>Academic Qualification</b></h3>
                    </div>
                    <div class="card-body p-5" style="font-size: 20px; color: black;">

                    <?php
                                 $edu= explode(",", $col20);
                                 foreach($edu as $val){
                                        echo "<li>$val</li>";
                                    }
                            ?>


                    </div>
                </div>

                <!-- projects  -->
                <div class="card mt-4">
                    <div class="card-header background">
                        <h3><b>My Projects</b></h3>
                    </div>
                    <div class="card-body p-5" style="font-size: 20px; color: black;">

                    <?php
                                 $projects = explode(",", $col21);
                                 foreach($projects as $val){
                                        echo "$val<br>";
                                    }
                            ?>


                    </div>
                </div>

                 <!-- other achievements  -->
                 <div class="card mt-4">
                    <div class="card-header background">
                        <h3><b>Other Achievements</b></h3>
                    </div>
                    <div class="card-body p-5" style="font-size: 20px; color: black;">

                    <?php
                                 if($col25 != ""){
                                     echo $col25."<br>";
                                 }

                                 if($col26 != ""){
                                    echo $col26."<br>";
                                }

                                if($col27 != ""){
                                    echo $col27;
                                }
                            ?>


                    </div>
                </div>

            </div>

            <div class="container mt-5 text-center">
            <!-- <form action="print.php" method="post"> -->
                <button id="printCV" style="padding: 10px; font-size: 20px; border-radius: 6px" onclick="HTMLtoPDF()"> <b>Print CV</b>
                </button>
            <!-- </form> -->
            </div>
        </div>
    </div>

</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>
</html>