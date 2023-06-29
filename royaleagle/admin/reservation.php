<?php
    include('header.php');
    include('../connection.php');

    $sql = "SELECT * FROM bookings, guests, rooms, room_types 
            WHERE bookings.Guest_Id = guests.Guest_Id AND bookings.Room_Id = rooms.Room_Id AND rooms.Room_Type = room_types.Room_Type";
    
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Royal Eagle|Reservation</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Reservation</h1>
            <div class="col-3">
                <!-- searchbar, filter, sort -->
            </div>
            <div class="row">
                <div class="col-9">
                    <table>
                        <tr>
                            <th>Bil</th>
                            <th>Booking ID</th>
                            <th>Guest Name</th>
                            <th>Room Number</th>
                            <th>Room Type</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Total Payment</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            $bil = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $bil++; ?></td>
                            <td><?php echo $row['Booking_Id']; ?></td>
                            <td><?php echo $row['Guest_Name']; ?></td>
                            <td><?php echo $row['Room_No']; ?></td>
                            <td><?php echo $row['Room_Type']; ?></td>
                            <td><?php echo $row['Date_In']; ?></td>
                            <td><?php echo $row['Date_Out']; ?></td>
                            <td><?php echo $row['total_price']; ?></td>
                            <td>
                                <a href="editreservation.php?booking_id=<?php echo $row['Booking_Id']; ?>">Edit</a>
                                <a href="delete.php?booking_id=<?php echo $row['Booking_Id']; ?>" onClick="return confirm('Confirm delete?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="addreservation.php">Add Reservation</a>
                </div>
            </div>
        </div>
    </body>
</html>