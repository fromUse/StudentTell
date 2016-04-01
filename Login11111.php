<?php
$name = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['passwd']) ? $_POST['passwd'] : null;

if (!isset($name) || !isset($password)) {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
    echo '<p align="center" style="margin: 100px auto;color: red;font-size: 20px;">账户或密码错误......</p>';
    echo '<script>window.setTimeout("location.href=\'index.php\'",1500);</script>';
    exit();
} else {
    if ($name == 'admin' && $password == 'admin123') {
        $_SESSION['user'] = $name;
        require_once 'query.php';
        exit();
    }
}
?>