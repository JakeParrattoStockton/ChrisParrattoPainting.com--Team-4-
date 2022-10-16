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

$email = $_POST["Email"];
$pword = $_POST["password"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$phonenumber = $_POST["phonenumber"];
$admin = $_POST["admin"]

$sql = "INSERT INTO Account (password, first_name, last_name, email, phone_number, admin) VALUES ( '$pword','$fname', '$lname', '$email', '$phonenumber', '$admin')";

if ($conn->query($sql) === TRUE) {
    echo "Sign up successfully!";
    header("location: account.html");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




$conn->close();


?>

</body>
</html>