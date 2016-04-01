<?php  session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <?php header('Content-type:content="charset="utf-8"');?>
    <title>用户登录</title>
</head>
<body>
<div id="container">
    <div id="content">
        <form action="query.php" method="post" id="login">
            用户名 : <input type="text" name="username" placeholder="你的昵称?" >　<span class="mes_error"></span><br/>
            密　码 : <input type="password" name="passwd" placeholder="长度6位以上">　<span class="mes_error" id="pwd"></span>
        </form>
        <br/>
       <a href="javascript:void()" onclick="check()"></a>
    </div>

</div>
<script src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/first.js"></script>
</body>
</html>
