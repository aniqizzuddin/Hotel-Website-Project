<?php
    include('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Guest_Id = $_POST['editGuestId'];
        $Guest_Name = $_POST['editGuestName'];
        $Guest_Password = $_POST['editGuestPassword'];
        $Contact_No = $_POST['editContactNo'];
        $Guest_Email = $_POST['editGuestEmail'];

        $sql = "UPDATE guests SET Guest_Name=?, Guest_Password=?, Contact_No=?, Guest_Email=? WHERE Guest_Id=?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $Guest_Name, $Guest_Password, $Contact_No, $Guest_Email, $Guest_Id);
        $result = mysqli_stmt_execute($stmt);

        if($result) {
            echo "<script>alert('Guest updated successfully');
            window.location.href='guest.php'</script>";
        } else {
            echo "<script>alert('Failed to update guest');
            window.location.href='guest.php'</script>";
        }
    } else {
        // Redirect back to the guest.php page if accessed directly without a POST request
        header("Location: guest.php");
        exit();
    }
?>

