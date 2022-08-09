<?php


$name = "Jamal";
echo 'I am single quoted. It can not parse. Like $name \n';

echo " \nI am double quated. My name is $name \n\n";

//Basic Heredoc
// no indentation
echo <<<END
      a
     b
    c
\n
END;


//Example Nowdoc string quoting 

echo <<<'EOD'
Example of string spanning multiple lines
using nowdoc syntax. Backslashes are always treated literally,
e.g. \\ and \'.
EOD;