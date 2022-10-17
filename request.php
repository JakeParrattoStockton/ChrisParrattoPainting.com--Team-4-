<html>
<body>

<?php

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "chrisppaint";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$date = $_POST["date"];
$address = $_POST["address"];
$description = $_POST["job-d"];
$cost = $_POST["cost"];

$sql = "INSERT INTO job (StartDate, Address, Descripion, Cost) VALUES ('$date', '$address', '$description', '$cost')";

if ($conn->query($sql) === TRUE) {
    echo "Sign up successfully!";
    header("location: login.html");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




$conn->close();


?>
</body>
</html> 