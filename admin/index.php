<?php
include 'dbcon.php';
session_start();


if (!isset($_SESSION['name'])) {
    header("location:login.php");
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

    <!-- Student records show table format  -->

    <div class="container">
        <!-- Button trigger modal -->
        <h1 class="text-center text-capitalize pt-5">Adjust Student list By <u><i> <?php echo $_SESSION['name']; ?> </i></u> </h1>

        <div class="modal-button-align">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Students
            </button>
        </div>

        <div class="row justify-content-center">
            <div class="row row-cols-1 row-cols-md-4 g-4">


                <table class="table table-bordered ">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Full Name </th>
                            <th scope="col">Email </th>
                            <th scope="col">Mobile No.</th>
                            <th scope="col">Age</th>
                            <th scope="col">Address</th>
                            <th scope="col">Image</th>
                            <th colspan="2" class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php
                        $selectUpdateQuery = "SELECT * FROM users";
                        $UpdateQueryResult = mysqli_query($conn, $selectUpdateQuery);
                        if (mysqli_num_rows($UpdateQueryResult) > 0) {
                            while ($rows = mysqli_fetch_assoc($UpdateQueryResult)) {
                        ?>


                                <tr>
                                    <th scope="row"><?php echo $rows['id']; ?></th>
                                    <td><?php echo $rows['name']; ?></td>
                                    <td><?php echo $rows['email']; ?></td>
                                    <td><?php echo $rows['mobile']; ?></td>
                                    <td><?php echo $rows['age']; ?></td>
                                    <td><?php echo $rows['address']; ?></td>
                                    <td class="text-center"><img src="<?php echo $rows['file']; ?>" width="150" height="100"></td>

                                    <td class="text-center">
                                        <div class="modal-button-align">
                                            <a href="update-record.php?id=<?php echo $rows['id']; ?>" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <a href="delete-record.php?id=<?php echo $rows['id']; ?>" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Add New students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- start form -->
                    <form action="file-submit.php" method="POST" enctype="multipart/form-data">
                        <!-- full name -->
                        <div class="mb-2">
                            <label for="full-name"></label>
                            <input type="text" name="name" class="form-control input-border-radius" id="full-name" placeholder="Full Name" autocomplete="off" required>
                        </div>

                        <!-- Email -->
                        <div class="my-2">
                            <label for="email"></label>
                            <input type="email" name="email" class="form-control input-border-radius" id="email" placeholder="Email Address" autocomplete="off" required>
                        </div>

                        <!-- contact number -->
                        <div class="my-2">
                            <label for="age"></label>
                            <input type="number" name="age" class="form-control input-border-radius" id="age" placeholder="Age" autocomplete="off" required>
                        </div>

                        <!-- contact number -->
                        <div class="my-2">
                            <label for="mobile"></label>
                            <input type="tel" name="mobile" class="form-control input-border-radius" id="mobile" placeholder="Contact No" autocomplete="off" required>
                        </div>

                        <!-- Address -->
                        <div class="my-2">
                            <label for="address"></label>
                            <input type="text" name="address" class="form-control input-border-radius" id="address" placeholder="Address" autocomplete="off" required>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image"></label>
                            <input type="file" name="images" class="form-control input-border-radius" id="image" autocomplete="off" required>
                        </div>


                        <!--  Modal button -->
                        <div class="modal-footer modal-button-align">
                            <button type="button" class="btn btn-secondary input-border-radius" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary input-border-radius">Save</button>
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