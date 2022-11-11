<html>
<body>

<?php

session_start();

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

$email = $_POST["email"];
$password = $_POST["password"];
$newEmail = $_POST["newEmail"];
$newPhone = $_POST["newPhone"];
$newPass = $_POST["newPass"];

$sql = "UPDATE account SET email = '$newEmail', phone_number = '$newPhone', password = '$newPass' WHERE email = '$email' AND password = '$password'";

if ($conn->query($sql) === TRUE) {
    echo "Modify complete!";
    header("location: account.php");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
</body>
</html>