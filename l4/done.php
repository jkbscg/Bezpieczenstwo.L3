<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Potwierdzenie</title>
</head>
<body>
<?php session_start();
$_SESSION["username"] = $_POST["from"];
session_write_close();?>
<?php echo "Odbiorca: " . $_POST["too"]."<br> kwota: ". $_POST["amount"]; ?>

<?php

$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "DB_Transfers";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$od = $_POST["from"];
$do = $_POST["to"];
$kwota = $_POST["amount"];

$sql = "INSERT INTO transfers (od, kwota, do)
VALUES ('{$od}', $kwota, '{$do}');";
//echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Wykonano";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<form action = "login.php" method = "post">
    <input type="submit" name="submit" value="OK"/>
</form>
</body>
</html>
