<html>
<head>
    <title>首页</title>
</head>
<body>
<?php

require_once 'utlis/Db.class.php';
//获取数据库资源句柄
$link = Db::getLink();

$sql = 'SELECT * FROM stu_info ORDER BY `ID`';
$link->set_charset('utf8');
$result = $link->query($sql);
?>
<table border="1" B>
        <th>ID</th>
        <th>Name</th>
        <th>Sex</th>
        <th>QQ</th>
        <th>Tell</th>
        <th>Major</th>
        <th>Class</th>
    <?php
    while($row = $result->fetch_assoc()){
        echo '<tr>';
                echo '<td>';
                    echo $row['ID'];
                echo '</td>';
                echo '<td>';
                    echo $row['Name'];
                echo '</td>';
                echo '<td>';
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
    ?>

</table>

</body>
</html>



