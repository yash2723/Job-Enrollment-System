<?php

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server , $username , $password);

if(!$con)
{
    die("Connection to this database failed due to" . mysqli_connect_error());
}
//echo "Success connecting to the db";


$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='Front End Developer' ";
$data = mysqli_query($con,$query);
$front_end_developer = mysqli_num_rows($data);

$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='Back End Developer' ";
$data = mysqli_query($con,$query);
$back_end_developer = mysqli_num_rows($data);

$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='Full Stack Developer' ";
$data = mysqli_query($con,$query);
$full_stack_developer = mysqli_num_rows($data);

$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='Graphics Designer' ";
$data = mysqli_query($con,$query);
$graphics_designer = mysqli_num_rows($data);

$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='Data Analyst' ";
$data = mysqli_query($con,$query);
$data_analyst = mysqli_num_rows($data);

$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='Software Engineer' ";
$data = mysqli_query($con,$query);
$software_engineer = mysqli_num_rows($data);

$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='Digital Marketer' ";
$data = mysqli_query($con,$query);
$digital_marketer = mysqli_num_rows($data);

$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='Content Manager' ";
$data = mysqli_query($con,$query);
$content_manager = mysqli_num_rows($data);

$query = "SELECT * FROM `job enrollment system`.`job_details` WHERE J_Name='User Experience Designer' ";
$data = mysqli_query($con,$query);
$user_experience_designer = mysqli_num_rows($data);







if(isset($_POST['submit-btn'])) {

  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $comment = $_POST['comment'];

  $sql = "INSERT INTO `job enrollment system`.`contact_us` (`Name`, `Email`, `Phone`, `City`, `Comment`) VALUES ('$fname', '$email', '$phone', '$city', '$comment')";

  if($con->query($sql) == true)
  {
    echo '<script>alert("In short time , we will contact you.")</script>';
    //echo "File sucessfully upload";
  }
  else
  {
    echo "Error.Please try again";
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- End Bootstrap CSS -->

  <link rel="stylesheet" href="style.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

  <!-- On scroll Animation -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <script src="script.js"></script>

  <title>Home - Sahaj Technologies</title>

</head>

<body>

  <!-- Navbar Section -->

  <!-- <div class="container"> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="">
        <img src="./images/web-logo1.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="">Home</a>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink"
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
              <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink"
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
            <a class="nav-link" href="company_profiles/company_profile.html">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Sign-in/sign-in.php">
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
  <!-- </div> -->

  <!-- End Navbar Section -->

  <!-- Image Slider -->

  <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">

    <ol class="carousel-indicators">

      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="3"></li>
      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="4"></li>

    </ol>

    <div class="carousel-inner">

      <div class="carousel-item active" data-bs-interval="10000">
        <img src="./images/new-back-img1.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <div class="header">
            Find The Job That Fits Your Life
          </div>
          <h6>
            Find Jobs, Employment & Career Opportunities
          </h6>
          <a href="Sign-in/sign-in.php">LOOKING FOR A JOB?</a>
        </div>
      </div>

      <div class="carousel-item" data-bs-interval="2000">
        <img src="./images/new-back-img2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <div class="header">
            Million Offers Waiting for You !
          </div>
          <h6>
            Find Jobs, Employment & Career Opportunities
          </h6>
          <a href="Sign-in/sign-in.php">LOOKING FOR A JOB?</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="./images/new-back-img3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <div class="header">
            Top Recruiting Website For Professionals
          </div>
          <h6>
            Find Jobs, Employment & Career Opportunities
          </h6>
          <a href="Sign-in/sign-in.php">LOOKING FOR A JOB?</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="./images/new-back-img4.png" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <div class="header">
            The Easiest Way to Get Your New Job
          </div>
          <h6>
            Find Jobs, Employment & Career Opportunities
          </h6>
          <a href="Sign-in/sign-in.php">LOOKING FOR A JOB?</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="./images/new-back-img5.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <div class="header">
            Join us & Explore Thousands of Jobs
          </div>
          <h6>
            Find Jobs, Employment & Career Opportunities
          </h6>
          <a href="Sign-in/sign-in.php">LOOKING FOR A JOB?</a>
        </div>
      </div>

    </div>

    <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>

    <div class="color-layout"></div>

  </div>

  <!-- End Image Slider -->


  <!-- Upper Arrow -->

  <div class="upper-arrow display-none">
    
    <img src="./images/upper-arrow9.png" alt="" onclick="topFunction()" class="upper-arrow">
    
  </div>

  <script>
    var Arrow = document.querySelector('.upper-arrow');

    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
      if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        Arrow.style.display = 'block';
      } else {
        Arrow.style.display = 'none';
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>

  <!--  -->




  <!-- How it works section -->

  <div class="container how-works" data-aos="zoom-in">

    <div class="section-header">
      <h1>How it <span class="animated">Works</span></h1>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

      <div class="col">
        <div class="card h-100">
          <img src="./images/working-account2-preview.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">1) Create Account</h4>
            <p class="card-text">First of all create your account with us and provide basic information. Million offers
              waiting for You ! </p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="./images/working-serach-job3-preview.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">2) Search Jobs</h4>
            <p class="card-text">Then , Find the job that fits your life with Smart Search that allows you to put your
              job title in the smart search box and the best matching Jobs will appear on the top.</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="./images/working-save-money-preview.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">3) Save & Apply</h4>
            <p class="card-text">Then , Save & apply for your best career opportunities And get your new job easily with
              us.</p>
          </div>
        </div>
      </div>

    </div>

  </div>

  <!--  -->


  <!-- All Categories Section -->

  <div class="Categories" data-aos="zoom-in">

    <div class="container">

      <div class="section-header">
        <h1>Browse Jobs By <span class="animated">Category</span></h1>
      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-front-end-developer.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Front End Developer</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($front_end_developer) {
                        echo $front_end_developer;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-back-end-developer.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Back End Developer</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($back_end_developer) {
                        echo $back_end_developer;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-full-stack-developer.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Full Stack Developer</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($full_stack_developer) {
                        echo $full_stack_developer;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-graphics-designer.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Graphics Designer</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($graphics_designer) {
                        echo $graphics_designer;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>  
        </div>

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-data-analyst.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Data Analyst</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($data_analyst) {
                        echo $data_analyst;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-software-developer.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Software Engineer</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($software_engineer) {
                        echo $software_engineer;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-digital-marketer.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Digital Marketer</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($digital_marketer) {
                        echo $digital_marketer;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-content-manager.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Content Manager</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($content_manager) {
                        echo $content_manager;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="Sign-in/sign-in.php">
            <div class="card h-100">
              <img src="./images/category-user-experience-designer.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">User Experience Designer</h5>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  ( 
                    <?php 
                      if ($user_experience_designer) {
                        echo $user_experience_designer;
                      } 
                    ?> 
                  Open Positions)
                </small>
              </div>
            </div>
          </a>
        </div>

      </div>

    </div>

  </div>

  <!--  -->



  <!-- Create account Section -->

  <div class="create-account" data-aos="zoom-in">

    <div class="row row-cols-1 row-cols-md-2 g-4">

      <div class="col first-col">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">I’m an Employer</h2>
            <p class="card-text">Signed in companies are able to post new job offers, searching for candidate ...</p>
            <a href="Sign-in/sign-in.php" class="btn"> <img src="./images/create-account-icon.webp" alt=""> Create Account</a>
          </div>
        </div>
      </div>

      <div class="col second-col">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">I’m a Candidate
            </h2>
            <p class="card-text">Search & apply for your best career opportunities And get your new job easily with us ...</p>
            <a href="Sign-in/sign-in.php" class="btn"> <img src="./images/get-started-icon.png" alt=""> Get Started</a>
          </div>
        </div>
      </div>

    </div>

  </div>

  <!--  -->


  <!-- Job Posted Section -->

  <div class="job-post-section" data-aos="zoom-in">

    <div class="section-header">
      <h1>Featured <span class="animated"> Jobs</span></h1>
    </div>

    <?php

      $query = "SELECT * FROM `job enrollment system`.`job_details` LIMIT 5";
      $data = mysqli_query($con,$query);
      $total = mysqli_num_rows($data);

      if ($total != 0) {                                        
        while ($result = mysqli_fetch_assoc($data)) { 
          
          echo "
              <div class='job-post'>
              <div class='card mb-3'>
                <div class='row g-0'>
                  <div class='col-md-4'>
                    <img class='job-icon' src='JobSeeker Section/Job Details/images/".$result['J_Name'].".png ' alt='...'>
                  </div>
                  <div class='col-md-8'>
                    <div class='card-body'>
                      <h2 class='card-title'>".$result['J_Name']."</h2>
        
                      <a href='Sign-in/sign-in.php'>
                        <div class='save-img'>
                          <i class='far fa-heart save-svg'></i>
                        </div>
                      </a>
        
                      <div class='separator'></div>
        
                      <p class='card-text'>
        
                        <a href=''>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                            class='bi bi-geo-alt-fill' viewBox='0 0 16 16'>
                            <path d='M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z' />
                          </svg>
                          ".$result['J_Place']."
                        </a>
        
                        <a href=''>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                            class='bi bi-bookmarks-fill' viewBox='0 0 16 16'>
                            <path
                              d='M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z' />
                            <path
                              d='M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z' />
                          </svg>
                          ".$result['J_Type']."
                        </a>
        
                        <a href=''>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                            class='bi bi-cash-stack' viewBox='0 0 16 16'>
                            <path d='M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z' />
                            <path
                              d='M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z' />
                          </svg>
                          ".$result['J_Salary']."
                        </a>
        
                      </p>
        
                      <p class='card-text text-muted'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                          class='bi bi-clock-fill' viewBox='0 0 16 16'>
                          <path
                            d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z' />
                        </svg>
                        <small class='text-muted'>Published 3 min ago</small>
                      </p>
        
                      <a href='Sign-in/sign-in.php'><button type='button' class='btn btn-primary view-details'>View Details</button></a>
        
                    </div>
                  </div>
                </div>
              </div>
        
            </div>
          ";
          
        }
      }

    ?>

    <div class="view-more-jobs">
      <a href="Sign-in/sign-in.php">
      <button type="button" class="btn btn-primary btn-lg mx-auto">
        <img src="./images/plus-icon1.png" alt="">
        View More Jobs
      </button>
      </a>
    </div>

  </div>


  <!-- CV Builder -->

  <div class="cv-builder">
    <div class="card text-center">
      <div class="card-body">
        <h2 class="card-title">Create your professional CV online with CV maker</h2>
        <p class="card-text">Create your very own professional CV and download it within 15 minutes.</p>
        <a href="Sign-in/sign-in.php" class="btn btn-primary"><i class="far fa-file"></i>Create your CV</a>
      </div>
    </div>
  </div>

  <!-- End CV Builder -->


  <!-- Contact Us Section -->

  <div class="contact" data-aos="zoom-in">

    <div class="section-header">
      <h1>Get in <span class="animated"> Touch</span></h1>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">

      <div class="col first-col">
        <div class="card">
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">

            <form action="index.php" method="POST" onsubmit="return validateForm()">

              <div class="form-floating mb-3">
                <input type="name" name="fname" class="form-control border-none" id="floatingInput-fname" placeholder="Full Name">
                <label for="floatingInput">Full Name</label>
              </div>

              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control border-none" id="floatingInput-email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>

              <div class="form-floating mb-3">
                <input type="phone" name="phone" class="form-control border-none" id="floatingInput-phone" placeholder="Contact Number">
                <label for="floatingInput">Contact Number</label>
              </div>

              <div class="form-floating mb-3">
                <input type="name" name="city" class="form-control border-none" id="floatingInput-city" placeholder="City">
                <label for="floatingInput" class="form-label">City</label>
              </div>

              <div class="form-floating mb-3">
                <textarea name="comment" class="form-control border-none" placeholder="Leave a comment here" id="floatingTextarea-comment"
                  style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
              </div>

              <div class="col-12 mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Send me notification on Email
                  </label>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" name="submit-btn" class="btn btn-primary">Submit</button>
              </div>

            </form>
          </div>
        </div>
      </div>

      <div class="col second-col">
        <div class="card">
          
          <div class="card-body">
            <h2>
              Contact Info
            </h2>
            <table class="table">

              <tr>
                <td scope="col" class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path
                      d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                  </svg>
                </td>
                <td scope="col">
                Near, 210-11, Apple square, Lajamni Chowk, Alkapuri, Vadodara, Gujarat 392101
                </td>
              </tr>

              <tr>
                <td scope="col" class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-telephone" viewBox="0 0 16 16">
                    <path
                      d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                  </svg>
                </td>
                <td scope="col">
                  +91 9934648823
                </td>
              </tr>

              <tr>
                <td scope="col" class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-headset" viewBox="0 0 16 16">
                    <path
                      d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                  </svg>
                </td>
                <td scope="col">
                  +91 881 346 991
                </td>
              </tr>

              <tr>
                <td scope="col" class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-envelope" viewBox="0 0 16 16">
                    <path
                      d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                  </svg>
                </td>
                <td scope="col">
                  sahajtechnologies.001@gmail.com <br>
                  sahajtechnologies_support@gmail.com
                </td>
              </tr>

            </table>
          </div>
        </div>
      </div>

    </div>

  </div>


  <!-- End Contact Us Section -->



  <!-- Footer -->

  <div class="footer">

    <div class="container">

      <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col about-us">
          <div class="card h-100">
            
            <div class="card-body">

              <div class="card-title">
                <img src="./images/web-logo1.png" alt="">
              </div>

              <p class="card-text">
                <a href="company_profiles/company_profile.html">About Us</a>
                <a href="PrivacyandTC/PrivacyPolicy.html">Privacy Policy</a>
                <a href="PrivacyandTC/T&C.html">Terms and Conditions</a>
                <a href="FAQ/FAQ.html">FAQ's</a>
              </p>

            </div>
            <div class="icons">
              <a href="" class=""><img src="./images/facebook-icon.png" alt=""></a>
              <a href="" class=""><img src="./images/insta.png" alt=""></a>
              <a href="" class=""><img src="./images/tweeter.png" alt=""></a>
            </div>
          </div>
        </div>

        <div class="col for-candidate">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">For Candidates</h2>
              <p class="card-text">
                <a href="Sign-in/sign-in.php">My Profile</a>
                <a href="Sign-in/sign-in.php">My Resume</a>
                <a href="Sign-in/sign-in.php">Jobs Alert</a>
                <a href="Sign-in/sign-in.php">Favourite Jobs</a>
                <a href="Sign-in/sign-in.php">Applied Jobs</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col have-question">
          <div class="card h-100">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h2 class="card-title">Have a Questions?</h2>
              <p class="card-text">
                <img src="./images/location.png" alt="">
              <p class="footer-que-text">
                Near, 210-11, Apple square, Lajamni Chowk, Alkapuri, Vadodara, Gujarat 392101
              </p>
              </p>
              <p class="card-text">
                <img src="./images/email.png" alt="">
              <p class="footer-que-text">
                sahajtechnologies.001@gmail.com
              </p>
              </p>
              <p class="card-text">
                <img src="./images/phone.png" alt="">
              <p class="footer-que-text">
                +91 9934648823
              </p>
              </p>
            </div>
          </div>
        </div>

      </div>

    </div>

    <div class="copyright">
      Copyright ©2021 All rights reserved | This template is made with ❤ by Sahaj Technologies
    </div>

  </div>

  <!-- End Footer -->


  <!-- On Scroll Animation JS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init(
      {
        offset: 200,
        duration: 1300
      }
    );
  </script>

  <!--  -->

  <!-- Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

  <!-- End Bootstrap JS -->

</body>

</html>