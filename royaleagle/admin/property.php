<?php
    include('header.php');
    include('../connection.php');

    $sql = "SELECT * FROM properties";
    $result = mysqli_query($conn, $sql);
?>