<?php

$conn = mysqli_connect("localhost", "root", "", "work_flow_system");

if(mysqli_connect_errno()){
    echo "MySQL database connection failed: " . mysqli_connect_error();
}

if(isset($_POST["saveBtn"])){
    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $date_of_birth = $_POST["dateOfBirth"];

    if(mysqli_query($conn, "INSERT INTO customer_details(first_name, last_name, date_of_birth) VALUES('$first_name', '$last_name', $date_of_birth)")){
        echo "Record inserted succesfully";
    }
}