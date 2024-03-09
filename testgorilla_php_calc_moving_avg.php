<?php

// Function to calculate the moving average
function calc_mov_avg($size, $vect, $windowSize) {
    // Check for special case when window size is 1
    if ($windowSize == 1) {
        // Return a copy of the input array
        return [$size, $vect];
    }

    $n = $size + $windowSize - 1;
    $result = [];
    $sum = 0;

    // Calculate the initial sum of the first window
    for ($i = 0; $i < $windowSize; $i++) {
        $sum += $vect[$i];
    }

    // Set the first result
    $result[] = round($sum / $windowSize);

    // Calculate the moving averages for the remaining windows
    for ($i = $windowSize; $i < $size; $i++) {
        $sum = $sum - $vect[$i - $windowSize] + $vect[$i];
        $result[] = $sum / $windowSize;
    }

    return [$n, $result];
}


$mysize = 2;
$myvect = '1 2';
$mywindowsize = 1;

$mysize = 4;
$myvect = '1 2 3 4';
$mywindowsize = 3;


// Read size of the input array
#$size = trim(fgets(STDIN));
$size = trim($mysize);

// Read array elements
#$vect = array_map('intval', explode(' ', trim(fgets(STDIN))));
$vect = array_map('intval', explode(' ', trim($myvect)));

// Read window size
#$windowSize = trim(fgets(STDIN));
$windowSize = trim($mywindowsize);

// Calculate the moving averages
list($n, $result) = calc_mov_avg($size, $vect, $windowSize);

// Print the size of the result array
echo 'RESULT ARR: ' . $n . PHP_EOL;

// Print the result array without a space after the last element
echo implode(' ', $result) . PHP_EOL;
?>