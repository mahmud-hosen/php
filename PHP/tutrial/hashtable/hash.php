<?php

$student = [
    '7000' => 'jamal',
    '7001' => 'kamal',
    '7002' => 'moly'

];

$courseWork = [
    '3000' => 'Quiz-1',
    '3001' => 'Quiz-2',
    '3002' => 'Quiz-3'
];



$submission = array();
$submission = [
    '7000'=>[
        '3000' => [
            'courseId' => '100',
            'courseWorkId' => '3000',
            'gradeID' => '5000',
            'userId' => '7000',
            'grade' => '12'
            ],
        '3001' => [
            'courseId' => '100',
            'courseWorkId' => '3001',
            'gradeID' => '5003',
            'userId' => '7000',
            'grade' => '15'
            ],
        '3002' => [
            'courseId' => '100',
            'courseWorkId' => '3002',
            'gradeID' => '5006',
            'userId' => '7000',
            'grade' => '11'
            ],
        ],

    '7001'=>[
        '3000' => [
            'courseId' => '100',
            'courseWorkId' => '3000',
            'userId' => '7001',
            'gradeID' => '5001',
            'grade' => '14'
            ],
        '3001' => [
            'courseId' => '100',
            'courseWorkId' => '3001',
            'userId' => '7001',
            'gradeID' => '5004',
            'grade' => '12'
            ],
        '3002' => [
            'courseId' => '100',
            'courseWorkId' => '3002',
            'userId' => '7001',
            'gradeID' => '5007',
            'grade' => '15'
            ],
        ],
  
];

// echo '<pre>';
// print_r($submission['7001']['3002']['grade']) ;

    //    echo '<pre>';
    //    print_r( $submission );
// foreach($courseWork as $courseWork_key => $courseWork_val){
//     echo $courseWork_key."=".$courseWork_val;
// }

// foreach( $submission as $submission_key => $submission_val){
    
//     foreach( $submission_val as $subkey => $subval){
//         echo $subkey." = ".$courseWork[$subval['courseWorkId']]."=".$student[$subval['userId']]."</br>";
//        // echo $courseWork[$subval];
//         // echo $submission['5002']['Grade'];

    
//  }
// }

// echo $submission['5002']['Grade'];
$food = array();
$food = [
    'category1'=>[ 
        'food1'=>'mango',
         'food2'=>'apple',
         'food3'=> 'banana',
    ],
     'category2' =>[ 
         'food1'=>'mango',
         'food2'=>'apple',
         'food3'=> 'banana',
     ],

];

foreach($food as $category => $item){
  
   
}
     

    //        echo '<pre>';
    //    print_r( $key );







?>