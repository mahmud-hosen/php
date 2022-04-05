<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Google Classroom </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



</head>

<body>

<?php


require __DIR__ . '/vendor/autoload.php';

 // if (php_sapi_name() != 'cli') {
 //     throw new Exception('This application must be run on the command line.');
 // }

 /**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
   $client = new Google_Client();
   $client->setApplicationName('Google Classroom API & PHP');
   $client->setScopes(Google_Service_Classroom::CLASSROOM_COURSES_READONLY);
   $client->addScope(Google_Service_Classroom::CLASSROOM_PROFILE_EMAILS);
   $client->addScope(Google_Service_Classroom::CLASSROOM_ROSTERS);
   $client->addScope(Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS_READONLY);
   $client->addScope(Google_Service_Classroom::CLASSROOM_STUDENT_SUBMISSIONS_STUDENTS_READONLY);
   $client->setAuthConfig('credentials.json');
   $client->setAccessType('offline');
   $client->setPrompt('select_account consent');

   // Load previously authorized token from a file, if it exists.
   // The file token.json stores the user's access and refresh tokens, and is
   // created automatically when the authorization flow completes for the first
   // time.
   $tokenPath = 'token.json';
   if (file_exists($tokenPath)) {
       $accessToken = json_decode(file_get_contents($tokenPath), true);
       $client->setAccessToken($accessToken);
   }

   // If there is no previous token or it's expired.
   if ($client->isAccessTokenExpired()) {
       // Refresh the token if possible, else fetch a new one.
       if ($client->getRefreshToken()) {
           $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
       } else {
           // Request authorization from the user.
           $authUrl = $client->createAuthUrl();
           printf("Open the following link in your browser:\n%s\n", $authUrl);
           print 'Enter verification code: ';
           $authCode = trim(fgets(STDIN));

           // Exchange authorization code for an access token.
           $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
           $client->setAccessToken($accessToken);

           // Check to see if there was an error.
           if (array_key_exists('error', $accessToken)) {
               throw new Exception(join(', ', $accessToken));
           }
       }
       // Save the token to a file.
       if (!file_exists(dirname($tokenPath))) {
           mkdir(dirname($tokenPath), 0700, true);
       }
       file_put_contents($tokenPath, json_encode($client->getAccessToken()));
   }
   return $client;
}

//.............................................................

//  $client = getClient();
//  $service = new Google_Service_Classroom($client);


//  $courseId = "328776504166";
//  $courseWorkId = "361223650991";

//  $results = $service->courses_courseWork_studentSubmissions->listCoursesCourseWorkStudentSubmissions($courseId, $courseWorkId);

//  foreach ($results->studentSubmissions as $r => $submission) {
//      $student = $service->courses_students->get($courseId, $submission->userId);
//      $studentName = $student->profile->name->fullName;
//      print($studentName . ": ");
//      print($submission->assignedGrade. "\n");
//  }







//-------------------------Test_Function--------------------------

function test($courseID)
{
   $client = getClient();
   $service = new Google_Service_Classroom($client);

   $assignedGrades = [];
   $result = [];
   $course_type = [];

   $courseWorkID = getCourseWorkID($service, $courseID);

  

   // echo '<pre>';
   // print_r($courseWorkID);

   $studentSubmissions = getStudentSubmissions($service, $courseID, $courseWorkID); 
   
   // echo '<pre>';
   // print_r($courseWorkID);

   for ($i = 0; $i < count($studentSubmissions); $i++) {
       $assignedGrades[$i] = getAssignedGrades($service, $courseID, $courseWorkID, $studentSubmissions[$i]);
   }

   foreach ($assignedGrades as $assignedGrade) {

       foreach ($assignedGrade as $grade) {

           $result[] = $grade;
       }
   }
   

   return $result;


}


function getAssignedGrades($service, $courseID, $courseWorkID, $studentSubmissions)
{
   

   $assignedGrades = [];
   if (is_null(getCourseWorkType($service,$courseID,$courseWorkID))){
       $courseWorkType = "NULL";
   }
   else {
       $courseWorkType = getCourseWorkType($service,$courseID, $courseWorkID);
   }

   for ($i = 0; $i < count($studentSubmissions); $i++) {
      

       $assignedGrades[$i] = array(
           "userID" => getStudentByID($service, $studentSubmissions[$i]->getUserID()),
           "grade" => $studentSubmissions[$i]->getAssignedGrade(),
         //  "type" => $courseWorkType[$i],
          

       );

   }

   // echo '<pre>';
   // return print_r($assignedGrades);


   return $assignedGrades;
}


function getCourseWorkType($service, $courseID, $courseWorkID){
 $client = getClient();
 $service = new Google_Service_Classroom($client);
 $courseWorks = $service->courses_courseWork->listCoursesCourseWork($courseID)->getCourseWork();
 //$courseWorks = $service->courses_courseWork->get($courseID, $courseWorkID)->getTitle();

   // echo '<pre>';
   //  return print_r($courseWorks);

 $courseWorkTypes = [];
 for ($i = 0; $i < count($courseWorks); $i++){
     $courseWorkTypes[$i] = $courseWorks[$i]->getTitle();
 }


//   for ($i = 0; $i < count($courseWorks); $i++) {
      

//     $course_type[$i] = array(
//         "ID" => $courseWorks[$i]->getId(),
//         "type" => $courseWorks[$i]->getTitle(),

//     );

// }

   //  echo '<pre>';
   // return print_r($course_type);
 

 //return $service->courses_courseWork->get()->getWorkType();
 return $courseWorkTypes;
}

function getStudentFullName($service, $courseID)
{
   $student = getStudent($service, $courseID);
   $studentFullName = [];
   for ($i = 0; $i < count($student); $i++) {
       $studentFullName[$i] = $student[$i]->getProfile()->getName()->getFullName();
   }

   return $studentFullName;
}

function getSection($service, $courseID){

 return $service->courses->get($courseID)->getSection();
}

function getCourseName($service, $courseID){
 /*$client = getClient();
 $service = new Google_Service_Classroom($client);*/
 return $service->courses->get($courseID)->getName();
}

function getStudentByID($service, $userID)
{
   return $service->userProfiles->get($userID)->getName()->getFullName();
   
}

function getCourseWorkID($service, $courseID)
{
   return $service->courses_courseWork->listCoursesCourseWork($courseID)->getCourseWork();
   
}

function getStudentSubmissions($service, $courseID, $courseWorkID)
{
   /*$client = getClient();
   $service = new Google_Service_Classroom($client);*/

   $studentSubmissions = [];

   for ($i = 0; $i < count($courseWorkID); $i++) {
       $studentSubmissions[$i] = $service->courses_courseWork_studentSubmissions->
       listCoursesCourseWorkStudentSubmissions($courseID, $courseWorkID[$i]->getId())->getStudentSubmissions();
   }


   // echo '<pre>';
   // print_r($studentSubmissions);

  return $studentSubmissions;

}

function getStudentsFullNames($service, $courseID)
{
   $studentsFullNames = [];
   $students = $service->courses_students->listCoursesStudents($courseID)->getStudents();
   for ($i = 0; $i < count($students); $i++) {
       $studentsFullNames[$i] = $students[$i]->getProfile()->getName()->getFullName();
   }
   return $studentsFullNames;
}


function getGradeByName($studentName, $studentGrade){
 $sum = 0;
 $k = 0;
 for ($i = 0; $i < count($studentGrade); $i++){
     if ($studentName == $studentGrade[$i]['userID']){
         if (!is_null($studentGrade[$i]['grade'])){
             $sum = $sum + $studentGrade[$i]['grade'];
             $k++;
         }
     }
 }
 if ($k == 0) {$k = 1;};
 return $sum/$k;
}


//  function getContent()
//  {
//     $client = getClient();
//     $service = new Google_Service_Classroom($client);
//     //$service->courses_students->listCoursesStudents($courseID)->getStudents()->getFullName();
//     $output = "";
//     $results = $service->courses->listCourses();


//     if (count($results->getCourses()) == 0) {
//         print "No courses found.\n";
//     } else {

//         $output .= "<table border = 1>";
//         $output .= "<tr><th>Название ОП (Учебная группа)</th><th>Название дисциплины</th> <th>Статус курса</th> 
//                 <th>Дата создания курса</th> <th>Курс ID</th> <th>ownerID</th></tr>";
//         $course = $results->getCourses();
//         for ($i = 0; $i < count($course); $i++) {
//             //foreach ($results->getCourses() as $course) {
//             if ($course[$i]->getOwnerId() == 107202882313307637336) {
//                 $output .= "<tr><td>" . $course[$i]->getSection() . "</td> 
//             <td>" . $course[$i]->getName() . "</td> 
//             <td>" . $course[$i]->getCourseState() . "</td> 
//             <td>" . $course[$i]->getCreationTime() . "</td> 
//             <td>" . $course[$i]->getId() . "</td> 
//             <td>" . $course[$i]->getOwnerId() . "</td>
//             <td>";
//                 $st = getStudentFullName($service, $course[$i]->getId());
//                 for ($i = 0; $i < count($st); $i++) {
//                     $output .= "<tr>" . $st[$i] . "</tr>";
//                     $output .= "</td></tr>";
//                 }
//             }
//             $output .= "</table>";
//         }
//         return $output;
//     }
//  }

$st =[];

//test(328776504166);

if(isset($_REQUEST["couse"])){
   $courseID = $_REQUEST["couse"];   
}
else{
    echo "No couse Found";
}

//  $courseID = 328776504166 ;
   $st = test($courseID);



//$st = test(252565900353);

   // echo '<pre>';
   // print_r($st);

// print "<pre>".print_r($st)."</pre>";
// print "<pre>".var_export($st)."</pre>";

$client = getClient();
$service = new Google_Service_Classroom($client);

$studentGrade = [];
$studentNames = [];
$studentAvg = [];

//print "<br><br>";


print "Course Name: ".getCourseName($service, $courseID)."<br><br>";
print "Section: ".getSection($service, $courseID)."<br><br>";



for ($i = 0; $i < count($st); $i++){
   $studentGrade[$i] = $st[$i];
   // echo '<pre>';
   // print_r($studentGrade[$i]);
   // echo '<pre>';
   // print_r($st[$i]);
}

// echo '<pre>';
// print_r($studentGrade);

for ($i = 0; $i < count($studentGrade); $i++){
   $studentNames[$i] = $studentGrade[$i]['userID'];
}


print "<br><br>";
$studentNames = array_unique($studentNames);


$total_number = 0;
$student = 0;
$avg_mark = 0;
for ($k = 0; $k < count($studentNames); $k++){
   echo $studentNames[$k];
   for ($i = 0; $i < count($studentGrade); $i++){
       if ($studentNames[$k] == $studentGrade[$i]['userID']){
           
           echo "| ".$studentGrade[$i]['grade']." |";
           $total_number = $total_number + $studentGrade[$i]['grade'];
           $student++;
          

       }
       
   }
    
       echo "Total Number =".$total_number." ||";
       $avg_mark=$total_number/$student;
       echo "Avg =".round($avg_mark, 2)."|"; 

       $total_number=0;
       $student=0;

   if($avg_mark >= 80 && $avg_mark <= 100){
       echo "Letter Grade: A+";
   }elseif($avg_mark >= 70 && $avg_mark <= 80){
       echo "Letter Grade: A";

   }elseif($avg_mark >= 60 && $avg_mark <= 70){
       echo "Letter Grade: A-";

   }elseif($avg_mark >= 50 && $avg_mark <= 60){
       echo "Letter Grade: B";

   }elseif($avg_mark >= 40 && $avg_mark <= 50){
       echo "Letter Grade: C";

   }elseif($avg_mark >= 33 && $avg_mark <= 40){
       echo "Letter Grade: D";

   }elseif($avg_mark < 33){
       echo "Fail";

   }else{
       echo "Not Result";
   }
   print "<br><br>";

   $avg_mark=0;
  
}





// echo '<pre>';
// print_r($studentNames);

for ($i = 0; $i < count($studentNames); $i++){
   $studentAvg[$i] = array(
       "studentName" => $studentNames[$i],
       "gradeAvg" => getGradeByName($studentNames[$i], $studentGrade),
   );
}

//print "<br><br>";
//print_r($studentAvg);
//print "<br><br>";





//  print "<table border =1>";
//  print "<tr><th>Student Name</th><th>Аvg</th></tr>";
//  for ($i = 0; $i < count($studentAvg); $i++){
//     print "<tr><td>".$studentAvg[$i]['studentName']."</td><td>".number_format($studentAvg[$i]['gradeAvg'], 1)."</td></tr>";
//  }
//  print "</table>";

// --------------------- test php in html---------

?>
  








</body>

</html>