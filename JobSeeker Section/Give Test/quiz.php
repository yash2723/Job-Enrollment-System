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
    <link rel="stylesheet" href="index.css">
    
    <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

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
                <li><a style="color: #6c63ff;" class="dropdown-item" href="../Profile Page/index.php">Profile</a></li>
                <li><a class="dropdown-item" href="../Resume Page/index.php">My Resume</a>
                </li>
                <li><a class="dropdown-item" href="../Find Jobs/index.php">Find Job</a>
                </li>
                <li><a class="dropdown-item" href="../Saved Jobs/index.php">Saved Jobs</a>
                </li>
                <li><a class="dropdown-item" href="../Applied Jobs/index.php">Applied
                    Jobs</a></li>
                <li><a class="dropdown-item" href="../Job Alerts/index.php">Job Alerts</a>
                </li>
                <li><a class="dropdown-item" href="../Change Password/index.php">Change
                    Password</a></li>
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

    <div class="container" id="main">
            <div class="logo">
                <img src="https://previews.123rf.com/images/devidgrutz/devidgrutz1904/devidgrutz190400035/120023235-quiz-logo-with-speech-bubble-symbols-concept-of-questionnaire-show-sing-quiz-button-question-competi.jpg" alt="quiz_logo">
                <div class="logo_slogan">
                    Online Technical Test
                </div>
            </div>
            <div class="features_main">
                <div class="quiz_title">
                    <p>Welcome To Online Technical Test</p>
                </div>
                <div class="features">
                    <h3>Features:</h3>
                    <div class="list_features">
                        <ul>
                            <li>15 Questions </li>
                            <li>1 Question At a Time</li>
                            <li>Get Result Any Time</li>
                        </ul>
                    </div>
                </div>
                <form action="jobtest.php?pageno=1" method="POST">
                <input type="submit" value="Start Test" class="btn btn-success" id="start_quiz">
                </div>
                </form>
            </div>
    </div>
</body>
</html>