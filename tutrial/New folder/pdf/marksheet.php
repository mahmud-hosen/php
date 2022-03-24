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
 //index.php
 //include autoloader

require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

$html = '
 <style>
table {
    text-align: center;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
    font-size: 22px;
    
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    text-align: left;
    padding: 5px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

';

$html .='<table border="1" style=" text-align: center;  ">
    <tr style="">
    <th>Student name</th>
    <th>Quiz</th>
    <th>Assig </th>
    <th>Attd </th>
    <th>Mid </th>
    <th>Final </th>
    <th>Others </th>
    <th>Total </th>
    <th>Grade </th>
  
    </tr>';
         $query = "SELECT studentName,quizAvg,assigAvg,Attd,Mid,Final,Others,Total,Grade FROM users;";
      $result = mysqli_query($conn, $query);
       if($result==true){
    while($row = mysqli_fetch_array($result)){
        
        $html .='<tr>
            <td>'.$row['studentName'].'</td>
             <td>'.$row['quizAvg'].'</td>
              <td>'.$row['assigAvg'].'</td>
               <td>'.$row['Attd'].'</td>
                <td>'.$row['Mid'].'</td>
                 <td>'.$row['Final'].'</td>
                  <td>'.$row['Others'].'</td>
                   <td>'.$row['Total'].'</td>
                    <td>'.$row['Grade'].'</td>
            </tr>';
    }
}
$html .= '</table>';

$document->loadHtml($html);

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("mahmudhosssain", array("Attachment"=>0));


?>