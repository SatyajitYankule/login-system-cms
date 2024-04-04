<?php
include 'admin/dbcon.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student List</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- lightbox library css file include-->
    <link href="lightbox.css" rel="stylesheet" />
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

                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- End navbar -->







    <!-- Start card section -->


    <div class="container">
        <!-- Button trigger modal -->
        <h1 class="text-center text-uppercase py-5"> Student list </h1>

        <!-- <div class="modal-button-align">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Students
            </button>
        </div> -->

        <div class="row justify-content-center">
            <div class="row row-cols-1 row-cols-md-4 g-4">

                <?php
                $selectDataQuery = "SELECT * FROM users";
                $showDataselectQuery = mysqli_query($conn, $selectDataQuery);
                if (mysqli_num_rows($showDataselectQuery) > 0) {
                    while ($result = mysqli_fetch_assoc($showDataselectQuery)) {
                ?>

                        <div class="col">
                            <div class="card">

                                <a href="./upload/<?php echo $result['file']; ?>" data-lightbox="models" data-title="Students images">
                                    <img src="./upload/<?php echo $result['file']; ?>" class="card-img-top" alt="image show">
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $result['name']; ?></h5>
                                    <p class="card-text">Email:<?php echo $result['email']; ?> </p>
                                    <p class="card-text">Mobile No: <?php echo $result['mobile']; ?></p>
                                    <p class="card-text">Age: <?php echo $result['age']; ?></p>
                                    <p class="card-text">Address: <?php echo $result['address']; ?></p>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Card section End  -->


    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------- -->



    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>


    <!-- lightbox library -->

    <script src="lightbox-plus-jquery.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>