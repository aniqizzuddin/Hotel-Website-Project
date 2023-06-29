<?php
    include('header.php');
    
    if (!empty($_POST)) {
        include("connection.php");

        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $email = $_POST['Email'];
        $pass1 = $_POST['Pass1'];
        $phoneNum = $_POST['phoneNUm'];

        if($pass1 != $_POST['Pass2']) {
            echo "<script>alert('incorrect passsword');</script>";
            echo "<script>window.history.back();</script>";
        }

        $sql = "INSERT INTO guests (Guest_Id, Guest_Name, Guest_Password, Contact_No, Guest_Email) 
        VALUES ('$userId', '$name', '$pass1', '$phoneNum', '$email')";

        if(mysqli_query($conn, $sql)) {
            echo "<script>alert('Successful');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Unsuccessful');</script>";
            echo "<script>window.history.back();</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>user signup</title>
        <link rel="stylesheet" href="styleSignup.css">
        <link rel="stylesheet" href="script.js">
    </head>
    <body>
        <header>
            <form action="signup.php" method="post" autocomplete="off">
                <div class="container">
                    <div class="form2">
                        <h2>Royal Eagle</h2>
                        <label for="userId">UserID</label>
                        <input type="text" id="userId" name="userId" required> <br>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required><br>
                        <label for="Email">E-mail</label>
                        <input type="email" id="Email" name="Email" required><br>
                        <label for="Pass1">Password</label>
                        <input type="password" name="Pass1" id="Pass1" required><br>
                        <label for="Pass2">Confirmation Password</label>
                        <input type="password" name="Pass2" id="Pass2" required><br>
                        <label for="phoneNUm">Phone Number</label>
                        <input type="tel" name="phoneNUm" id="phoneNUm" required><br>
                        <input type="submit" value="Sign Up">
                    </div>
                    <div class="Already">
                        <h5>Already have an account?</h5>
                        <!-- <a href="login.html"><input type="button" value="Log In"></a> -->
                        <a href="login.php">Log In</a>
                    </div>
                </div>
            </form>
        </header>
    </body>
</html>
