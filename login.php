<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login/register</title>
<body>
<?php
echo '</br></br> <a href="./">back Home</a> </br> ';

init();
function init()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!$username) {
        echo 'username not empty';
        return;
    }
    if (!$password) {
        echo 'password not empty';
        return ;
    }

    $submit = $_POST['submit'];
    echo '<h1>'.$submit.'</h1>';
    $mysqli = new mysqli('127.0.0.1', 'root', '123456', 'testing', 33060);
    $result = $mysqli->query("SELECT password FROM users WHERE username = '{$username}'");
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
    }
    $rs=$result->fetch_row();
    if ($submit == 'login') {
        login($rs, $username, $password);
    } else {
        register($rs, $username, $password);
    }
}

    
function login($rs, $username, $password)
{
    if ($rs!==null) {
        if ($password == $rs[0]) {
            echo "login success";
            setcookie("login", $username);
        } else {
            echo "login password error";
        }
    } else {
        echo "login not userName";
    }
}

function register($rs, $username, $password)
{
    if ($rs[0]) {
        echo "The account already exists";
        return;
    }
    $mysqli = new mysqli('127.0.0.1', 'root', '123456', 'testing', 33060);
    $result = $mysqli->query("INSERT INTO users (username, password) VALUES ('{$username}', '{$password}')");
    if ($result) {
        echo "register success";
        setcookie("login", $username);
    } else {
        echo"register error";
    }
}

?>
</body>

</html>
