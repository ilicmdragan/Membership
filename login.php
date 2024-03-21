<!DOCTYPE HTML>
<html>

<body>
    <?php
    include "dbh.php";

    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $userNameQuery = mysqli_real_escape_string($conn, $inputUsername);
    $passwordQuery = mysqli_real_escape_string($conn, $inputPassword);

    $sql = "SELECT username, pass FROM users WHERE username = '$userNameQuery' and pass = '$passwordQuery' ";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
        header("Location: home.php");
    }

    ?>
</body>

</html>