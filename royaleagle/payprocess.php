<?php
    session_start();

    include("connection.php");

    $data_room = "SELECT b.Room_Desc, b.Room_View, b.Room_Price, a.Room_Image
    FROM rooms a, room_types b
    WHERE a.Room_Type = b.Room_Type";

    $guestId = $_SESSION['Guest_Id'];
    $roomId = $_SESSION['room_id'];
    $dateIn = $_SESSION['date_in'];
    $dateOut = $_SESSION['date_out'];
    $price = $_SESSION['room_price'];
    $total_price = $_SESSION['total_price'];
    $room_detail = $_SESSION['room_detail'];

    $insert_booking = "INSERT INTO bookings (Guest_Id, Room_Id, Date_In, Date_Out, total_price)
    VALUES ('$guestId', '$roomId', '$dateIn', '$dateOut', '$total_price')";



    $insert_receipt = "INSERT INTO receipt (Booking_Id, Receipt_Price, Receipt_RoomDetail)
    VALUES (LAST_INSERT_ID(), '$total_price', '$room_detail')";

    if(mysqli_query($conn, $insert_booking)){
        if(mysqli_query($conn, $insert_receipt)){
            echo "<script>alert('Booking successful');
            window.location.href='receipt.php';</script>";
        } else {
            echo "<script>alert('Booking failed');
            window.location.href='booking.php';</script>";
        }
    } else {
        echo "<script>alert('Booking failed');
        window.location.href='booking.php';</script>";
    }
?>