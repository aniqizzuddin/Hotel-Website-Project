<?PHP
    include('header.php');
    #get today date
    $today=date("Y-m-d");
    #get tomorrow date
    $tomorrow=date('Y-m-d', strtotime('+1 day'));
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ROYAL EAGLE|Booking</title>
        <!-- <link rel="stylesheet" href="css/bookinglist.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="css/booking.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <img src="images/logo RE with text.png" class="logo">
                <ul>
                    <!-- <li><a href="mainpage.php">Home</a></li> -->
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <section class="home" id="home">
            <div class="video-container">
                <video src="images/hotel video.mp4" loop autoplay muted></video>
            </div>
        </section>

        <section class="book">
            <div class="book-container">
                <form action="bookinglist.php" method="POST">
                    <div class="input-grid">
                        <div class="input">
                            <label for="check-in">Date-in:</label>
                            <input type="date" name="date-in" value='<?php echo $today; ?>' min='<?php echo $today; ?>'>
                        </div>
                        <div class="input">
                            <label for="check-out">Date-out:</label>
                            <input type="date" name="date-out" value='<?php echo $tomorrow; ?>' min='<?php echo $tomorrow; ?>'>
                        </div>
                        <div class="input">
                            <label for="pax">Pax:</label>
                            <input type="number" name="pax">
                        </div>
                        <div class="search">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?PHP
            if(!empty($_POST)) {
                include("connection.php");

                $date_in = $_POST['date-in'];
                $date_out = $_POST['date-out'];
                $pax = $_POST['pax'];

                #count how many days
                $start = strtotime($date_in);
                $end = strtotime($date_out);
                $total_days = ceil(abs($end - $start) / 86400);

                #sql to select rooms that are not booked
                $select_room = "SELECT a.Room_Id, a.Room_Type, b.Room_Desc, b.Room_View, a.Occupancy, b.Room_Price, a.Room_Image
                FROM rooms a, room_types b
                WHERE a.Room_Type = b.Room_Type
                AND a.Occupancy >= '$pax'
                AND Room_Id NOT IN (SELECT Room_Id FROM bookings WHERE Date_Out >= '$date_in' AND Date_In <= '$date_out')
                ORDER BY a.Occupancy ASC";

                $result = mysqli_query($conn, $select_room);

                # jika bilangan row yang ditemui lebih kecil dari 1. bermaksud tiada kekosongan
                if(mysqli_num_rows($result)<1)
                {
                    die ("<script>alert('No room available'); 
                    window.location.href='booking.php';</script>");
                }

                if(mysqli_num_rows($result) > 0) {
        ?>
        <section class="room">
            <div class="title">
                <h2>Available Rooms</h2>
            </div>
            <div class="room-container">
                <!-- <div class="room-grid"> -->
                    <?PHP
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="room-info">
                        <div class="room-img">
                            <img src="images/<?PHP echo $row['Room_Image']; ?>" alt="">
                        </div>
                        <div class="room-detail">
                            <h3><?PHP echo $row['Room_Type']; ?></h3>
                            <p><?PHP echo $row['Room_Desc']; ?></p>
                            <p><?PHP echo $row['Room_View']; ?></p>
                            <p>RM <?PHP echo $row['Room_Price']; ?> / night</p>
                            <button class="btn-book" onclick="window.location.href='payment.php?room_id=<?PHP echo $row['Room_Id']; ?>&room_desc=<?PHP echo $row['Room_Desc']; ?>&room_view=<?PHP echo $row['Room_View']; ?>&room_price=<?PHP echo $row['Room_Price']; ?>&date_in=<?PHP echo $date_in; ?>&date_out=<?PHP echo $date_out; ?>&pax=<?PHP echo $pax; ?>&total_days=<?PHP echo $total_days; ?>'">
                                Book Now
                            </button>
                        </div>
                    </div>
                    <?PHP
                        }
                    ?>
                
            </div>
        <?PHP
            }
            else {
                echo "No room available";
            }
        }
        ?>
    </body>
</html>