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
        <input type="file" name="photo" id="">
        <input type="submit" value="Submit">
    </form>
    
</body>
</html>

<?php
$imageType = ['image/jpg','image/png','image/jpge'];

$file = $_FILES["photo"];

echo $file_name = $file["name"];
echo $file_type = $file["type"]; 
echo $file_size = $file["size"];
echo $file_tmpname = $file["tmp_name"];

if(in_array($file_type,$imageType) !== false)
{
    move_uploaded_file($file_tmpname,"temp/$file_name");
}else{
    echo "File type not match";
}




?>