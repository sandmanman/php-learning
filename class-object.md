## 类和对象

### 类
类是用于生成对象的代码模块。用`class`关键字和一个任意类名来声明类。

    <?php
      class ShopProduct {
    		// 类体
      }
    ?>


### 对象
对象是根据类中定义的模版所构造的数据。对象也可以说成是类的“实例”，它是由类定义的数据类型。

    <?php
      	$product = new ShopProduct();
    ?>


### 设置类中的属性
类可以定义被成为属性的特定变量。属性也被称为成员变量，是用来存放对象之间不同的数据类型。

    <?php
      class ShopProduct {
    		public $title = 'default product';
    		public $producterMainName = 'main name';
    		public $producterFirstName = 'first name';
    		public $price = 0;
      }
    ?>

使用 `->` 字符来访问属性变量。


    <?php
      	$product = new ShopProduct();
      	print $product -> $title; // default product
    ?>


### 方法
属性可以让对象存储数据，方法可以让对象执行任务。方法是在类中声明的特殊函数。


    <?php
      	public function myMethod($argument, ...) {
    		// ...
      	}
    ?>

和函数不同的是，方法必须在类中声明。使用 `->` 字符来调用方法。


    <?php
      	$myObj = new myClass();
      	$myObj -> myMethod('Harry', ...);
    ?>

例子：在ShopProduct类中声明一个方法


    <?php
      	class ShopProduct {
	    	public $title = 'default product';
	    	public $producterMainName = 'main name';
	    	public $producterFirstName = 'first name';
	    	public $price = 0;
	    
		    function getProducter() {
		      	return "{$this -> $productFirstName}"."{$this -> $productMainName}";
		    }
      	}
    
      	$product = new ShopProduct();
      	$product -> title = 'My Antonia';
      	$product -> producterMainName = 'Cather';
      	$product -> producterFirstName = 'Willa';
      	$product -> price = 5.99;
      	print "author:{$product -> getProducter()}"; // author:Willa Cather
    ?>

`$this` 伪变量把类指向一个对象实例，即指向当前实例。


### extends 继承

一个类可以在声明中用 `extends` 关键字继承另一个类的方法和属性。PHP不支持多重继承，一个类只能继承一个基类。

被继承的方法和属性可以通过用同样的名字重新声明被覆盖。但是如果父类定义方法时使用了 `final`，则该方法不可被覆盖。可以通过 `parent::` 来访问被覆盖的方法或属性。

    class SimpleClass {
    	public $var = 'a default value';
    	public function displayVar() {
    		echo $this -> var;
    	}
    }
    
    class ExtendClass extends SimpleClass {
	    function displayVar() {
	    	echo "Extends class";
	    	parent::displayVar();
	    }
    }
    $extended = new ExtendClass();
    $extended -> displayVar();
	// 输出 Extending class a default value


### 构造函数和析构函数

**构造函数**

具有构造函数的类会在每次创建新对象时先调用此方法，所以非常适合在使用对象之前做一些初始化工作。

构造函数命名 `__construct()`

为ShopProduct类定义一个构造方法：

    <?php
      	class ShopProduct {
		    public $title = 'default product';
		    public $producterMainName = 'main name';
		    public $producterFirstName = 'first name';
		    public $price = 0;
		    
		    function __consturct($title, $firstName, $mainName, $price) {
		      $this -> title = $title;
		      $this -> producterFirstName = $firstName;
		      $this -> producterMainName = $mainName;
		      $this -> price = $price;
		    }
		    
		    function getProducter() {
		      return "{$this -> $productFirstName}".
		     "{$this -> $productMainName}";
    		}
      	}
    
      	$product = new ShopProduct('My Antonia', 'Willa', 'Cather', 5.99);
      	print "author:{$product -> getProducter()}"; // author:Willa Cather
    ?>


**析构函数**

析构函数会在到某个对象的所有引用都被删除或者当对象被显式销毁时执行。

析构函数命名 `__destruct()`