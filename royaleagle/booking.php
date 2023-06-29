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
        <!-- <link rel="stylesheet" href="css/mainpage.css"> -->
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
                            <label for="check-in">Date-in</label>
                            <input type="date" name="date-in" value='<?php echo $today; ?>' min='<?php echo $today; ?>'>
                        </div>
                        <div class="input">
                            <label for="check-out">Date-out</label>
                            <input type="date" name="date-out" value='<?php echo $tomorrow; ?>' min='<?php echo $tomorrow; ?>'>
                        </div>
                        <div class="input">
                            <label for="pax">Pax</label>
                            <input type="number" name="pax" placeholder="0">
                        </div>
                        <div class="search">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="room">
            <div class="title">
                <h1>Our Rooms</h1>
            </div>
            <div class="room-container">
                <!--single room-->
                <div class="room-info">
                    <img src="images/single.png" alt="single room">
                    <div class="room-detail">
                        <h3>Single Room</h3>
                        <p>1 Single Bed</p>
                        <p>1 Person</p>
                        <button id="btn-modal" class="btn-modal">More details</button>
                        <div class="modal" id="myModal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h2>Single Room</h2>
                                <p>1 Single Bed</p>
                                <p>1 Person</p>
                                <p>City view</p>
                                <p>RM 114.00 / night</p>
                            </div>
                        </div>
                        <p>RM 114.00 / night</p>
                    </div>
                </div>
                <!--superior twin room-->
                <div class="room-info">
                    <img src="images/st1.jpg" alt="single room">
                    <div class="room-detail">
                        <h3>Superior Twin Room</h3>
                        <p>2 Single Beds</p>
                        <p>2 People</p>
                        <p>RM 148.00 / night</p>
                    </div>
                </div>
                <!--superior double room-->
                <div class="room-info">
                    <img src="images/sd.jpg" alt="single room">
                    <div class="room-detail">
                        <h3>Superior Double Room</h3>
                        <p>1 King Bed</p>
                        <p>2 People</p>
                        <p>RM 148.00 / night</p>
                    </div>
                </div>
                <!--deluxe twin room-->
                <div class="room-info">
                    <img src="images/dt1.jpg" alt="single room">
                    <div class="room-detail">
                        <h3>Deluxe Twin Room</h3>
                        <p>2 Single Beds</p>
                        <p>2 People</p>
                        <p>RM 198.00 / night</p>
                    </div>
                </div>
                <!--deluxe double room-->
                <div class="room-info">
                    <img src="images/dd1.png" alt="single room">
                    <div class="room-detail">
                        <h3>Deluxe Double Room</h3>
                        <p>1 King Bed</p>
                        <p>2 People</p>
                        <p>RM 198.00 / night</p>
                    </div>
                </div>
                <!--Triple Single room-->
                <div class="room-info">
                    <img src="images/ts.jpg" alt="single room">
                    <div class="room-detail">
                        <h3>Triple Single Bed</h3>
                        <p>3 Single Beds</p>
                        <p>3 People</p>
                        <p>RM 248.00 / night</p>
                    </div>
                </div>
                <!--Suite room-->
                <div class="room-info">
                    <img src="images/suite.jpg" alt="single room">
                    <div class="room-detail">
                        <h3>Suite</h3>
                        <p>1 King Bed</p>
                        <p>3 People</p>
                        <p>RM 342.00 / night</p>
                    </div>
                </div>
                <!--Family room-->
                <div class="room-info">
                    <img src="images/fam1.jpg" alt="single room">
                    <div class="room-detail">
                        <h3>Family Room</h3>
                        <p>1 King Bed</p>
                        <p>4 People</p>
                        <p>RM 396.00 / night</p>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/modal.js"></script>
    </body>
</html>