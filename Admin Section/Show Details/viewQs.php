<?php
session_start();

if (!(isset($_SESSION['admin-mail']))) {
  header("Location: ../../Sign-in/sign-in.php");
}

?>
<!doctype html>
<html>
<head>
	<title> View Aptitude Test Questions </title>
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
        <link href="..\test_table_style.css" rel="stylesheet">
</head>
<body>

  <!-- navigation bar -->
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
<?php
  $servername = 'localhost';
      $username = 'root';
      $dbase = 'job enrollment system';
      $pass = '';
      // Create connection
      $conn = mysqli_connect($servername, $username, $pass, $dbase);
      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }
?>
  <!-- main section -->
  <div class="container-fluid">
    <div class="fonts-google">
        <form class="form-vertical" role="form" name="showResultform">
            <h2>View Test Questions</h2><br>
            <div class="form-group" align="center" method="GET" action="viewAptitudeQA.php">
              
            
              <div class="form-group">
                <p style="font-weight: bold;">&nbsp; Select the Job Name : </p>

              <div class="col-sm-9" >
               
  
                  <select class="form-control" name="select_job" id="select_job">
                  <?php      
                    $sql = "SELECT * FROM `job enrollment system`.`enrollment_test_details`";

                    $result = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $ENT_name = $row['ENT_Type'];

                      echo "<option style='font-size: 18px;' value='".$ENT_name."'>".$ENT_name."</option>";

                    }

                  ?>
                  <select>

                </div><br>
              
          </div>
          <button type="submit" class="btn btn-lg btn-primary" name="submit">Check</button><br><br>
          <table align="center" class="table" id="table-design">
        <thead>
          <tr>
            <th>Sr.<br>No.</th>
            <th>Questions</th>
            <th></th>
          </tr>
        </thead>
      <?php


      if(isset($_GET['submit'])){
       $option_value = $_REQUEST['select_job'];
      // if($option_value == "job1"){
      $sql = "SELECT * FROM `test questions`.`$option_value`";
      //Dynamic Table Query
    //$sql = "CREATE TABLE IF NOT EXISTS front_end_developer("."Q_id INT NOT NULL AUTO_INCREMENT, "."QUEST VARCHAR(100) NOT NULL, "."OPT1 VARCHAR(30) NOT NULL, "."OPT2 VARCHAR(30) NOT NULL, "."OPT3 VARCHAR(30) NOT NULL, "."OPT4 VARHCAR(30) NOT NULL, "."COR_OPT VARCHAR(30) NOT NULL"."PRIMARY KEY ( Q_id));";
      $retval = mysqli_query($conn,$sql);
      

    //Test questions display table 
    $count = 0;
    while($row = mysqli_fetch_array($retval)){
      $count++;
      $result = $row['QUEST'];
      $opt1 = $row['OPT1'];
      $opt2 = $row['OPT2'];
      $opt3 = $row['OPT3'];
      $opt4 = $row['OPT4'];
      $opt5 = $row['CORR_OPT'];
      $table="<div class='form-group' align='center'>";
      $table.="<tbody>"."<tr align='center'>"."<td>$count</td>"."<td>$result</td>"."<td><div class='dropdown'>
              <a class='btn btn-secondary dropdown-toggle' href='#'' role='button' id='dropdownMenuLink'
                data-bs-toggle='dropdown' aria-expanded='false'>
                View Options
              </a><ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                <li><a class='dropdown-item'>1. $opt1</a></li>
                <li><a class='dropdown-item'>2. $opt2</a></li>
                <li><a class='dropdown-item'>3. $opt3</a></li>
                <li><a class='dropdown-item'>4. $opt4</a></li><br>
                Correct Option:
                <li><a class='dropdown-item'>$opt5</a></li>
              </ul>
            </div></td>";
      $table.="</tr>"."</tbody>"."</div>";
      echo $table;
    }
  }

?>
</table>
      
    
    
    
      </div>
</div>
</form>
</div>


</body>
</html>