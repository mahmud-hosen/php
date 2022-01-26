<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if($conn==true){
    echo "Connected";
}
else{
    echo "not Connected";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <!-- SELECT studentName,quizAvg,assigAvg,Attd,Mid,Final,Others,Total,Grade FROM users; -->

    
    <table border="1" >
        <thead>
            <tr>
                <th>Student name</th>
                <th>Quiz</th>
                <th>Assig</th>
                <th>Attd</th>
                <th>Mid</th>
                <th>Final</th>
                <th>Others</th>
                <th>Total</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
             <?php
     $query = "SELECT studentName,quizAvg,assigAvg,Attd,Mid,Final,Others,Total,Grade FROM users;";
      $result = mysqli_query($conn, $query);
       if($result==true){
           ?>
           
               
                   <?php  while($data = mysqli_fetch_array($result)){ ?>
                         <tr>
                          <td> <?php echo $data["studentName"]; ?></td>
                          <td> <?php echo $data["quizAvg"]; ?></td>
                          <td> <?php echo $data["assigAvg"]; ?></td>
                          <td> <?php echo $data["Attd"]; ?></td>
                          <td> <?php echo $data["Mid"]; ?></td>
                          <td> <?php echo $data["Final"]; ?></td>
                          <td> <?php echo $data["Others"]; ?></td>
                          <td> <?php echo $data["Total"]; ?></td>
                          <td> <?php echo $data["Grade"]; ?></td>
                        </tr>
                     
                     <?php
                    }
                  }
                ?>
               
           
        </tbody>
    </table>




    <?php


    ?>
    
</body>
</html>