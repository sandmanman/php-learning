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


### 范围解析操作符（::）

可以访问静态成员，类常量，还可以用来覆盖类中的属性和方法。

**在类的定义外部使用 :: 操作符**

    <?php
		class MyClass {
			const CONST_VALUE = 'a const value'; // 定义类常量
		}
		
		$className = 'MyClass';
		
		echo $className::CONST_VALUE;
		echo MyClass::CONST_VALUE;
	?>

**在类定义内部使用 :: 操作符**

    <?php
		class OtherClass extends MyClass {
			public static $my_statuc = 'static var';
			
			public static function doubleColon() {
				echo parent::CONST_VALUE ."\n";
				echo self::$my_static ."\n";
			}
		}
		
		$classname = "OtherClass";
		echo $classname::doubleColon();
		OtherClass::doubleColon();
	?>

当一个子类覆盖其父类中的方法时，PHP 不会调用父类中已被覆盖的方法。是否调用父类的方法取决于子类。这种机制也作用于构造函数和析构函数，重载以及魔术方法。

**调用父类的方法**

    <?php
		class MyClass {
		    protected function myFunc() {
		        echo "MyClass::myFunc()\n";
		    }
		}
		
		class OtherClass extends MyClass {
		    // 覆盖了父类的定义
		    public function myFunc()
		    {
		        // 但还是可以调用父类中被覆盖的方法
		        parent::myFunc();
		        echo "OtherClass::myFunc()\n";
		    }
		}
		
		$class = new OtherClass();
		$class -> myFunc();
	?>

### Static（静态）关键字

声明类属性或方法为静态，就可以不实例化类而直接访问。静态属性不能通过一个类已实例化的对象来访问（但静态方法可以）。

由于静态方法不需要通过对象即可调用，所以伪变量 $this 在静态方法中不可用。

静态属性不可以由对象通过 -> 操作符来访问。

用静态方式调用一个非静态方法会导致一个 E_STRICT 级别的错误。

静态属性只能被初始化为文字或常量，不能使用表达式。所以可以把静态属性初始化为整数或数组，但不能初始化为另一个变量或函数返回值，也不能指向一个对象。

