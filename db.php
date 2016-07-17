<?php
    /*
     * 数据库连接练习
    */

    // 连接数据库服务器  服务器地址／用户名／密码
    $coon = mysql_connect('localhost', 'root', 'root');
    if (!$coon) {
        exit ('数据库连接失败！');
    }

    // 选择要操作的数据库  数据库名
    mysql_select_db('database-name');

    // 在连接和传输数据时使用的编码
    mysql_query('set names utf8');


    // 后面即可使用 mysql_query()函数来操作数据库
    echo '数据库连接练习';

?>
