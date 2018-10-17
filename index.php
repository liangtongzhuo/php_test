<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP testing</title>
</head>

<body>
    <h1>home</h1>
    <form action="login.php" method="post">
            Name: <input type="text" name="username"><br>
            password: <input type="text" name="password"><br>
            <input type="submit" name="submit" value="login">
            <input type="submit" name="submit" value="register">
    </form>
    <?php
    
        $mysqli = new mysqli('127.0.0.1', 'root', '123456', 'testing', 33060);
        $result = $mysqli->query("SELECT username FROM users");
        if (mysqli_connect_error()) {
            echo mysqli_connect_error();
        }

        echo '</br></br>';
        echo 'List of registered users '.count($result);
        echo '<ol>';
        while ($row = $result->fetch_assoc()) {
            echo '<li> usersName：'.$row['username'].'</li>';
        }
        echo '</ol>';
    ?>

</body>

</html>