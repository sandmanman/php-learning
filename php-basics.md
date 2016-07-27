# PHP基础

### 语法

PHP脚本可放置于文档中的任何位置。以`<?php`开头，以`?>`结束。

    <?php
    	// PHP code...
    ?>

**大下写敏感**

在PHP中，所有用户定义的函数、类和关键词（例如 if、else、echo 等等）都对大小写不敏感。所有**变量都对大小写敏感**。



----------


### 输出文本指令

**echo**

`echo` 是PHP语句，输出一个或多个字符串。

**print** / **print_r**

`print` 是函数，只能打印出简单类型变量的值（如init,string）。

`print` 是函数，可以打印复杂类型变量的值（如数组,对象）。

**var_dump和print_r的区别**

`var_dump` 返回表达式的类型和值。`print_r` 仅返回结果。


----------

### 变量

变量存储信息的容器，比如number,string,array等等。语法 `$variable`，变量名必须以字母或下划线开头，**变量名称对大小写敏感**。

**变量作用域**

`local` 局部，`global` 全局，`static` 静态

`global` 只能在函数以外进行访问。

`local` 只能在函数内部进行访问。

`global` 关键词用于访问函数内的全局变量，变量前面使用 global 关键词`global $variable`


### 常量

常量是一个简单值的标识符，在脚本执行期间该值不能改变。传统上常量标识符总是大写。

可以在脚本的任何地方访问常量。

    <?php
		define('MY_VAR', 'default calue');
		// echo MY_VAR
	?>

### 流程控制

**while**

只要 while 表达式的值为 TRUE 就重复执行嵌套中的循环语句。

    <?php
		$i = 1;
		while($i <= 10) {
			echo $i++;
		}
	?>

**foreach**

foreach语法结构提供了遍历数组的简单方式。foreach 仅能够应用于数组和对象。

    foreach (array_expression as $value)
    	statement

    foreach (array_expression as $key => $value)
    	statement

第一种格式遍历给定的array_expression数组。每次循环中当前的单元值被赋给 $value 并且数组内部的指针向前移一步（因此下一次循环将得到下一个单元的值）。

第二种格式做同样的事情，循环中键名被赋给 $key。
    
    <?php
	    $arr = array(1,2,3,4);
	    
	    foreach ($arr as $value) {
	    	$value = $value *2;
	    
	    	print_r($value);
	    }
    ?>


**include require**

require 和 include 几乎完全一样，除了处理失败的方式不同之外。require 在出错时产生 E_COMPILE_ERROR 级别的错误。换句话说将导致脚本中止而 include 只产生警告（E_WARNING），脚本会继续运行。