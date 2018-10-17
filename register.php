<?php
        $un = $_POST['username'];
        $pd = $_POST['password'];
        $pd2 = $_POST['password2'];
        $mysqli = new mysqli('localhost', 'root', '', 'java');
        $result = $mysqli->query("SELECT password FROM users WHERE username = "."'$un'");
        $rs=$result->fetch_row();
        if ($pd != $pd2) {
            $arr = array('status' => 2, 'b' => '两次输入密码不一致');
            echo json_encode($arr);
        } elseif ($rs!=null) {
            $arr = array('status' => 3, 'b' => '用户已存在');
            echo json_encode($arr);
        } else {
            $mysqli = new mysqli('localhost', 'root', '', 'java');
            $sql = "INSERT INTO users (username,password) VALUES ('$_POST[username]', '$_POST[password]')";
            $rs = $mysqli->query($sql);
            if (!$rs) {
                $arr = array('status' => 0, 'b' => 'falied');//插入失败
                echo json_encode($arr);
            } else {
                $arr = array('status' => 1, 'b' => 'success');//插入成功
                echo json_encode($arr);
            }
        }
