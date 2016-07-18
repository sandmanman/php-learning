## 笔记

### 操作数据库

#### PHP连接mySQL数据库
```php
<?php
  $host = 'localhost';  // 服务器地址
  $root = 'mysql_name'; // 用户名
  $root_password = 'mysql_password'; // 密码

  $database = 'database_name'; // 数据库名

  $conn = mysql_connect($host, $root, $root_password); // 链接数据库
  if (!$coon) {
    die ('数据库连接失败！');
  }

  mysql_select_db($database, $conn); // 选择要连接的数据库
  mysql_query('set names utf8'); // 设置编码为UTF8
?>
```


#### 增加数据
```php
<?php
  // 添加数据
  $query = "INSERT INTO user(nickname,emal) VALUES('Annine', 'annine@gmail.com')";
  $result = mysql_query($query); // 执行
?>
```

#### 删除数据
```php
<?php
  $query = "DELETE FROM user WHERE nickname='nickname'";
  $result = mysql_query($query);
?>
```

#### 修改数据
```php
<?php
  $query = "UPDATE user SET nickname='new-nickname' WHERE id='1'";
  $result = mysql_query($query);
?>
```

#### 查询数据
```php
<?php
  $query = "SELECT * FROM user";
  $result = mysql_query($query);
  while ( $row = mysql_fetch_row($result) ) {
    echo $rwo["nickname"].$row["email"];
  }
?>
```
