<?PHP
# Memulakan fungsi Session
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur"); 
#----------------- Bahagian login & logout Session ------------

$namafail = basename($_SERVER['PHP_SELF']);

if(($namafail !='mainpage.php'  and $namafail !='payment.php' and $namafail !='bookinglist.php' and $namafail !='signup.php' and $namafail !='login.php')  and empty($_SESSION['Guest_Id']))
{
    die("<script>alert('Please signup');window.location.href='logout.php'</script>");
}
?>