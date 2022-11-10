<html>
<body>

<?php

session_start();

$ret = $_SESSION['row'];

$servername = "127.0.0.1";
$username = "root";
$password = "mysql";
$dbname = "chrisppaint";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $ret['account_id'];
$date = $_POST["date"];
$address = $_POST["address"];
$description = $_POST["job-d"];
$cost = $_POST["cost"];

$sql = "INSERT INTO job (account_id, status, StartDate, Address, Description, Cost) VALUES ('$id', '1', '$date', '$address', '$description', '$cost')";

if ($conn->query($sql) === TRUE) {
    echo "Sign up successfully!";
    header("location: account.php");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




$conn->close();


?>
</body>
</html> 