<?php
    /*
     * 数据库连接
    */

    // 编码
    header('Content-Type:text/html;charset=utf8');

    // 连接数据库服务器  服务器地址／用户名／密码
    $coon = mysql_connect('localhost', 'root', 'root');
    if (!$coon) {
        exit ('数据库连接失败！');
    }

    // 选择要操作的数据库  数据库名
    mysql_select_db('student');

    // 在连接和传输数据时使用的编码
    mysql_query('set names utf8');


    // 后面即可使用 mysql_query()函数来操作数据库

    // 例子1：像students表中插入100条数据
    // for ($i=0; $i < 100 ; $i++) {
    //   mysql_query("INSERT INTO students(name,sex,age,password) VALUES('LUCY', '女', 22, 'asd')");
    // }
    // End



    // 例子2：读取表中所有数据
    // 先写SQL语句
    //$sql = 'SELECT * FROM students';
    // 执行SQL语句，并返回从数据库中获取的资源
    //$result = mysql_query($sql);
    // 从资源中获取每条数据，返回的是一个一维数组
    // **mysql_fetch_assoc()函数调用一次只能取一条数据,再调用再去一条
    // $row = mysql_fetch_assoc($result);
    // 循环取出资源中的每条记录，知道全部取出为止
    // while ( $row = mysql_fetch_assoc($result) ) {
    //   echo '姓名：'.$row['name'].'性别：'.$row['sex'].'年龄：'.$row['age'].'<br/>';
    // }


    //var_dump($row);



?>
