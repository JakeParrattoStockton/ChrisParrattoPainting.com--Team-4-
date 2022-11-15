<!-- home page with company info and highlighted reviews/jobs -->
<!doctype html>
<html>
    
    <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="headers.css">
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        <style>
            table,
            th,
            td {
                padding: 10px;
                border: 1px solid black;
                border-collapse: collapse;
                }
        </style>
    </head>

    <body>


            <!-- Header -->
            <header class=" border-bottom">
                <div class="container-fluid">
                  <a href="about.php">
                        <img src = "company logo.png" ></img>
                    </a>
                    <ul class="nav" style="float: right; padding-top: 210px;">
                        <li class="nav-item"><a href="login.html" class="nav-link link-dark px-2">Login</a></li>
                        <li class="nav-item"><a href="signup.html" class="nav-link link-dark px-2">Sign up</a></li>
                    </ul>
                </div>
            </header>

            <nav class="py-2 border-bottom" style="background-color:rgb(252, 223, 185) ;">
                <div class = "container d-flex flex-wrap justify-content-center" style="font-family: Cambria; font-size: larger;">
                    <ul class="nav">
                        <li><a href="about.php"  class="nav-link px-2 link-secondary">ABOUT</a></li>
                        <li><a href="reviews.php" class="nav-link px-2 link-dark">REVIEWS</a></li>
                        <li><a href="request.html" class="nav-link px-2 link-dark">REQUEST</a></li>
                        <li><a href="account.php" class="nav-link px-2 link-dark">ACCOUNT</a></li>
                    </ul>
                </div>
            </nav>

             <!-- Header -->

             
             <title>About Page</title>
             <div class="et_pb_text_inner" id="container" ><h1 style="text-align: center; padding-top: 50px;">About Chris Parratto</h1></div>
             <div class ="container-fluid" style="background-color:rgba(252, 223, 185, 0.849); border: 2px solid rgba(212, 188, 155, 0.781); font-family: Cambria;">
                <center style="padding-top: 20px;">
                    <b>“Chris Parratto Painting” is a long standing, 
                    family owned, contracting painting
                    company. Customers have been getting 
                    satisfied for years and only have good things to say 
                    about Chris Parratto. Here are some reviews below 
                    to see what they have to say!</b>
                </center>
                <br>
                <br>
                <center style="padding-bottom: 5px;"><b>contact</b></center>
                <center style = "font-size: 70%;">email : chrisparrattopainting@gmail.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;phone number: XXX-XXX-XXXX &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <a href = 'https://venmo.com/'>Submit a Payment via Venmo</a></center>
            </div>

            <br>
            <br>
            <div class="et_pb_text_inner"><h1 style="text-align: center;"><small>Satisfied Customers</small></h1></div>
            <br>
            <br>

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

                $sql = "SELECT  * FROM review ORDER BY Rating DESC";


                $reviewresults = $conn->query($sql);

            ?>

            <div align = "center" style = "font-size: 150%;">
            <?php

            $i = 0;
            
            echo '<table border = "0">';
            echo '<tr>';

            while($row = $reviewresults->fetch_assoc() and $i < 3) {
                
                
                    echo '<td>';
                        echo '<table border = "1" style = "text-align: center;">';

                            echo '<tr>';

                            $currentjobid = $row['job_id'];

                            echo '<td style="width: 300px;"> ' . $row['Rating'] . ' Stars </td>';
                            echo '</tr>';
                            echo '<tr>';

                            $sqlphoto = "SELECT photo_id, filename FROM photo AS photo1 WHERE photo1.job_id = $currentjobid ORDER BY photo_id ASC";
                            
                            $photoresults = $conn->query($sqlphoto);
                            
                            $count = 0;

                            while($row2 = $photoresults->fetch_assoc()){
                                $count++;

                                echo '<td><img src ="uploads/' . $row2['filename'] . '" class = "gallery" width="300" height="300"></td>';
                            }

                            if($count == 0) {
                                echo '<td><img src ="No_Image_Available.jpg" class = "gallery" width="300" height="300"></td>';
                            }

                            echo '</tr>';
                            echo '<tr>';
                            echo '<td style="width: 300px">' . $row['Review_text'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';

                            $sqljob = "SELECT Cost FROM job AS job1 WHERE job1.job_id = '$currentjobid'";

                            $jobresults = $conn->query($sqljob);

                            while($row3 = $jobresults->fetch_assoc()){

                                echo '<td style="width: 300px"> $' . $row3['Cost'] . '</td>';

                            }

                            echo '</tr>';

                        echo '</table>'; 
                        echo '<br>'; 
                    echo '</td>';

                    $i++;
            }

        ?>
    </body>
  
</html>