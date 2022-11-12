<!doctype html>
<html>
    
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

    $ret = $_SESSION['row'];

    if(empty($ret['account_id'])) {
        header('Location: login.html');
    }

    $id = $ret['account_id'];
            
    //check for admin
    if($ret['admin'] == 1) {
        $newStatus = $_POST['cStatus'];

        $sql = "UPDATE job SET status = '$newStatus' WHERE email = '$email' AND password = '$password'";
    }
    else{
       
    }

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successfully!";
        header("location: jobview.php");
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    
    
    $conn->close();


    ?>

    

    </body>

</html>