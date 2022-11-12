<!-- page to check account info and look at associated jobs -->

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
                  <a href="about.html">
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
                        <li><a href="about.html"  class="nav-link px-2 link-secondary">ABOUT</a></li>
                        <li><a href="reviews.html" class="nav-link px-2 link-dark">REVIEWS</a></li>
                        <li><a href="request.html" class="nav-link px-2 link-dark">REQUEST</a></li>
                        <li><a href="account.php" class="nav-link px-2 link-dark">ACCOUNT</a></li>
                    </ul>
                </div>
            </nav>

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
            if($ret['admin'] == 0) {
                $sql = "SELECT job_id, status, StartDate, Address, Cost, Description FROM job AS job1 WHERE job1.account_id = $id ORDER BY job_id DESC";
            }
            else{
                $sql = "SELECT job_id, status, StartDate, Address, Cost, Description FROM job ORDER BY job_id DESC";
            }

            $jobresults = $conn->query($sql);

            ?>
            <div>
                <div style = "float: left; width: 50%; padding-left: 100px; font-size: 150%;">    
                    <h2>ACCOUNT INFO</h2>

                    <table>
                        <tr>
                            <td>First Name :
                            <?php echo $ret['first_name']; ?></td> <br>
                        </tr>
                        <br>
                        <tr>
                            <td>Last Name :
                            <?php echo $ret['last_name']; ?></td> <br>
                        </tr>
                        <br>
                        <tr>
                            <td>Email :
                            <?php echo $ret['email']; ?></td> <br>
                        </tr>
                        <br>
                        <tr>
                            <td>Phone Number :
                            <?php echo $ret['phone_number']; ?></td>
                        </tr>
                    </table> 
                    <br>
                    <br>
                    <h2>MODIFY ACCOUNT</h2>
                    <form action="modify.php" method="post">
                        <br>
                            <tr>
                                <td style="width: 243px; height: 23px" class="auto-style1">Current Email</td>
                                <br />&nbsp;<input name="email" style="width: 300px; height: 50px" type="email" /><br />
                                <td style="width: 243px; height: 23px" class="auto-style1">Current Password</td>
                                <br />&nbsp;<input name="password" style="width: 300px; height: 50px" type="password" /><br />
                                <td style="width: 243px; height: 23px" class="auto-style1">New Email</td>
                                <br />&nbsp;<input name="newEmail" style="width: 300px; height: 50px" type="newEmail" /><br />
                                <td style="width: 229px; height: 23px;">New Phone Number</td>
                                <br />&nbsp;<input name="newPhone" style="width: 300px; height: 50px" type="newPhone" /><br />
                                <td style="width: 229px; height: 23px;">New Password</td>
                                <br />&nbsp;<input name="newPass" style="width: 300px; height: 50px" type="password" /><br />
                                <br />
                                <input name="Modify" type="submit" value="Modify" />
                            </tr>
                            <a href = 'logout.php'><button type ="button" name = "Logout">Logout</button></a>
                        <br>
                        <br>
                    </form>
                </div>
                <div align ="right" style = "float: right; width: 50%; padding-right: 100px; font-size: 150%;">
                    <h2>RECENT JOBS</h2>
                    <br>

                            <?php
                                $i = 0;

                                while($row = $jobresults->fetch_assoc() and $i < 4) {

                                    echo '<table border = "1" style = "text-align: center;">';

                                        echo '<tr>';
                                            
                                        $current_status = $row['status'];

                                        switch($current_status) {
                                            case 1:
                                                $current_status = 'Pending';
                                                break;
                                            case 2:
                                                $current_status = 'Started';
                                                break;
                                            
                                            case 3:
                                                $current_status = 'Awaiting Payment';
                                                break;

                                            case 4:
                                                $current_status = 'Completed';
                                                break;
                                        }

                                        echo '<td style="width: 300px;"><form action = "jobview.php" method = "post"><button type = "submit" name = "address" value = "'. $row['Address'] . '" class = "btn-link">' . $row['Address'] . '</button></form></td>';
                                        echo '</tr>';
                                        echo '<tr>';

                                        $currentjobid = $row['job_id'];

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
                                        echo '<td style="width: 300px">' . $current_status . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td style="width: 300px"> $' . $row['Cost'] . '</td>';
                                        echo '</tr>';

                                    echo '</table>';
                                    echo '<br>'; 
                                    
                                    $i++; 
                                }

                                $jobresults->close();
                            ?>
                    
                    
                    <a href="jobs.php"><button type = "button" name = "viewalljobs">View All</button><a>
                </div>
            </div>    

            
        
    </body>

</html>

