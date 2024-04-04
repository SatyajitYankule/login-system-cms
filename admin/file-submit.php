<?php
include "dbcon.php";


if (isset($_POST['submit'])) {
    // get data in form ->
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $file =  $_FILES['images'];

    // file detailes
    $file_name = $file['name'];
    $tmp_name = $file['tmp_name'];
    $file_error = $file['error'];

    // chek jpg, png, jpeg file extansions here ->
    $file_extension = explode(".", $file_name);
    $file_extension_check = strtolower(end($file_extension));
    //    print_r($file_extension_check);
    $valid_file_extension = array("jpg", "png", "jpeg");
    if ($file_error == 0) {
        if (in_array($file_extension_check, $valid_file_extension)) {

            // upload files in folder code
            $destination_file = "../upload/" . $file_name;
            if (move_uploaded_file($tmp_name, $destination_file)) {
                // insert data in database
                $insertQuery = "INSERT INTO users(name, email, mobile, age, address, file) VALUES('$name', '$email', '$mobile', '$age', '$address', '$destination_file')";
                $queryInsert = mysqli_query($conn, $insertQuery);
                if ($queryInsert) {
?>
                    <script>
                        alert("Data Inserted successfully");
                        window.location = "index.php";
                    </script>
                <?php
                } else {
                    echo "failed to insert data";
                ?>
                    <script>
                        alert("failed to insert data ! plese try again...");
                        window.location = "index.php";
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("File uploding failed !...");
                    window.location = "index.php";
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("Extension is not valid ! Please try again...");
                window.location = "index.php";
            </script>
<?php
        }
    }
}

?>