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

$sql = "SELECT passwd from users where login Like '{$login}';";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

    if (strcmp(hash('sha512', $row['passwd']),hash('sha512',$passwd) == 0)) {
        session_start();
        $_SESSION['username'] = $login;
        header("Location: login.php");
    }
    else {
        echo "Złe hasło";
    }

} else {
    echo "Użytkownik nie istnieje";
}

$conn->close();
?>



