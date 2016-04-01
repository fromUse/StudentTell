
<?php
$name = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['passwd']) ? $_POST['passwd'] : null;

require_once 'utlis/Db.class.php';
global $link;
$link = Db::getLink();//获取数据库资源句柄
//默认通过id查找并列出全班信息
$sql = 'SELECT * FROM stu_info ORDER BY `ID`';

if(isset($name) && isset($password)){
    if ($name == 'admin' && $password == 'admin123') {
        $_SESSION['user'] = $name;
    }else{
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
        echo '<p align="center" style="margin: 100px auto;color: red;font-size: 20px;">账户或密码错误......</p>';
        echo '<script>window.setTimeout("location.href=\'Login.php\'",1500);</script>';
        exit();
    }
}elseif(!isset($_SESSION['user'])){
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
    echo '<p align="center" style="margin: 100px auto;color: red;font-size: 20px;">你没有权限访问此页面,请登录......</p>';
    echo '<script>window.setTimeout("location.href=\'Login.php\'",1500);</script>';
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <!--  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> -->
    <meta charset="UTF-8">
    <link href="css/query.css" rel="stylesheet" type="text/css">
    <?php header('Content-type:content="charset="utf-8"');?>
    <title>查询</title>
</head>
<script type='text/javascript' src='js/jquery-2.2.0.min.js'></script>
<body>
<?php

$index = null;
$selection = null;
$sql = null;
$mesg = '木有找到相关信息';
if (isset($_GET['index'])) {
    $index = $_GET['index'];
}
if (isset($_GET['selection'])) {
    $selection = $_GET['selection'];
}


require_once 'utlis/Db.class.php';
$link = Db::getLink();//获取数据库资源句柄
//默认通过id查找并列出全班信息
$sql = 'SELECT * FROM stu_info ORDER BY `ID`';


?>
<div id="container">

    <div id="header">
        <p>学生信息查询系统</p>
    </div>
    <div id="content">
        <form action="query.php" method="get" id="query">
            <select name="select_className">
                <?php
                if (!$link) {
                    exit('数据库连接出现问题，请确认正确填写数据库账户 密码！');
                } else {
                    $sqlclass = 'SELECT * FROM class';
                    $result_className = $link->query($sqlclass);
                    if ($result_className) {
                        foreach ($result_className->fetch_assoc() as $Classs) {
                           echo '<option '."name={$Classs['classID']}>"."{$Classs['className']}"."</option>";
                        }

                    }
//                    echo "<option name='143soft_1'>143软件开发1班</option>";
                }

                ?>
            </select>
            <select name="selection">
                <option name="ID">学号</option>
                <option name="Name">姓名</option>
                <option name="Tell">手机</option>
                <option name="QQ">QQ</option>
            </select>
            <input type="text" name="index" class="" id="input"
                   value="<?php echo isset($_GET['index']) ? $_GET['index'] : '' ?>">
            <input type="button" value="查询" onclick="check(this.form)">

            <span class="username">
                <?php
                        if(isset($_SESSION['user']))
                        {
                            echo "<a href=''>"."{$_SESSION['user']}"."</a>";
                        }
                ?>

            </span>
        </form>
        <p id="msg"></p>
    </div>
    <div id="table">

        <table>
            <th>ID</th>
            <th>Name</th>
            <th>Sex</th>
            <th>QQ</th>
            <th>Tell</th>
            <th>Major</th>
            <th>Class</th>
            <?php

            if (!$link) {
                exit('数据库连接出现问题，请确认正确填写数据库账户 密码！');
            }

            if ($index) {
                switch ($selection) {
                    //查询的是实行模糊查询
                    case '学号':
                        $sql = "SELECT * FROM stu_info WHERE ID LIKE '%$index%'";
                        break;
                    case '姓名':
                        $sql = "SELECT * FROM stu_info WHERE Name LIKE '%$index%'";
                        break;
                    case 'QQ':
                        $sql = "SELECT * FROM stu_info WHERE QQ LIKE '%$index%'";
                        break;
                    case '手机':
                        $sql = "SELECT * FROM stu_info WHERE Tell LIKE '%$index%'";
                        break;
                    case '专业':
                        $sql = "SELECT * FROM stu_info WHERE Major  LIKE '%$index%'";
                        break;
                    case '班级':
                        $sql = "SELECT * FROM stu_info WHERE Class  LIKE '%$index%'";
                        break;
                }
//                echo $sql;
            }
            $result = $link->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>';
                    echo $row['ID'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['Name'];
                    echo '</td>';
                    echo '<td >';
                    echo $row['Sex'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['QQ'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['Tell'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['Major'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['Class'];
                    echo '</td>';
                    echo '</tr>';
                }
                $mesg = '找到条' . $link->affected_rows . '相关信息!';
                echo "<option";
            }
            ?>
        </table>
    </div>
    <?php
    echo '<p align="center">' . $mesg . '</p>';
    ?>
</div>

</body>
<script>
    //检查输入框内容是否为空
    function check(bt) {
        var text = $('#query :text').val();
        var reg = /^[ ]*$/;
        if (!reg.test(text)) {
            bt.submit();
        } else {
            $('#msg').text('查询内容不能为空！');
            $('#query :text').addClass('input_text');
        }
    }

    var input = document.getElementById('input');
    input.onblur = function () {
        var text = $('input').val();
        var reg = /^[ ]*$/;
        if (reg.test(text)) {
            $('#input').removeClass('input_textR');
            $('#input').addClass('input_textL');
            $('#msg').text('查询内容不能为空！');
        } else {
            $('#input').removeClass('input_textL');
            $('#input').addClass('input_textR');
            $('#msg').text('');
        }
    }


    //                var text = $('#query :text').val();
    //                var reg = /([^ ]*)([.]+)([^ ]*)/;
    //                if (reg.test(text)) {
    //                    alert(text);}


</script>
</html>

