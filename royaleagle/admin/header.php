<?php
    session_start();

    $filename = basename($_SERVER['PHP_SELF']);
    
    if($filename != '../login.php' && empty($_SESSION['Employee_Id'])){
        die("<script>alert('Please login first');
        window.location.href='../login.php?'</script>");
    }

    if($filename == '../login.php' && !empty($_SESSION['Employee_Id'])){
        die("<script>alert('Please logout first');
        window.location.href='../admin/adminHome.php?'</script>");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Royal Eagle Admin</title>
        
        <style>
        /* CSS Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            color: #fff;
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .header-right a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-size: 16px;
        }

        .header-right a:hover {
            text-decoration: underline;
        }
    </style>
    </head>
    <body>
        <header>
            <div class="header">
                <h1>ADMINISTRATOR</h1>
                <div class="header-right">
                    <a href="../admin/adminHome.php">Home</a>
                    <a href="../admin/employee.php">Employee</a>
                    <a href="../admin/guest.php">Guest</a>
                    <a href="../admin/room.php">Room</a>
                    <a href="../admin/reservation.php">Reservation</a>
                    <a href="adminLogout.php">Logout</a>
                </div>
            </div>
        </header>
    </body>
</html>