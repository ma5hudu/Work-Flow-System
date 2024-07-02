<?php

// //connect to database
// $conn = mysqli_connect("localhost", "root", "", "work_flow_system");

// //checks if the database connection failed, and print error message if it failed
// if(mysqli_connect_errno()){
//     echo "MySQL database connection failed: " . mysqli_connect_error();
// }

// /**
//  * check if the form with post method was submitted after clicking the saveBtn button
//  * get values from the form fields (firstname, lastname and date of birth) from the the post 
//  * request and store them in corresponding variables 
//  */
// if(isset($_POST["saveBtn"])){
//     $first_name = $_POST["firstName"];
//     $last_name = $_POST["lastName"];
//     $date_of_birth = $_POST["dateOfBirth"];


// //Insert values from the form into customer_details tables in the database.     
//     if(mysqli_query($conn, "INSERT INTO customer_details(first_name, last_name, date_of_birth) VALUES('$first_name', '$last_name', $date_of_birth)")){
//        echo "<script>alert('Customer information inserted successfully');</script>";
//     }else{
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }