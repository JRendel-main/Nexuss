<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
  <center>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Welcome to Nexus Link</h2>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-center">I'm a Tutee</h5>
                    <p class="card-text text-center">Sign up here to become a tutor on Nexus Link</p>
                    <a href="tutee/register.php" class="btn btn-primary d-block mx-auto w-50">Sign Up</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">I'm a Tutor</h5>
                    <p class="card-text text-center">Sign up here to become a tutee on Nexus Link</p>
                    <a href="tutor/register.php" class="btn btn-primary d-block mx-auto w-50">Sign Up</a>
                </div>
            </div>
            <p class="mt-4 text-center">Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</div>
      </center>

</body>
</html>