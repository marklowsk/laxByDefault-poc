<?php
// Initialize the session
session_start(['cookie_path' =>  '/', 'cookie_secure' => "1", 'cookie_httponly' => "1"]);
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LoCAL BAnK - Home</title>
    <style>
	body { font: 14px sans-serif; }
        form { padding: 5px; border-style: double; }
	.homebox { width: 400px; padding: 15px; border-style: double; }
	.textright { text-align: right; }
    </style>
</head>
<body>
    <div class="homebox">
      <div class="textright"><a href="logout.php">Sign Out</a></div>
      <h1>LoCAL BAnK portal</h1>
      <h2>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?>,</h2>
      <h3>Quick payment</h3>
      <form action="https://www.local_bank.com/pay.php" method="POST" name="pay">
        <label>Payee:</label>
        <input type="text" name="payee" value=""/><br>
	<label>Amount:</label>
	<input type="text" name="amount" value=""/><br>
        <input type="submit" value="Submit">
      </form>
      <br>
      <div class="textright"><a href="reset-password.php" class="btn btn-warning">Reset your password</a></div>
    </div>
</body>
</html>

