<?php
    include('header.php');
    include('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Guest_Id = $_POST['Guest_Id'];
        $Guest_Name = $_POST['Guest_Name'];
        $Guest_Password = $_POST['Guest_Password'];
        $Guest_PhoneNo = $_POST['Contact_No'];
        $Guest_Email = $_POST['Guest_Email'];

        $sql = "INSERT INTO guests (Guest_Id, Guest_Name, Guest_Password, Contact_No, Guest_Email)
        VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $Guest_Id, $Guest_Name, $Guest_Password, $Guest_PhoneNo, $Guest_Email);
        $result = mysqli_stmt_execute($stmt);

        if($result) {
            echo "<script>alert('Guest added successfully');
            window.location.href='guest.php'</script>";
        } else {
            echo "<script>alert('Failed to add guest');
            window.location.href='guest.php'</script>";
        }
    }

    $sql = "SELECT * FROM guests";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Royal Eagle|Guest</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Guest</h1>
            <div class="col-3">
                <!-- searchbar, filter, sort -->
            </div>
            <div class="row">
                <div class="col-9">
                    <table>
                        <tr>
                            <th>Bil</th>
                            <th>Guest ID</th>
                            <th>Guest Name</th>
                            <th>Guest Password</th>
                            <th>Guest Phone</th>
                            <th>Guest Email</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <!-- form for add new guest -->
                            <form action="guest.php" method="post">
                                <td>#</td>
                                <td><input type="text" name="Guest_Id" placeholder="Guest ID" required></td>
                                <td><input type="text" name="Guest_Name" placeholder="Guest Name" required></td>
                                <td><input type="text" name="Guest_Password" placeholder="Guest Password" required></td>
                                <td><input type="text" name="Contact_No" placeholder="Contact No" required></td>
                                <td><input type="text" name="Guest_Email" placeholder="Guest Email" required></td>
                                <td><input type="submit" value="Add"></td>
                            </form>
                        </tr>
                        <?php
                            $bil = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $bil++; ?></td>
                            <td><?php echo $row['Guest_Id']; ?></td>
                            <td><?php echo $row['Guest_Name']; ?></td>
                            <td><?php echo $row['Guest_Password']; ?></td>
                            <td><?php echo $row['Contact_No']; ?></td>
                            <td><?php echo $row['Guest_Email']; ?></td>
                            <td>
                                <button class="btnedit">Edit</button>
                                <a href="delete.php?guest_id=<?php echo $row['Guest_Id']; ?>" onClick="return confirm('Confirm delete?')"><button class="btndelete">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- The Modal to edit Guest-->
        <div id="editModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Edit Guest</h2>
                <form id="editForm" action="" method="POST">
                    <!-- Input fields for editing guest details -->
                    <input type="hidden" name="Guest_Id" id="editGuestId">
                    <input type="text" name="Guest_Name" id="editGuestName" placeholder="Name" required>
                    <input type="text" name="Guest_Password" id="editGuestPassword" placeholder="Password" required>
                    <input type="text" name="Contact_No" id="editContactNo" placeholder="Contact No" required>
                    <input type="text" name="Guest_Email" id="editGuestEmail" placeholder="Email Address" required>
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
            for(let i = 0; i < btn.length; i++) {
                btn[i].onclick = function() {
                    modal.style.display = "block";
                    editForm.action = "editGuest.php?guest_id=" + this.parentElement.parentElement.children[1].innerHTML;
                    document.getElementById("editGuestId").value = this.parentElement.parentElement.children[1].innerHTML;
                    document.getElementById("editGuestName").value = this.parentElement.parentElement.children[2].innerHTML;
                    document.getElementById("editGuestPassword").value = this.parentElement.parentElement.children[3].innerHTML;
                    document.getElementById("editContactNo").value = this.parentElement.parentElement.children[4].innerHTML;
                    document.getElementById("editGuestEmail").value = this.parentElement.parentElement.children[5].innerHTML;
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