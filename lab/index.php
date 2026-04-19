<?php
echo "<h2>Calculate Area & Perimeter</h2>";
$length = 10;
$width = 5;
$area = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Area = " . $area . "<br>";
echo "Perimeter = " . $perimeter;

echo "<h2>VAT Calculation</h2>";
$amount = 1000;
$vat = $amount * 0.15;
echo "VAT (15%) = $vat <br><br>";

echo "<h2>Odd or Even</h2>";
$num = 7;
if ($num % 2 == 0) {
    echo "$num is Even<br><br>";
} else {
    echo "$num is Odd<br><br>";
}