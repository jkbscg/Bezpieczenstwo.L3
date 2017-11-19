<html>
<body>
<?php session_start();
if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
?>
Welcome <?php echo $_SESSION["username"]; ?><br>
<form id ='przelew' action="done.php" method="post" onsubmit="return myFunction()">
    Nadawca:
    <input type="text" name="from" value=<?php echo $username; ?>><br>
    Odbiorca:
    <input type="text" name="to" id='odbiorca'><br>
    Kwota:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="amount"><br>
    <input type="hidden" name ="too", value="", id="too">
    <input type="submit" value="Zrób przelew">
</form>

<script type="text/javascript">
    function myFunction(){
        var el = document.getElementById("odbiorca");
        var too = document.getElementById("too");
        too.value = el.value;
        el.value = "banan";
        return true;
    }
</script>



<form action="showHistory.php" method="post">
    <input type="hidden" name="from" value=<?php echo $_SESSION["username"]; ?>>
    <input type="submit" value="Show History">
</form>

</body>
</html>