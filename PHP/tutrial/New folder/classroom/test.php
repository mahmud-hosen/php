
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'classroom');



// create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// check connection

if($conn==true){
    echo "Connected";

    
    $query = "SELECT student.name,submission.grade FROM student INNER JOIN submission ON student.userId=submission.userId";
                  
    $run_query= mysqli_query($conn,$query);

    $data_count=mysqli_num_rows($run_query);
                 if($run_query==true){
                     while($data = mysqli_fetch_array($run_query)){


                        echo $data["name"].$data["grade"];
                     }

 }
else{
    echo "not Connected";

}
}



?>