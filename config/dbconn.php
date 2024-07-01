<?php

$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "khollect";

//creating databse connection
$con = mysqli_connect($host, $username, $password, $database);

//check the database connection
if(!$con)
{
    die("connection failed: ". mysqli_connect_error());

}

?>