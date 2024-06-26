<?php
?>
<script>
   numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

   for (let i = 0; i < numbers.length; i++) {
      if (i % 2 == 0 || i == 0)
         points += 1

      if (i % 3 == 0)
         points += 3

      if (i == 5)
         points += 5

   }
</script>