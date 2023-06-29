<?php
    include('header.php');

    if(empty($_SESSION['Guest_Id'])){
        die("<script>alert('Please login first');
        window.location.href = 'login.php';</script>");
    }

    if(!empty($_GET)){
        $_SESSION['room_id'] = $_GET['room_id'];
        $_SESSION['date_in'] = $_GET['date_in'];
        $_SESSION['date_out'] = $_GET['date_out'];
        $_SESSION['pax'] = $_GET['pax'];
        $_SESSION['room_desc'] = $_GET['room_desc'];
        $_SESSION['room_view'] = $_GET['room_view'];
        $_SESSION['total_days'] = $_GET['total_days'];
        $_SESSION['room_price'] = $_GET['room_price'];
    }

    $_SESSION['room_detail'] = $_SESSION['room_desc'] . " with " . $_SESSION['room_view'];
    $_SESSION['total_price'] = $_SESSION['room_price'] * $_SESSION['total_days'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ROYAL EAGLE|Payment</title>
    <link rel="stylesheet" href="css/payment.css">
</head>
<body>
    <div class="container">
        <div class="book-detail">
            <h2>Booking Details</h2>
            <hr>
            <div class="detail">
                <b>Room ID:</b> <?php echo $_SESSION['room_id']; ?><br>
                <b>Date In:</b> <?php echo $_SESSION['date_in']; ?><br>
                <b>Date Out:</b> <?php echo $_SESSION['date_out']; ?><br>
                <b>Pax:</b> <?php echo $_SESSION['pax']; ?><br>
                <b>Duration:</b> <?php echo $_SESSION['total_days']; echo(" day/s") ?><br>
                <b>Room Detail:</b> <?php echo $_SESSION['room_detail'];?><br>
                <b>Room Price:</b> <?php echo $_SESSION['room_price']; ?><br>
                <b>Total Price:</b> <?php echo $_SESSION['total_price']; ?><br>
            </div>
        </div>
        <div class="payment">
            <h2>Payment</h2>
            <hr>
            <form action="payprocess.php" method="post">
                <div class="form">
                    <input type="text" name="cardName" id="cardName" placeholder="Name on card" required><br>
                    <input type="text" name="cardNumber" id="cardNumber" placeholder="Card Number" required><br>
                    <input size='3' maxlength='2' type="text" name="expMonth" id="expMonth" placeholder="MM" required>
                    <input size='3' maxlength='4' type="text" name="expYear" id="expYear" placeholder="YYYY" required>
                    <input size='3' maxlength='3' type="text" name="cvv" id="cvv" placeholder="CVV" required><br>
                </div>
                <div class="submit-btn">
                    <input type="submit" value="Pay">
                </div>
            </form>
            <a href="booking.php"><button>Cancel</button></a>
        </div>
    </div>
