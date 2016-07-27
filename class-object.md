## 类和对象

#### 1. 类
类是用于生成对象的代码模块。用`class`关键字和一个任意类名来声明类。

    <?php
      class ShopProduct {
    		// 类体
      }
    ?>


#### 2. 对象
对象是根据类中定义的模版所构造的数据。对象也可以说成是类的“实例”，它是由类定义的数据类型。

    <?php
      	$product = new ShopProduct();
    ?>


#### 3. 设置类中的属性
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


#### 4. 方法
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

#### 4.1 构造方法
创建对象时，构造方法（constructor method）也叫构造器（constructor）会被自动调用。构造方法可以用来确保必要的属性被设置。
构造方法命名 `__construct()`

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

