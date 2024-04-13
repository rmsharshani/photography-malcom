<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "myweb"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $conn->real_escape_string($_POST['your-name']);
    $email = $conn->real_escape_string($_POST['your-email']);
    $address = $conn->real_escape_string($_POST['your-address']);
    $message = $conn->real_escape_string($_POST['your-message']);
    
   
    $sql = "INSERT INTO contact (name, email, address, message) VALUES ('$name', '$email', '$address', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>