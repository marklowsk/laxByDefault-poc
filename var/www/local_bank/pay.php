<?php
// Initialize the session
session_start(['cookie_path' =>  '/', 'cookie_secure' => "1", 'cookie_httponly' => "1"]);

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LoCAL BAnK - Pay</title>
    <style>
        body{ font: 14px sans-serif; }
        .box{ width: 400px; padding: 15px; border-style: double; }
    </style>
</head>
<body>
<div class="box">
<?php
    if (isset($_POST['payee']) && isset($_POST['amount'])) {
        $payee = $_POST['payee'];
	$amount = $_POST['amount'];
	echo "Thank you for using LOCAL BAnK.<br>";
        echo "You paid " . $payee . " $" . $amount;
    } else {
        echo "Invalid transaction!";
    }
?>
</div>
</body>
</html>
