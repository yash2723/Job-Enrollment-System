<!doctype html>
<html>
<head>
	<title> Check Result of Tests </title>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> 
		<link href="ShowResults.css" rel="stylesheet">
</head>
<body>
	<?php
		$servername = 'localhost';
		$username = 'root';
		$dbase = 'searchbar';
		$pass = '';
		// Create connection
		$conn = new mysqli($servername, $username, $pass, $dbase);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
?>

	<!-- navigation bar -->
	
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="C:\Users\Devershi\Downloads\logo.jpg" alt="Website Logo">
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
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Profile</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">My Resume</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Find Job</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Saved Jobs</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Applied Jobs</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Job Alerts</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Change Password</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">

            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                For Employer
              </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Manage Profile</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Manage Jobs</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Manage Questions</a></li>
                <li><a class="dropdown-item" href="Sign-in/sign-in.php">Show Details</a></li>
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

      </div>
    </div>
  </nav>
	
	<!-- main section -->
	<div class="container fonts-google">
            <form class="form-vertical" role="form" name="showResultform" method="GET" action="ShowResultsPage.php">
                <h2>Your Result</h2><br>
                <div class="form-group" align="center">
                	<p>&nbsp; Name &nbsp;:
                		<div class="col-sm-9">
                       		 <input type="text" name="js_name"  class="form-control">
                   	 	</div>
                   	 </p>
                </div>
                 <div class="form-group" align="center">
                	<p>&nbsp; ID &nbsp;:
                		<div class="col-sm-9">
                       		 <input type="text" name="js_id"  class="form-control">
                   	 	</div>
                   	 </p>
                </div><br><center>
                <button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
                </center><br>

               <div class="table-responsive">
				 <table align="center" class="table">
					<thead>
						<tr>
							<th>Personality Test</th>
							<th>Aptitude Test</th>
							<th>Total</th>
						</tr>
					</thead>
					<?php
                if(isset($_GET['submit'])){
	$name = $_GET['js_name'];
	$id = $_GET['js_id'];
	$sql=mysqli_query($conn,"SELECT * FROM js_test_results WHERE JS_id = '$id' AND JS_name = '$name'");
	$row = mysqli_fetch_array($sql);
		$ptest = $row['JS_ptest'];
		$atest = $row['JS_atest'];
		$total = $row['JS_total'];
		//$table="<div class='table-responsive'>"."<table align='center' class='table'>";
		$table="<tbody>"."<tr align='center'>"."<td>$ptest</td>"."<td>$atest</td>"."<td>$total</td>";
		$table.="</tbody>"."</tr>"."</table"."</div";
		echo $table;
}
$conn->close();
?>
				</table>
			   </div> 
			</form>
		</div>
		
 		</body>
</html>