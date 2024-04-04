<?php
include 'dbcon.php';

$msg = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if (!empty($name) && !empty($username) && !empty($email) && !empty($mobile) && !empty($password) && !empty($cpassword)) {

        if ($password == $cpassword) {

            $checkUsernameQuery = "SELECT * FROM registration WHERE username = '$username'";
            $checkUsernameDbResult = mysqli_query($conn, $checkUsernameQuery);
            if (!mysqli_num_rows($checkUsernameDbResult) > 0) {

                $checkEmailQuery = "SELECT * FROM registration WHERE email = '$email'";
                $checkEmailDbResult = mysqli_query($conn, $checkEmailQuery);
                if (!mysqli_num_rows($checkEmailDbResult) > 0) {

                    $insertQuery = "INSERT INTO registration(name, username, email, mobile, password) 
                    VALUES('$name', '$username', '$email', '$mobile', '$hashPassword')";
                    $insertQueryResult = mysqli_query($conn, $insertQuery);

                    if ($insertQueryResult) {
                        $msg = '<div class="alert alert-success alert-dismissible text-center fade show" role="alert">
                                <strong>Registerd!</strong>  
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                    } else {
                        $msg = '<div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                        <strong>Registration Failed!</strong> Please Try Again!  
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                } else {
                    $msg = '<div class="alert alert-warning alert-dismissible text-center fade show" role="alert">
                    <strong>email Alrady Exist!</strong> Try Anothor email... 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
            } else {
                $msg = '<div class="alert alert-warning alert-dismissible text-center fade show" role="alert">
                    <strong>username Alrady Exist!</strong> Try Anothor username... 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                    <strong>Password Not match!</strong> Try again letter... 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                    <strong>Please fill out all feilds!</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    

    <!-- Start navbar -->
    <section class="font-size-change-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container navbar-collapse-style">
                <a class="navbar-brand" href=""><span class="text-danger">L</span>ogin <span class="text-danger">S</span>ystem</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 unorder-list">
                        <li class="nav-item">
                            <a class="nav-link register-hover" aria-current="page" href="register.php">Regster</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link register-hover" aria-current="page" href="login.php">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link register-hover text-danger" aria-current="page" href="logout.php">logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- End navbar -->


    <!-- form start  -->

    <div class="container container-padding">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-4 col-lg-4 col-12">

                <h1 class="text-center py-3"> Registration User</h1>
                <?= $msg ?>
                <form method="POST">
                    <div class="mb-3">
                        <!-- <label class="form-label">Name:</label> -->
                        <input type="text" class="form-control input-border-radius-register-login" name="name" placeholder="Enter Your Name" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <!-- <label class="form-label">Username</label> -->
                        <input type="text" class="form-control input-border-radius-register-login" name="username" placeholder="Enter Your Username" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <!-- <label class="form-label">Email address:</label> -->
                        <input type="email" class="form-control input-border-radius-register-login" name="email" placeholder="Enter Your Email" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <!-- <label class="form-label">Phone Number:</label> -->
                        <input type="tel" class="form-control input-border-radius-register-login" name="mobile" placeholder="Enter Your Mobile" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <!-- <label class="form-label">Password:</label> -->
                        <input type="password" class="form-control input-border-radius-register-login" name="password" placeholder="Enter password" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <!-- <label class="form-label"> Confirm Password:</label> -->
                        <input type="password" class="form-control input-border-radius-register-login" name="cpassword" placeholder="Enter Confirm password" autocomplete="off">
                    </div>
                    <div class="d-grid modal-button-align">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- form End  -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>