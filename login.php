<html>
<body>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "test";



$id = $_POST["id"];
$email= $_POST["email"];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





$sql = "SELECT * FROM Account WHERE id = '$id' and password = '$email'";

$result = $conn->query($sql);

if ($result->num_rows === 1) {
    session_start();
    $row = $result->fetch_assoc();
	unset($_SESSION['row']);

   
	if (!isset($_SESSION['row'])) {  
	
    $_SESSION['row'] = $row;        
    header("location: account.php");
	}

	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



?>
</body>
</html>