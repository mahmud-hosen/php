<?php

$createfile = fopen("new.txt","w");
$text = "My name is mahmud. I live in dhaka.I have three brother.";
fwrite($createfile,$text);
fclose($createfile);

?>