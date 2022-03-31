<!DOCTYPE html>
<html>
    <head>
        <title>Day 1</title>
    </head>
    <body>
        <div>In ra dãy số từ 1 tới 100 bằng <i>PHP</i></div>
        <div class="container">
           <?php
            for ($i=1; $i<=100; $i++){
              echo($i . ' ');
              if ($i%10 == 0){
                echo('<br>');
              }
            }
           ?>
        </div>
    </body>
</html>