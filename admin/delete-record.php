<?php
include 'dbcon.php';

$id = $_GET['id'];

$deleterecord = "DELETE FROM users WHERE id = '$id'";
$deleterecordresult = mysqli_query($conn, $deleterecord);

if ($deleterecordresult) {
    header("location:index.php");
} else {
?>
    <script>
        alert("Data Deleted failed !...  try again");
        window.location = "show_record.php";
    </script>
<?php
}

?>