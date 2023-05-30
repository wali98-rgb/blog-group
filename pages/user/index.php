Dashboard User
<a href="../../auth/logout.php">Logout</a>

<?php
    session_start();
    if ($_SESSION['status'] == "login") {
        echo $_SESSION['username'];
    } else if ($_SESSION['status'] != "login") {
?>
    <h1>Wellcome</h1>
<?php
    }
?>