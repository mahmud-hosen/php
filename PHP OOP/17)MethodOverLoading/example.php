<?php

class Calculator {
	
	function __call($name_of_function, $arguments) {
			
		if($name_of_function == 'Add') {
			
			switch (count($arguments)) {
					
				case 2:
					echo $arguments[0]+$arguments[1];
                    break;
						
				case 3:
					echo $arguments[0]+$arguments[1]+$arguments[2];
                    break;
                default:
                echo "No match";
                    break;
			}
		}
	}
}
	
$c = new Calculator;

$c->Add(2,3);
$c->Add(2,5,5);


?>
