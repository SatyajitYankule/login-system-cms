<?php
$DBHOST = "localhost";
$DBUSER = "root";
$DBPASS = "";
$DBNAME = "portfolio_login_system";

$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if(!$conn){
    echo "login failed";
}

?>