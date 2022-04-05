<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Google Classroom </title>


    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- PHP API CODE START -->
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

 $client = getClient();
 $service = new Google_Service_Classroom($client);


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


//    echo '<pre>';
//    print_r($studentSubmissions);

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


//print "<br><br>";
$studentNames = array_unique($studentNames);



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




    <!-- PHP API CODE END -->





    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="https://img.icons8.com/color/48/000000/google-classroom.png" />
                </div>
                <div class="sidebar-brand-text mx-3">Google Classroom</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been
                                            having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>

                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Md Mahmud</span>
                                <img class="img-profile rounded-circle" src="img/mahmud.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h3 class="mb-2 text-center"><b>Course Name: </b><?php echo getCourseName($service, $courseID)   ?>
                    </h3>
                    <h4 class="mb-2 text-center"><b>Section: </b><?php echo getSection($service, $courseID)  ?> </h4>
                    <?php


                    ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">DataTable</h6>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center table-bordered" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>


                                        <tr>
                                            <th>Name</th>
                                            <th>Quiz 1</th>
                                            <th>Quiz 2</th>
                                            <th>Quiz 3</th>
                                            <th>Total Number</th>
                                            <th>Average</th>
                                            <th>Letter Grade</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php 

                                         $total_number = 0;
                                         $student = 0;
                                         $avg_mark = 0;  ?>

                                        <?php  for ($k = 0; $k < count($studentNames); $k++) { ?>

                                        <tr>
                                            <td><?php echo $studentNames[$k]; ?></td>

                                            <?php  for ($i = 0; $i < count($studentGrade); $i++){
                                                if ($studentNames[$k] == $studentGrade[$i]['userID']){ ?>

                                            <td> 
                                                

                                            <input type="text" class="form-control" style="width: 60px; text-align:center"
                                                    value="<?php  echo $studentGrade[$i]['grade']; ?> "> </td>

                                            <?php
                                                    $total_number = $total_number + $studentGrade[$i]['grade'];
                                                    $student++; 
                                        
                                                }                                               
                                            } 
                                             ?>


                                            <td><?php  echo $total_number;  ?> </td>

                                            <?php 
                                             $avg_mark=$total_number/$student;

                                             ?>

                                            <td> <?php echo round($avg_mark, 2); ?> </td>



                                            <?php 
                                               $total_number=0;
                                                $student=0;  ?>

                                            <td> <?php if($avg_mark >= 80 && $avg_mark <= 100){
                                                echo "A+";
                                            }elseif($avg_mark >= 70 && $avg_mark <= 80){
                                                echo "A";
                                         
                                            }elseif($avg_mark >= 60 && $avg_mark <= 70){
                                                echo "A-";
                                         
                                            }elseif($avg_mark >= 50 && $avg_mark <= 60){
                                                echo "B";
                                         
                                            }elseif($avg_mark >= 40 && $avg_mark <= 50){
                                                echo "C";
                                         
                                            }elseif($avg_mark >= 33 && $avg_mark <= 40){
                                                echo "D";
                                         
                                            }elseif($avg_mark < 33){
                                                echo "Fail";
                                         
                                            }else{
                                                echo "Not Result";
                                            } 
                                            
                                            $avg_mark=0;

                                            ?> </td>

                                            <td> <a href="#" class="btn btn-info"><i class="fas fa-edit">Update</i></a></td>

                                        </tr>

                                        <?php  } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>