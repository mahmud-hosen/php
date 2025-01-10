<?php



$infos = [
    '01-06-24' =>
        [
            'name' => 'Kamal', 
            'age' => 20
        ],
    '02-06-24' =>
        [
            'name' => 'jamal', 
            'age' => 20
        ],
    '03-06-24' =>
        [
            'name' => 'habib', 
            'age' => 20
        ],
    '04-06-24' =>
        [
            'name' => 'hasan', 
            'age' => 20
        ],
    ];


if (in_array("04-06-24", $infos, 1)){
  echo "Match found"." - 100";
}else{
    echo "Match not found"." - 100";   
}

?>