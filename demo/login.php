<?php
  // 连接数据库服务器  服务器地址／用户名／密码
  $coon = mysql_connect('localhost', 'root', 'root');
  if (!$coon) {
      exit ('数据库连接失败！');
  }
  // 选择要操作的数据库  数据库名
  mysql_select_db('student');
  // 在连接和传输数据时使用的编码
  mysql_query('set names utf8');


  // 接收表单 $_POST: 表单中的数据
  // 验证提交的数据是否符合规则

  // 不能为空
  if ($_POST['username'] == '') {
    exit ('不能为空');
  }
  if ($_POST['password'] == '') {
    exit ('不能为空');
  }

  // 根据用户名，查询数据库中有没有这个用户名
  $sql = " SELECT password FROM member WHERE username = '$_POST[username]' ";
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  // 从资源中取出这条记录
  if ($row) {
    if ($row['password'] == md5($_POST['password'])) {
      exit('登录成功');
    } else {
      exit('密码错误');
    }
  } else {
    exit('用户不存在');
  }
?>
