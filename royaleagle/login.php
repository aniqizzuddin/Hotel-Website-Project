<?php
    include("connection.php");
    include('header.php');
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Royal Eagle|Login</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <header>
        <a href="mainpage.php">Back</a>
        <!-- <form onsubmit="return validateForm(event)"> -->
        <form action="login.php" method="post" autocomplete="off">    
            <div class="form">
                <h2>Royal Eagle</h2>
                    <label for="Uname">Username</label>
                    <input type="text" name="Uname" id="Uname" required> <br>
                    <label for="Pass">Password</label>
                    <input type="password" name="Pass" id="Pass" required><br>
                    <a href="booking.php"><input type="submit" name="submit" value="Log In"></a>
                <div class="Dont">
                    <h5>Don't have an account?</h5> 
                    <!-- <a href="signup.html"><input type="button" value="Sign Up"></a> -->
                    <a href="signup.php">Sign Up</a>
                </div>
            </div><br>
        </form>
    </header>
</body>
<?php
    
    if(!empty($_POST)) {

        $guestId = $_POST['Uname'];
        $password = $_POST['Pass'];

        $sql = "SELECT * FROM guests 
                WHERE Guest_Id = '$guestId' AND Guest_Password = '$password'
                LIMIT 1";

        $sqladmin ="SELECT * FROM employees
                    WHERE Role_Id = 'AD'
                    AND Employee_Id = '$guestId' AND Emp_Password = '$password'
                    LIMIT 1";

        $result = mysqli_query($conn, $sql);
        $resultadmin = mysqli_query($conn, $sqladmin);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['Guest_Id'] = $row['Guest_Id'];
            $_SESSION['Guest_Name'] = $row['Guest_Name'];
            $_SESSION['Guest_Email'] = $row['Guest_Email'];
            $_SESSION['Contact_No'] = $row['Contact_No'];
            $_SESSION['Guest_Password'] = $row['Guest_Password'];

            echo "<script>window.location.href='booking.php';</script>";
        
        } else if(mysqli_num_rows($resultadmin) == 1) {
            $row = mysqli_fetch_assoc($resultadmin);

            $_SESSION['Employee_Id'] = $row['Employee_Id'];
            $_SESSION['Emp_Name'] = $row['Emp_Name'];

            echo "<script>window.location.href='admin/adminHome.php';</script>";
        }
        else {
            echo "<script>alert('Username or password incorrect');
            window.history.back();</script>";
        }
    }
?>
</html>