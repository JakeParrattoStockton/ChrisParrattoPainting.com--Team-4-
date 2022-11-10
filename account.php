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

            $sql = "SELECT job_id, StartDate, Address, Cost, Description FROM job AS job1 WHERE job1.account_id = $id";

            $jobresults = $conn->query($sql);
            ?>

            <h2>ACCOUNT INFO</h2>
            <br>

            <table class="auto-style2" style="width: 56%">
                <tr>
                    <td style="width: 243px; height: 23px" class="auto-style1">First name</td>
                    <td style="width: 229px; height: 23px;">Last Name</td>
                    <td style="height: 23px">Email</td>
                    <td style="height: 23px">Phone</td>
                </tr>
                <tr>

                    <td style="width: 243px; height: 2" class="auto-style3"><?php echo $ret['first_name']; ?></td>
                    <td style="width: 229px" class="auto-style3"><?php echo $ret['last_name']; ?></td>
                    <td class="auto-style3"><?php echo $ret['email']; ?></td>
                    <td class="auto-style3"><?php echo $ret['phone_number']; ?></td>
                </tr>
            </table> 
            <br>
            <br>
            <h2>MODIFY ACCOUNT</h2>
            <form action="modify.php" method="post">
                <br>
                    <tr>
                        <td style="width: 243px; height: 23px" class="auto-style1">Current Email</td>
                        <br />&nbsp;<input name="email" style="width: 171px; height: 35px" type="email" /><br />
                        <td style="width: 243px; height: 23px" class="auto-style1">Current Password</td>
                        <br />&nbsp;<input name="password" style="width: 171px; height: 35px" type="password" /><br />
                        <td style="width: 243px; height: 23px" class="auto-style1">New Email</td>
                        <br />&nbsp;<input name="newEmail" style="width: 171px; height: 35px" type="newEmail" /><br />
                        <td style="width: 229px; height: 23px;">New Phone Number</td>
                        <br />&nbsp;<input name="newPhone" style="width: 171px; height: 35px" type="newPhone" /><br />
                        <td style="width: 229px; height: 23px;">New Password</td>
                        <br />&nbsp;<input name="newPass" style="width: 171px; height: 35px" type="newPass" /><br />
                        <br />
                        <input name="Modify" type="submit" value="Modify" />
                    </tr>
            <br>
            <br>
            <h2>JOBS</h2>
            <br>
            <table class="auto-style2" style="width: 56%">
                <tr>
                    <td style="width: 243; height: 23px" class="auto-style1">Job</td>
                    <td style="width: 229px; height: 23px;">Address</td>
                    <td style="width: 229px; height: 23px;">Date</td>
                    <td style="height: 23px">Cost</td>
                    <td style="width: 255px; height: 23px">Description</td>
                    <td style="width: 255px; height: 23px">Status</td>
                </tr>

                    <?php
                        while($row = $jobresults->fetch_assoc()) {
                            echo '<tr>';
                            
                            $current_status = 'Pending';

                            switch($current_status) {
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

                            echo '<td style="width: 243; height: 23px" class="auto-style1">' . $row['job_id'] . '</td>';
                            echo '<td style="width: 229px" class="auto-style3">' . $row['Address'] . '</td>';
                            echo '<td class="auto-style3">' . $row['StartDate'] . '</td>';
                            echo '<td class="auto-style3">' . $row['Cost'] . '</td>';
                            echo '<td class="auto-style3">' . $row['Description'] . '</td>';
                            echo '<td class="auto-style3">' . $current_status . '</td>';

                            echo '</tr>';
                        }

                        $jobresults->close();
                    ?>
               
            </table> 


            
        
    </body>

</html>

