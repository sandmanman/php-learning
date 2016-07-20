# PHP基础


----------


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
