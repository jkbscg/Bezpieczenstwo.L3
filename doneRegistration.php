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
$login = $_POST["login"];
$passwd = $_POST["password"];
$hashed_password = hash('sha512', $passwd);

$sql = "INSERT INTO users (login, passwd)
VALUES ('{$login}', '{$hashed_password}');";

if ($conn->query($sql) === TRUE) {
    echo "Zarejestrowano";
} else {
    echo mysqli_error($conn);
    //echo "Użytkownik już istnieje w bazie danych";
}

$conn->close();
?>
<form action = "index.html" method = "post">
    <input type="submit" name="submit" value="OK"/>
</form>

