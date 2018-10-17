<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login/register</title>

<body>
<?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $submit = $_POST['submit'];
        echo '<h1>'.$submit.'</h1>';
        $mysqli = new mysqli('127.0.0.1', 'root', '123456', 'testing', 33060);
        // print_r($mysqli);
        $result = $mysqli->query("SELECT password FROM users WHERE username = "."'$username'");
        if (mysqli_connect_error()) {
            echo mysqli_connect_error();
        }
        $rs=$result->fetch_row();
        if ($rs!==null) {
            if ($password == $rs[0]) {
                $arr = array('status' => 1, 'b' => 'success');
                echo json_encode($arr);
            } else {
                $arr = array('status' => 2, 'b' => 'password error');
                echo json_encode($arr);
            }
        } else {
            $arr = array('status' => 0, 'b' => 'not username');
            echo json_encode($arr);
        }
?>
</body>
</html>
