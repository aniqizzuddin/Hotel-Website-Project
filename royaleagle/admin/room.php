<?php
    include('header.php');
    include('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Room_Id = $_POST['Room_Id'];
        $Room_No = $_POST['Room_No'];
        $Room_Type = $_POST['Room_Type'];
        $Property_Code = $_POST['Property_Code'];
        $Occupancy = $_POST['Occupancy'];
        $Room_Image = $_FILES['Room_Image']['name'];
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["Room_Image"]["name"]);

        $sql = "INSERT INTO rooms (Room_Id, Room_No, Room_Type, Property_Code, Occupancy, Room_Image)
        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $Room_Id, $Room_No, $Room_Type, $Property_Code, $Occupancy, $Room_Image);
        $result = mysqli_stmt_execute($stmt);

        if($result) {
            echo "<script>alert('Room added successfully');
            window.location.href='room.php'</script>";
        } else {
            echo "<script>alert('Failed to add room');
            window.location.href='room.php'</script>";
        }
    }

    $sql = "SELECT * FROM rooms";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Royal Eagle|Room</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Room</h1>
            <div class="col-3">
                <!-- searchbar, filter, sort -->
            </div>
            <div class="row">
                <div class="col-9">
                    <table>
                        <tr>
                            <th>Bil</th>
                            <th>Room ID</th>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Property Code</th>
                            <th>Occupancy</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <!-- form for adding new room -->
                            <form action="room.php" method="post" enctype="multipart/form-data">
                                <td>#</td>
                                <td><input type="text" name="Room_Id" placeholder="Room ID" required></td>
                                <td><input type="text" name="Room_No" placeholder="Room No" required></td>
                                <td><input type="text" name="Room_Type" placeholder="Room Type" required></td>
                                <td><input type="text" name="Property_Code" placeholder="Property Code" required></td>
                                <td><input type="text" name="Occupancy" placeholder="Occupancy" required></td>
                                <td><input type="file" name="Room_Image" ></td>
                                <td><input type="submit" value="Add"></td>
                            </form>
                        </tr>
                        <?php
                            $bil = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $bil++; ?></td>
                            <td><?php echo $row['Room_Id']; ?></td>
                            <td><?php echo $row['Room_No']; ?></td>
                            <td><?php echo $row['Room_Type']; ?></td>
                            <td><?php echo $row['Property_Code']; ?></td>
                            <td><?php echo $row['Occupancy'];?></td>
                            <td><img src="../images/<?php echo $row['Room_Image']; ?>"></td>
                            <td>
                                <a href="editRoom.php?id=<?php echo $row['Room_Id']; ?>"><button class="btnedit">Edit</button></a>
                                <a href="delete.php?room_id=<?php echo $row['Room_Id']; ?>" onClick="return confirm('Confirm delete?')"><button class="btndelete">Delete</button></a>
                            </td>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>