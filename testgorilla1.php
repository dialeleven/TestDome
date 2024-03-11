<?php
function sum_of_digits( $dob )
{
   $sum = 0;

   //Insert your code here
   // convert date string into array
   $date_arr = explode('-', $dob);

   // make sure date is valid
   if (! checkdate($date_arr[1], $date_arr[2], $date_arr[0]) )
      return false;

   // split year into single digit arr
   $year_digits_arr = str_split($date_arr[0], 1);

   // split month into single digit arr
   $month_digits_arr = str_split($date_arr[1], 1);

   // split day into single digit arr
   $day_digits_arr = str_split($date_arr[2], 1);

   // consolidate our year/month/day arrays into one for processing
   $date_arrays = [$year_digits_arr, $month_digits_arr, $day_digits_arr];

   // loop through our date arrays (year, month, day)
   foreach ($date_arrays as $ymd_arr)
      // loop through each year/month/day array of individual digits (e.g. 4x year digits, 2x month, 2x day)
      // and add up each digit as the sum for the reward payout
      foreach ($ymd_arr as $digits_arr)
         $sum += $digits_arr;
  
   /*
   // sum up the year digits
   foreach ($year_digits_arr as $val)
      $sum += $val;

   // sum up the month digits
   foreach ($month_digits_arr as $val)
      $sum += $val;

   // sum up the day digits
   foreach ($day_digits_arr as $val)
      $sum += $val;
   */

  // if total is greater than 20, cap the reward at $20, otherwise the sum is the reward
  $reward = ($sum > 20) ? 20 : $sum;
  
  return $reward;
}

echo sum_of_digits('1970-01-01') . "\n";
echo sum_of_digits('1950-12-31') . "\n";
?>