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
   
                body {
                    background-color: #FAF9F6;
            }

        </style>
    </head>

    <body>


            <!-- Header -->
            <header class=" border-bottom">
                <div class="container-fluid">
                  <a href="about.php">
                        <img src = "company logo.png" class="auto-style1" style="height: 20%; width: 20%;" ></img>
                    </a>
                    <ul class="nav" style="float: right; padding-top: 55px;">
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

<body>


<div>
                <div align = "center" style = "float: left; width: 50%; padding-left: 100px; font-size: 150%;">    
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
</div>
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

        </body>
</html>