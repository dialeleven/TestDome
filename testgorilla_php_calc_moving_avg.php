<?php

// Function to calculate the moving average
function calc_mov_avg($size, $vect, $windowSize) {
    // Check for special case when window size is 1
    if ($windowSize == 1) {
        // Return a copy of the input array
        return [$size, $vect];
    }

    $result = [];
    $sum  = 0;
    
    // Calculate the initial sum of the first window
    for ($i = 0; $i < $windowSize; $i++) {
        $sum += $vect[$i];
    }

    // Set the first result
    $result[] = ceil($sum / $windowSize);
    
    print('$result: ');
    print_r($result);

    // Calculate the moving averages for the remaining windows
    for ($i = $windowSize; $i < $size; $i++) {
        $sum = $sum - $vect[$i - $windowSize] + $vect[$i];
        $result[] = ceil($sum / $windowSize); // round up
    }

    #print_r($result);

    return [count($result), $result];
}


// EXAMPLE 1 - PASSED
$mysize = 4;
$myvect = '1 2 3 4';
$mywindowsize = 3;
/*
Expected output
2
2 3
*/

// EXAMPLE 3 - PASSED
$mysize = 3;
$myvect = '1 2 3';
$mywindowsize = 3;
/*
Expected output
1
2
*/


// EXAMPLE 2 - PASSED
$mysize = 4;
$myvect = '1 2 3 4';
$mywindowsize = 2;
/*
Expected output
3
2 3 4
*/

// EXAMPLE 4 - PASSED
$mysize = 2;
$myvect = '1 2';
$mywindowsize = 1;
/*
Expected output
2
1 2
*/


// Read size of the input array
#$size = trim(fgets(STDIN));
$size = trim($mysize);

// Read array elements
$vect = array_map('intval', explode(' ', trim($myvect)));
#$vect = array_map('intval', explode(' ', trim(fgets(STDIN))));

// Read window size
$windowSize = trim($mywindowsize);
#$windowSize = trim(fgets(STDIN));

// Calculate the moving averages
list($n, $result) = calc_mov_avg($size, $vect, $windowSize);

// Print the size of the result array
#echo $n . PHP_EOL;
echo "<pre>RESULT ARR:\n" . $n . PHP_EOL;

// Print the result array without a space after the last element
echo implode(' ', $result) . PHP_EOL;
?>