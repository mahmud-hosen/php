<?php

// File read 
$ourfile = fopen("test.txt","r");
echo fread($ourfile,filesize("test.txt"));
fclose($ourfile);

// 1st Line show 
echo "<br/>";
echo "<br/>1st Line show <br/>";
$ourfile = fopen("test.txt","r");
echo fgets($ourfile,filesize("test.txt"));
fclose($ourfile);


// 1st character show 
echo "<br/>";
echo "<br/>1st character show<br/>";
$ourfile = fopen("test.txt","r");
echo fgetc($ourfile);
fclose($ourfile);

//


// 1st to last show  END of file
echo "<br/>";
echo "<br/>END of file :<br/>";
$ourfile = fopen("test.txt","r");
while(!feof($ourfile))
{
    echo fgets($ourfile);

}

fclose($ourfile);



// 1st character show 
echo "<br/>";
echo "<br/>Character by Character Show :<br/>";
$ourfile = fopen("test.txt","r");
while(!feof($ourfile))
{
    echo fgetc($ourfile)."<br/>";

}

fclose($ourfile);





?>