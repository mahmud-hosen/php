<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="checkbox" name="colors[]" value="red" id="color_red" <?php isChecked('red') ?> />
        <label for="color_red">Red</label>

        <input type="checkbox" name="colors[]" value="green" id="color_green" <?php isChecked('green') ?> />
        <label for="color_red">Green</label>

        <input type="checkbox" name="colors[]" value="blue" id="color_blue" <?php isChecked('blue') ?> />
        <label for="color_red">Blue</label>
            <input type="submit" value="Submit">
   </form>
</body>
</html>

<?php
function isChecked($inputName)
{
    if(isset($_POST['colors']) && in_array($inputName,$_POST['colors']) )
    {
        echo "checked";
    }
}

 if(isset($_POST['colors']))
 {
    $x=[];
    $x = $_POST['colors'];
    for($i=0; $i<count($x); $i++)
    {
        echo $x[$i]."<br>";
    }
    // print_r($x);
}



?>