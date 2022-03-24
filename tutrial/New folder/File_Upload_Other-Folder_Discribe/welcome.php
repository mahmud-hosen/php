

<pre>

<?php
          

$f_name = $_FILES["profailphoto"];

$file_name = $f_name["name"];
$file_type = $f_name["type"]; 
$file_size = $f_name["size"];
$file_tmpname = $f_name["tmp_name"];


//  Uploaded_File_Details 

echo "File_Name: ". $file_name;
echo  "<br/>";
echo "File_Type: ". $file_type;
echo  "<br/>";
echo "File_Path: ". $file_tmpname;
echo  "<br/>";

$convert_file_size = floor($file_size/1024);

if($convert_file_size>1024){

echo "File_size".($convert_file_size/1024)."MB";

}
else{

echo "File_size".floor($convert_file_size)."KB";

}




// Img Upload in folder

echo  "<br/>";
move_uploaded_file($file_tmpname,"tmp/$file_name");


// Img show in Display

echo  "<br/>";
    echo"<img src='tmp/$file_name'/>";



?>
</pre>

