<?php
    include('../connection.php');

    if(isset($_GET['emp_id'])){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Employee_Id = $_POST['editEmployeeId'];
            $Emp_Name = $_POST['editEmpName'];
            $Emp_Password = $_POST['editEmpPassword'];
            $Emp_PhoneNo = $_POST['editEmpPhoneNo'];
            $Emp_DOB = $_POST['editEmpDOB'];
            $Property_Code = $_POST['editPropertyCode'];
            $Role_Id = $_POST['editRoleId'];
    
            $sql = "UPDATE employees SET Emp_Name=?, Emp_Password=?, Emp_PhoneNo=?, Emp_DOB=?, Property_Code=?, Role_Id=? WHERE Employee_Id=?";
    
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss", $Emp_Name, $Emp_Password, $Emp_PhoneNo, $Emp_DOB, $Property_Code, $Role_Id, $Employee_Id);
            $result = mysqli_stmt_execute($stmt);
    
            if($result) {
                echo "<script>alert('Employee updated successfully');
                window.location.href='employee.php'</script>";
            } else {
                echo "<script>alert('Failed to update employee');
                window.location.href='employee.php'</script>";
            }
        } else {
            // Redirect back to the employee.php page if accessed directly without a POST request
            header("Location: employee.php");
            exit();
        }
    } else if(isset($_GET['guest_id'])){
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
    }
?>