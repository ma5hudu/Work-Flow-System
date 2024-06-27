<?php
//set up the database

$conn = new mysqli("localhost", "root", "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = file_get_contents('sql/schema.sql');

if ($conn->multi_query($sql) === TRUE) {
    echo "Database and tables created successfully";
} else {
    echo "Error creating database and tables: " . $conn->error;
}

$conn->close();

