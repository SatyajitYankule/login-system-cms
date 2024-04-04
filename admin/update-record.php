<?php
include "dbcon.php";

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    // get data in form ->
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);


    // insert data in database
    $updateQuery = "UPDATE users SET name = '$name', email = '$email', mobile = '$mobile', age = '$age', address = '$address' WHERE id = '$id'";
    $queryUpdate = mysqli_query($conn, $updateQuery);
    if ($queryUpdate) {
        header("location:index.php");
    } else {
?>
        <script>
            alert("Data uploding failed !...");
            window.location = "index.php";
        </script>
<?php
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update And Delete</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                            <a class="nav-link register-hover" aria-current="page" href="index.php">Home</a>
                        </li>
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



    <?php
    // include "dbcon.php";

    // $id = $_GET['id'];

    $SelectId = "SELECT * FROM users WHERE id = '$id'";
    $selecIdResult = mysqli_query($conn, $SelectId);
    $result = mysqli_fetch_assoc($selecIdResult);


    ?>


    <div class="container">
        <!-- Button trigger modal -->
        <h1 class="text-center text-uppercase pt-5"> Student list</h1>
        <div class="row justify-content-center">
            <div class=" col-lg-4 col-md-4 col-sm-4 col-12">


                <!-- start form -->
                <form method="POST" enctype="multipart/form-data">
                    <!-- full name -->
                    <div class="mb-2">
                        <label for="full-name"></label>
                        <input type="text" name="name" class="form-control input-border-radius" value="<?php echo $result['name']; ?>" id="full-name" placeholder="Full Name" autocomplete="off" required>
                    </div>

                    <!-- Email -->
                    <div class="my-2">
                        <label for="email"></label>
                        <input type="email" name="email" class="form-control input-border-radius" value="<?php echo $result['email']; ?>" id="email" placeholder="Email Address" autocomplete="off" required>
                    </div>

                    <!-- contact number -->
                    <div class="my-2">
                        <label for="age"></label>
                        <input type="number" name="age" class="form-control input-border-radius" value="<?php echo $result['age']; ?>" id="age" placeholder="Age" autocomplete="off" required>
                    </div>

                    <!-- contact number -->
                    <div class="my-2">
                        <label for="mobile"></label>
                        <input type="tel" name="mobile" class="form-control input-border-radius" value="<?php echo $result['mobile']; ?>" id="mobile" placeholder="Contact No" autocomplete="off" required>
                    </div>

                    <!-- Address -->
                    <div class="my-2">
                        <label for="address"></label>
                        <input type="text" name="address" class="form-control input-border-radius" value="<?php echo $result['address']; ?>" id="address" placeholder="Address" autocomplete="off" required>
                    </div>


                    <!--  Modal button -->
                    <div class="d-grid modal-button-align">
                        <button type="submit" name="submit" class="btn btn-primary input-border-radius">Update</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
    </div>
    <!-- End model section -->








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>