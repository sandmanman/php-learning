# PHP代码片段

**比例计算**
```php
    function gcd($a, $b) {
        if($a % $b)
            return gcd($b, $a % $b);
        else
            return $b;
    }
    $w = 150;
    $h = 90;
    $n = gcd($w, $h);
    echo $w/$n, ':', $h/$n;
```
