<?php

echo "<h2>1. Rectangle Calculation</h2>";
$length = 10;
$width = 5;
$area = $length * $width;
$perimeter = 2 * ($length + $width);
echo "Area = $area <br>";
echo "Perimeter = $perimeter <br><br>";

echo "<h2>2. VAT Calculation</h2>";
$amount = 1000;
$vat = $amount * 0.15;
echo "VAT (15%) = $vat <br><br>";

echo "<h2>3. Odd or Even</h2>";
$num = 7;
if ($num % 2 == 0) {
    echo "$num is Even<br><br>";
} else {
    echo "$num is Odd<br><br>";
}

echo "<h2>4. Largest of Three Numbers</h2>";
$a = 10;
$b = 25;
$c = 15;
if ($a >= $b && $a >= $c) {
    echo "Largest = $a<br><br>";
} elseif ($b >= $a && $b >= $c) {
    echo "Largest = $b<br><br>";
} else {
    echo "Largest = $c<br><br>";
}

echo "<h2>5. Odd Numbers from 10 to 100</h2>";
for ($i = 10; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
echo "<br><br>";

echo "<h2>6. Search in Array</h2>";
$arr = array(10, 20, 30, 40, 50);
$search = 30;
$found = false;

foreach ($arr as $value) {
    if ($value == $search) {
        $found = true;
        break;
    }
}

if ($found) {
    echo "Element $search Found<br><br>";
} else {
    echo "Element $search Not Found<br><br>";
}

echo "<h2>7. Patterns</h2>";

echo "<b>(a) Star Pattern</b><br>";
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<br><b>(b) Number Pattern</b><br>";
for ($i = 3; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}

echo "<br><b>(c) Alphabet Pattern</b><br>";
$char = 'A';
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $char . " ";
        $char++;
    }
    echo "<br>";
}

?>