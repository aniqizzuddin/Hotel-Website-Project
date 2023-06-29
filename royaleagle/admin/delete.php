<?php
    include('../connection.php');

    if (isset($_GET['emp_id'])) {
        $Employee_Id = $_GET['emp_id'];

        $sql = "DELETE FROM employees WHERE Employee_Id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $Employee_Id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>alert('Employee deleted successfully');
            window.location.href='employee.php'</script>";
        } else {
            echo "<script>alert('Failed to delete employee');
            window.location.href='employee.php'</script>";
        }
    } else if(isset($_GET['guest_id'])) {
        $Guest_Id = $_GET['guest_id'];

        $sql = "DELETE FROM guests WHERE Guest_Id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $Guest_Id);
        $result = mysqli_stmt_execute($stmt);

        if($result) {
            echo "<script>alert('Guest deleted successfully');
            window.location.href='guest.php'</script>";
        } else {
            echo "<script>alert('Failed to delete guest');
            window.location.href='guest.php'</script>";
        }
    } else if(isset($_GET['room_id'])) {
        $Room_Id = $_GET['room_id'];

        $sql = "DELETE FROM rooms WHERE Room_Id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $Room_Id);
        $result = mysqli_stmt_execute($stmt);

        if($result) {
            echo "<script>alert('Room deleted successfully');
            window.location.href='room.php'</script>";
        } else {
            echo "<script>alert('Failed to delete room');
            window.location.href='room.php'</script>";
        }
    } else if(isset($_GET['booking_id'])) {
        $Booking_Id = $_GET['booking_id'];

        $sqlreceipt = "DELETE FROM receipt WHERE Booking_Id = ?";
        $sql = "DELETE FROM bookings WHERE Booking_Id = ?";
        $stmtreceipt = mysqli_prepare($conn, $sqlreceipt);
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmtreceipt, "s", $Booking_Id);
        mysqli_stmt_bind_param($stmt, "s", $Booking_Id);
        $resultreceipt = mysqli_stmt_execute($stmtreceipt);
        $result = mysqli_stmt_execute($stmt);

        if($result && $resultreceipt) {
            echo "<script>alert('Booking deleted successfully');
            window.location.href='reservation.php'</script>";
        } else {
            echo "<script>alert('Failed to delete booking');
            window.location.href='reservation.php'</script>";
        }
    } else {
        // Invalid request
        echo "<script>alert('Invalid request');
        window.history.back()</script>";
    }
?>