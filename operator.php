<?php 
$x = 2;
// pow 
echo pow($x, 2); // 8

// 2 x 2 = 4
// 2 x 2 x 2 = 8  // 3
// 2 x 2 x 2 x 2 = 16 // 4

$y = 2;
echo pow($y, 100); //

// assign value to variable

$q =  2;
echo $q; // 2

// assign with addition
echo "<br>";
$a = 2;
$b = 3 ;
$b += $a;  // addition assignment operator 
echo $b;  //5

// assign with subtraction
echo "<br>";
$c = 10;
$d = 5;
$d -= $c; // subtraction assignment operator
echo $d; // -5


echo "<br>";
$e = 2;
$f = 3;
$f *= $e; // multiplication assignment operator
echo $f; // 6

echo "<br>";
$g = 10;
$h = 5;
$h /= $g; // division assignment operator
echo $h; // 0.5

echo "<br>";
$i = 2;
$j = 3;
$j %= $i; // modulus assignment operator // remainder
echo $j; // 1