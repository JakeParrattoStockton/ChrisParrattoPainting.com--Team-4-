<html>
<body>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_POST["id"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["Email"];
$phonenumber = $_POST["phonenumber"];
$admin = $_POST["admin"]

$sql = "INSERT INTO Account (id, firstname, lastname, Email, phonenumber, admin) VALUES ('$id','$fname', '$lname', '$email', '$phonenumber', '$admin')";

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