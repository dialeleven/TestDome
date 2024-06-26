<?php
// Mat__o
function sum_of_digits( $dob )
{
   $sum = 0;

   //Insert your code here
   // convert date string into array
   $date_arr = explode('-', $dob);

   // make sure date is valid
   // Validate date using DateTime
   $date = DateTime::createFromFormat('Y-m-d', $dob);

   // no date entered or invalid format
   if (!$date || $date->format('Y-m-d') !== $dob) {
      //echo "Invalid date: $dob\n";
      return false;
   }

   // Convert date components to a single string of digits
   $dateString = str_replace('-', '', $dob);

   // Calculate the sum of the digits
   $sum = array_sum(array_map('intval', str_split($dateString)));

  // if total is greater than 20, cap the reward at $20, otherwise the sum is the reward
  $reward = ($sum > 20) ? 20 : $sum;
  
  return $reward;
}

echo 'Reward is: ' . sum_of_digits('1970-01-01') . "<br>\n";
echo 'Reward is: ' . sum_of_digits('1950-12-31') . "<br>\n";
echo 'Reward is: ' . sum_of_digits('1950x-12-31') . "<br>\n";
?>