<?php
    include('header.php');
    include('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Employee_Id = $_POST['Employee_Id'];
        $Emp_Name = $_POST['Emp_Name'];
        $Emp_Password = $_POST['Emp_Password'];
        $Emp_PhoneNo = $_POST['Emp_PhoneNo'];
        $Emp_DOB = $_POST['Emp_DOB'];
        $Property_Code = $_POST['Property_Code'];
        $Role_Id = $_POST['Role_Id'];

        $sql = "INSERT INTO employees (Employee_Id, Property_Code, Emp_Name, Emp_PhoneNo, Emp_Password, Emp_DOB, Role_Id)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $Employee_Id, $Property_Code, $Emp_Name, $Emp_PhoneNo, $Emp_Password, $Emp_DOB, $Role_Id);
        $result = mysqli_stmt_execute($stmt);

        if($result) {
            echo "<script>alert('Employee added successfully');
            window.location.href='employee.php'</script>";
        } else {
            echo "<script>alert('Failed to add employee');
            window.location.href='employee.php'</script>";
        }
    }

    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Royal Eagle|Employee</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Employee</h1>
            <div class="col-3">
                <!-- searchbar, filter, sort -->
            </div>
            <div class="row">
                <div class="col-9">
                    <table>
                        <tr>
                            <th>Bil</th>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Employee Password</th>
                            <th>Employee Phone</th>
                            <th>Employee Birthday</th>
                            <th>Property Code</th>
                            <th>Employee Role</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <!-- form for adding new employee -->
                            <form action='' method="POST">
                                <td>#</td>
                                <td><input type="text" name="Employee_Id" placeholder="Employee Id" required></td>
                                <td><input type="text" name="Emp_Name" placeholder="Employee Name" required></td>
                                <td><input type="text" name="Emp_Password" placeholder="Employee Password" required></td>
                                <td><input type="text" name="Emp_PhoneNo" placeholder="Employee Phone" required></td>
                                <td><input type="text" name="Emp_DOB" placeholder="Employee Birthday" required></td>
                                <td><input type="text" name="Property_Code" placeholder="Property Code" required></td>
                                <td><input type="text" name="Role_Id" placeholder="Employee Role" required></td>
                                <td><input type="submit" value="Add"></td>
                            </form>
                        </tr>
                        <?php
                            $n=0;
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo ++$n; ?></td>
                            <td><?php echo $row['Employee_Id']; ?></td>
                            <td><?php echo $row['Emp_Name']; ?></td>
                            <td><?php echo $row['Emp_Password']; ?></td>
                            <td><?php echo $row['Emp_PhoneNo']; ?></td>
                            <td><?php echo $row['Emp_DOB']; ?></td>
                            <td><?php echo $row['Property_Code']; ?></td>
                            <td><?php echo $row['Role_Id']; ?></td>
                            <td>
                                <button class="btnedit">Edit</button>
                                <a href="delete.php?emp_id=<?php echo $row['Employee_Id']; ?>" onClick="return confirm('Confirm delete?')"><button class="btndelete">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div id="editModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Edit Employee</h2>
                <form id="editForm" action="" method="POST">
                    <!-- Input fields for editing employee details -->
                    <input type="hidden" id="editEmployeeId" name="editEmployeeId">
                    <input type="text" id="editEmpName" name="editEmpName" placeholder="Employee Name" required>
                    <input type="text" id="editEmpPassword" name="editEmpPassword" placeholder="Employee Password" required>
                    <input type="text" id="editEmpPhoneNo" name="editEmpPhoneNo" placeholder="Employee Phone" required>
                    <input type="text" id="editEmpDOB" name="editEmpDOB" placeholder="Employee Birthday" required>
                    <input type="text" id="editPropertyCode" name="editPropertyCode" placeholder="Property Code" required>
                    <input type="text" id="editRoleId" name="editRoleId" placeholder="Employee Role" required>
                    <input type="submit" value="Save">
                </form>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById("editModal");

            // Get the button that opens the modal
            var btn = document.getElementsByClassName("btnedit");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            var editForm = document.getElementById("editForm");

            // When the user clicks the button, open the modal 
            for(let i=0; i<btn.length; i++) {
                btn[i].onclick = function() {
                    modal.style.display = "block";
                    editForm.action = "editEmployee.php?emp_id=" + this.parentElement.parentElement.cells[1].innerHTML;
                    document.getElementById("editEmployeeId").value = this.parentElement.parentElement.cells[1].innerHTML;
                    document.getElementById("editEmpName").value = this.parentElement.parentElement.cells[2].innerHTML;
                    document.getElementById("editEmpPassword").value = this.parentElement.parentElement.cells[3].innerHTML;
                    document.getElementById("editEmpPhoneNo").value = this.parentElement.parentElement.cells[4].innerHTML;
                    document.getElementById("editEmpDOB").value = this.parentElement.parentElement.cells[5].innerHTML;
                    document.getElementById("editPropertyCode").value = this.parentElement.parentElement.cells[6].innerHTML;
                    document.getElementById("editRoleId").value = this.parentElement.parentElement.cells[7].innerHTML;
                }
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>