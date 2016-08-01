# PHP中 this/self/parent 的区别

初步解释 `this` 是指向当前对象的指针，`self` 是指向当前类的指针，`parent` 是指向父类的指针。

### this
this实例：
```php
class  Name {
    prvite $name; // 定义私有属性

    // 定义构造函数，用于初始化赋值
    function __construct( $name ) {
        $this -> name = $name; // 这里使用了this指针语句①
    }

    // 析构函数
    function __destruct() {}

    // 打印用户名成员函数
    function printName() {
        print( $this -> name ); // 再次使用了this指针语句②
    }
}

$obj1 = new Name('PBPHome'); // 实例化对象 语句③
$obj1 -> printName(); // 输出PBPHome

$obj2 = new Name('PHP'); // 第二次实例化对象
$obj2 -> printName(); // 输出PHP
```

上面的类分别在 语句①和语句② 中使用了 `this` 指针，那么当时 `this` 是指向谁呢？ 其实 `this` 是在实例化的时候来确定指向谁。比如第一次实例化的时候（语句③），那么 `this` 就是指向 `$obj1` 对象，那么执行语句②的打印时就把 `print($this->name)` 变成了 `print($obj1t->name)`，那么当然就输出了"PBPHome"。第二次实例化的时候，`print($this->name)` 变成了 `print($obj2->name)`，于是就输出了"PHP"。

所以说，**this 就是指向当前对象实例的指针，不指向任何其他对象或类。**

------

### self

首先要明白一点，**self 指向类本身**。一般 self 的使用来指向类中的静态变量(static)。

self 实例：

```php
class Counter {
    prvite static $firstCount = 0; // 语句①
    prvite $lastCount;

    function __construct() {
        $this -> lastCount = ++ slef::$firstCount; // 使用self来调用静态变量 语句②
    }

    function printLastCount() {
        print( $this -> lastCount );
    }
}

$obj = new Counter();
$obj -> printLastCount(); // 输出1
```

这里要注意两个地方语句①和语句②。我们在语句①定义了一个静态变量 `$firstCount`，那么在语句②的时候使用了 `self` 调用这个值，那么这时候我们调用的就是类自己定义的静态变量 `$firstCount`。我们的静态变量与下面对象的实例无关，它只是跟类有关，那么我调用类本身的的，就无法使用this来引用，因为 **self是指向类本身，与任何对象实例无关**。然后前面使用的this调用的是实例化的对象$obj，大家不要混淆了。

------

### parent

首先我们要明确，parent 是指向父类的指针，一般我们使用 **parent 来调用父类的构造函数**。

parent 实例：

```php
// 定义基础类 Animal
class Animal {
    public $name;

    public function __construct( $name ) {
        $this -> name = $name;
    }
}

// 定义派生类 Person 继承 Animal
class Person extends Animal {
    public $personSex;
    public $personAge;

    function __construct( $personSex, $personAge ) {
        parent::__construct('PBPHome'); // 使用parent调用了父类的构造函数 语句①
        $this -> personSex = $personSex;
        $this -> personAge = $personAge;
    }

    function printPerson() {
        print( $this -> name . 'is' . $this -> personSex . 'age is'. $this -> personAge );
    }
}

// 实例化 Person
$personObj = new Person('male', '21');
$personBoj -> printPerson(); // 输出结果：PBPHome is male,age is 21
```

成员属性都是 public（公有属性和方法，类内部和外部的代码均可访问）的，特别是父类的，这是为了供继承类通过 this 来访问。

关键点在语句①：`parent::__construct('heiyeluren')`，这时候我们就使用 `parent` 来调用父类的构造函数进行对父类的初始化，这样，继承类的对象就都给赋值了name为PBPHome。我们可以测试下，再实例化一个对象 $personObject1，执行打印后name仍然是PBPHome。

**总结：this 是指向对象实例的一个指针，在实例化的时候来确定指向； self 是对类本身的一个引用，一般用来指向类中的静态变量； parent 是对父类的引用，一般使用 parent 来调用父类的构造函数。**
