<?php
  session_start();

  if (!(isset($_SESSION['admin-mail']))) {
      header("Location: ../../Sign-in/sign-in.php");
  }
  
?>


<!DOCTYPE HTML>
<html>

<head>
  <title> Managing Jobs - Sahaj Technologies </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- Optional theme -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>




  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
  <link href="AddEditStyles.css" rel="stylesheet">


</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php">
        <img src="../../images/web-logo1.png" alt="Website logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../AdminHomePage.php">Home</a>
          </li>

          <li class="nav-item">

            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                For Employer
              </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="../Manage Jobs/Manage_Job.php">Manage Jobs</a></li>
                <li><a class="dropdown-item" href="../Schedule Test/scheduletest.php">Schedule Test</a></li>
                <li><a class="dropdown-item" href="../Manage Questions/AddQ2.php">Manage Questions</a></li>
                <li><a class="dropdown-item" href="../Show Details/ShowDetails.php">Show Details</a></li>
              </ul>
            </div>

          </li>

          <li class="nav-item">
            <a class="nav-link" href="../../company_profiles/company_profile.html">About</a>
          </li>

          <li class="nav-item">

            <a class="nav-link btn btn-primary login-btn" href="../../JobSeeker Section/Logout/logout.php">
              <i class="fas fa-lock"></i>
              Log Out
            </a>

          </li>

        </ul>

      </div>
    </div>
  </nav>


  <!-- HTML form for inserting, deleting, or updating data -->

  <div class="container">
    <div class="card fonts-google">
      <div class="card-body">
        <form class="form-vertical" role="form" name="addingForm" method="POST" action="linking.php">
          <h2 style="margin-bottom: 0px;">Manage Jobs</h2><br>

          <div class="form-group" align="center">
            <h1 align="center" style="font-size: 22px; font-weight: bold; margin-bottom: 20px;">&nbsp; Select Operation:
            </h1>
            <select style="width: 160px" name="job_operation" id="job_operation">
              <option value="add_job" name="add_job">Add Job</option>
              <option name="delete_job" id="delete_job" value="delete_job">Delete Job</option>
              <option value="update_job" name="update_job">Update Job</option>
            </select>
          </div>

          <!-- Input details -->
          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Job ID : </p>
            <div class="col-sm-9">
              <input type="text" name="jid" id="jid" placeholder="Job ID" class="form-control"
                onkeyup="GetDetail(this.value)" value="">
            </div>



          </div>



          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Job Name : </p>
            <div class="col-sm-9">
              <select class="form-control" name="select_job" id="select_job">
                <option value="Front End Developer">Front End Developer</option>
                <option value="Back End Developer">Back End Developer</option>
                <option value="Full Stack Developer">Full Stack Developer</option>
                <option value="Graphics Designer">Graphics Designer</option>
                <option value="Data Analyst">Data Analyst</option>
                <option value="Digital Marketer">Digital Marketer</option>
                <option value="Content Writer">Content Writer</option>
                <option value="Software Engineer">Software Engineer</option>
                <option value="Electrical Engineer">Electrical Engineer</option>
                <option value="Electronics And Communication Engineer">Electronics and Communications Engineer</option>
                <option value="Photo-Video Editor">Photo-Video Editor</option>
                <option value="Social Media Manager">Social Media Manager</option>
                <option value="Master of Business Administration">Master of Business Administration</option>
                <option value="User Experience Designer">User Experience Designer</option>
                <option value="Content Manager">Content Manager</option>
                <option value="Digital Marketing Manager">Digital Marketing Manager</option>
                <option value="SEO Specialist">SEO Specialist</option>
                <option value="Web analytics Specialist">Web analytics Specialist</option>
              </select>
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Job Type : </p>
            <div class="col-sm-9">
              <input type="text" name="jtype" id="jtype" placeholder="Job Type" class="form-control" value="">
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Job Designation: </p>
            <div class="col-sm-9">
              <input type="text" name="jdesig" id="jdesig" placeholder="Job Designation" class="form-control" value="">
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Keyskills Required for Job : </p>
            <div class="col-sm-9">
              <input type="text" name="jskills" id="jskills" placeholder="Key Skills" class="form-control" value="">
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Qualification Required for Job : </p>
            <div class="col-sm-9">
              <input type="text" name="jquali" id="jquali" placeholder="Qualification" class="form-control" value="">
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter Salary of Job : </p>
            <div class="col-sm-9">
              <input type="text" name="jsalary" id="jsalary" placeholder="Salary" class="form-control" value="">
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Minimum Experience Required for Job : </p>
            <div class="col-sm-9">
              <input type="text" name="jexp" id="jexp" placeholder="Experience" class="form-control" value="">
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Place of the Job : </p>
            <div class="col-sm-9">
              <input type="text" name="jplace" id="jplace" placeholder="Place" class="form-control" value="">
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter Total Vacancies : </p>
            <div class="col-sm-9">
              <input type="text" name="jvacancy" id="jvacancy" placeholder="Total Vacancies" class="form-control"
                value="">
            </div>
          </div>


          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter Last Date for Applying the Job : </p>
            <div class="col-sm-9">
              <input type="text" name="l_date" id="l_date" placeholder="YYYY-MM-DD" class="form-control" value="">
              <button type="submit" class="btn btn-primary btn-block" id="btn-submit" name="submit">Submit
                Details</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

  <script>

    // onkeyup event will occur when the user
    // release the key and calls the function
    // assigned to this event
    function GetDetail(str) {
      if (str.length == 0) {


        document.getElementById("jtype").value = "";
        document.getElementById("jdesig").value = "";
        document.getElementById("jskills").value = "";
        document.getElementById("jquali").value = "";
        document.getElementById("jsalary").value = "";
        document.getElementById("jexp").value = "";
        document.getElementById("jplace").value = "";
        document.getElementById("jvacancy").value = "";
        document.getElementById("l_date").value = "";
        return;
      }
      else {

        // Creates a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

          // Defines a function to be called when
          // the readyState property changes
          if (this.readyState == 4 &&
            this.status == 200) {

            // Typical action to be performed
            // when the document is ready
            var myObj = JSON.parse(this.responseText);

            // Returns the response data as a
            // string and store this array in
            // a variable assign the value
            // received to first name input field

            if (myObj[0] == 'Front End Developer') {
              document.getElementById("select_job").selectedIndex = '0';
            }
            if (myObj[0] == 'Back End Developer') {
              document.getElementById("select_job").selectedIndex = '1';
            }
            if (myObj[0] == 'Full Stack Developer') {
              document.getElementById("select_job").selectedIndex = '2';
            }
            if (myObj[0] == 'Graphics Designer') {
              document.getElementById("select_job").selectedIndex = '3';
            }
            if (myObj[0] == 'Data Analyst') {
              document.getElementById("select_job").selectedIndex = '4';
            }
            if (myObj[0] == 'Digital Marketer') {
              document.getElementById("select_job").selectedIndex = '5';
            }
            if (myObj[0] == 'Content Writer') {
              document.getElementById("select_job").selectedIndex = '6';
            }
            if (myObj[0] == 'Software Engineer') {
              document.getElementById("select_job").selectedIndex = '7';
            }
            if (myObj[0] == 'Electrical Engineer') {
              document.getElementById("select_job").selectedIndex = '8';
            }
            if (myObj[0] == 'Electronics And Communication Engineer') {
              document.getElementById("select_job").selectedIndex = '9';
            }
            if (myObj[0] == 'Photo-Video Editor') {
              document.getElementById("select_job").selectedIndex = '10';
            }
            if (myObj[0] == 'Social Media Manager') {
              document.getElementById("select_job").selectedIndex = '11';
            }
            if (myObj[0] == 'Master of Business Adminitration') {
              document.getElementById("select_job").selectedIndex = '12';
            }
            if(myObj[0] == 'User Experience Designer'){
             document.getElementById("select_job").selectedIndex = "13";
            }  
            if(myObj[0] == 'Content Manager'){
             document.getElementById("select_job").selectedIndex = "14";
            }  
            if(myObj[0] == 'Digital Marketing Manager'){
             document.getElementById("select_job").selectedIndex = "15";
            }  
            if(myObj[0] == 'SEO Specialist'){
             document.getElementById("select_job").selectedIndex = "16";
            }  
            if(myObj[0] == 'Web Analytics Specialist'){
             document.getElementById("select_job").selectedIndex = "17";
            }  

            document.getElementById("jtype").value = myObj[1];
            document.getElementById("jdesig").value = myObj[2];
            document.getElementById("jskills").value = myObj[3];
            document.getElementById("jquali").value = myObj[4];
            document.getElementById("jsalary").value = myObj[5];
            document.getElementById("jexp").value = myObj[6];
            document.getElementById("jplace").value = myObj[7];
            document.getElementById("jvacancy").value = myObj[8];
            document.getElementById("l_date").value = myObj[9];
          }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "gfg.php?jid=" + str, true);

        // Sends the request to the server
        xmlhttp.send();
      }
    }
  </script>
  
</body>

</html>