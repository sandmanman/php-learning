<?php

  include 'db.php';

  // 接收表单 $_POST: 表单中的数据
  // 验证提交的数据是否符合规则

  // 不能为空
  if ($_POST['username'] == '') {
    exit('不能为空');
  }
  if ($_POST['password'] == '') {
    exit('不能为空');
  }
  if ($_POST['confirmPassword'] != $_POST['password']) {
    exit('两次密码输入不一致');
  }

  // 用户名不能重复
  // 检查username数据库中是否已经存在
  $sql = " SELECT * FROM member WHERE username = '$_POST[username]' ";
  $result = mysql_query($sql);
  // 从资源中取出这条记录
  if (mysql_fetch_assoc($result)) {
    exit('用户名已经存在');
  }

  // 把新的账号注册到会员表中
  $password = md5($_POST['password']);
  mysql_query( "INSERT INTO member(username, password) VALUES('$_POST[username]', '$password')" );
  exit('注册成功！');
?>
