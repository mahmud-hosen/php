<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $options = ['BMW','Honda','Toyota'];
    //   print_r($selectedCar);

     if(isset($_REQUEST['cars']))
    {
        $selectedCar=[];
        $selectedCar = $_REQUEST['cars'];
        print_r($selectedCar);
    }

    ?>

    <form action="" method="POST">
        <select name="cars[]" multiple>
            <option selected >Please Select:</option>
             <?php  displayOption($options,$selectedCar);  ?>
        </select>
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>

<?php

function displayOption($options,$selectedCar)
{
  


    foreach($options as $option )
    {
        $selected = '';
        if(in_array($options,$selectedCar))
        {
            $selected = "selected";
        }
        printf("<option value='%s' %s >%s</option>",$option,$selected,$option);
    }

    
  
}

 

?>