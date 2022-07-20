<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post"  enctype="multipart/form-data" >
        <input type="file" name="photo[]" id="">
        <input type="file" name="photo[]" id="">
        <input type="file" name="photo[]" id="">

        <input type="submit" value="Submit">
    </form>
    
</body>
</html>

<?php
$imageType = ['image/jpg','image/png','image/jpge'];

if($_FILES['photo'])
{
    $totalFile = count($_FILES["photo"]["name"]);
    for($i=0; $i<$totalFile; $i++)
    {
        if(in_array($_FILES['photo']['type'][$i],$imageType) !== false)
        {
            move_uploaded_file($_FILES["photo"]["tmp_name"][$i],"./temp/".$_FILES["photo"]["name"][$i]);
        }else{
            echo "File type not match";
        }
    }
}



?>