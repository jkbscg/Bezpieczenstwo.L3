<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "DB_Transfers";
$user = $_POST["from"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT od, kwota, do from transfers where od Like '{$user}' or do Like '{$user}';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Nadawca: ". $row["od"]. " Kwota: ". $row["kwota"]. " Odbiorca:  " . $row["do"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
<form action="login.php" method="post">
    <input type="hidden" name="from" value=<?php echo $_SESSION["username"]; ?>>
    <input type="submit" value="Go back">
</form>
</body>
</html>
