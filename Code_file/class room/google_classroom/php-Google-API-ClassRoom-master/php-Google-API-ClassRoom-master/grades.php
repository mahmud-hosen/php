<?php
//for debug time
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

require __DIR__ . '/vendor/autoload.php';
//for debug time
set_time_limit(1000); //

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


// Get the API client and construct the service object.


// Print the first 10 courses the user has access to.
$optParams = array(
    'pageSize' => 1000
);

function getEmail($service, $userID)
{
    return $service->userProfiles->get($userID)->getEmailAddress();
}

function getDepartment($service, $userID)
{
    return $service->userProfiles->get($userID)->getName()->getFullName();
}

function getStudent($service, $courseID)
{
    return $service->courses_students->listCoursesStudents($courseID)->getStudents();
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

function test($courseID)
{
    $client = getClient();
    $service = new Google_Service_Classroom($client);

    //test
    /*$courseWorkID = getCourseWorkID($service, $courseID);
    $discipline = $service->courses->get($courseID)->getName();*/

    //test


    $assignedGrades = [];
    $result = [];

    $studentsFullNames = getStudentsFullNames($service, $courseID);

    $courseWorkID = getCourseWorkID($service, $courseID);
    $studentSubmissions = getStudentSubmissions($service, $courseID, $courseWorkID);

    for ($i = 0; $i < count($studentSubmissions); $i++) {
        $assignedGrades[$i] = getAssignedGrades($service, $courseID, $courseWorkID, $studentSubmissions[$i]);
    }

    foreach ($assignedGrades as $assignedGrade) {
        foreach ($assignedGrade as $grade) {
            $result[] = $grade;
        }
    }

    return $result;
    //return $studentSubmissions;
    //return $discipline;
}

function getCourseWorkType($service, $courseID, $courseWorkID){
    $client = getClient();
    $service = new Google_Service_Classroom($client);
    $courseWorks = $service->courses_courseWork->listCoursesCourseWork($courseID)->getCourseWork();
    //$courseWorks = $service->courses_courseWork->get($courseID, $courseWorkID)->getTitle();

    $courseWorkTypes = [];
    for ($i = 0; $i < count($courseWorks); $i++){
        $courseWorkTypes[$i] = $courseWorks[$i]->getTitle();
    }

    //return $service->courses_courseWork->get()->getWorkType();
    return $courseWorkTypes;
}

function getSection($service, $courseID){
    /*$client = getClient();
    $service = new Google_Service_Classroom($client);*/
    return $service->courses->get($courseID)->getSection();
}

function getCourseTeachers($service, $courseID){
    /*$client = getClient();
    $service = new Google_Service_Classroom($client);*/
    return $service->courses_teachers->listCoursesTeachers($courseID)->getTeachers();
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

    return $studentSubmissions;
}

function getAssignedGrades($service, $courseID, $courseWorkID, $studentSubmissions)
{
    /*$client = getClient();
    $service = new Google_Service_Classroom($client);*/

    $assignedGrades = [];
    if (is_null(getCourseWorkType($service,$courseID,$courseWorkID))){
        $courseWorkType = "NULL";
    }
    else {
        $courseWorkType = getCourseWorkType($service,$courseID, $courseWorkID);
    }

    for ($i = 0; $i < count($studentSubmissions); $i++) {
        /*if (is_null(getCourseWorkType($service,$courseID,$courseWorkID))){
            $courseWorkType = "NULL";
        }
        else {
            $courseWorkType = getCourseWorkType($service,$courseID, $courseWorkID);
        }*/

        $assignedGrades[$i] = array("userID" => getStudentByID($service, $studentSubmissions[$i]->getUserID()),
            "grade" => $studentSubmissions[$i]->getAssignedGrade(),
            //"workType" => print_r($courseWorkType)
            //"workType" => print_r($studentSubmissions[$i])
            //"title" => $studentSubmissions[$i]->getDriveFile()->getTitle()

        );
    }
    return $assignedGrades;
}

function getStudentsIDsSubmissions($studentSubmissions)
{
    $studentsIDs = [];
    for ($i = 0; $i < count($studentSubmissions); $i++) {
        $studentsIDs[$i] = $studentSubmissions[$i]->getUserID();
    }
    return $studentsIDs;
}


function getStudentsIDsCourses($service, $courseID)
{
    $studentsIDs = [];
    $students = $service->courses_students->listCoursesStudents($courseID)->getStudents();
    for ($i = 0; $i < count($students); $i++) {
        $studentsIDs[$i] = $students[$i]->getProfile()->getId();
    }
    return $studentsIDs;
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

function getContent()
{
    $client = getClient();
    $service = new Google_Service_Classroom($client);
    //$service->courses_students->listCoursesStudents($courseID)->getStudents()->getFullName();
    $output = "";
    $results = $service->courses->listCourses();


    if (count($results->getCourses()) == 0) {
        print "No courses found.\n";
    } else {

        $output .= "<table border = 1>";
        $output .= "<tr><th>Название ОП (Учебная группа)</th><th>Название дисциплины</th> <th>Статус курса</th> 
                <th>Дата создания курса</th> <th>Курс ID</th> <th>ownerID</th></tr>";
        $course = $results->getCourses();
        for ($i = 0; $i < count($course); $i++) {
            //foreach ($results->getCourses() as $course) {
            if ($course[$i]->getOwnerId() == 107618027634625870454) {
                $output .= "<tr><td>" . $course[$i]->getSection() . "</td> 
            <td>" . $course[$i]->getName() . "</td> 
            <td>" . $course[$i]->getCourseState() . "</td> 
            <td>" . $course[$i]->getCreationTime() . "</td> 
            <td>" . $course[$i]->getId() . "</td> 
            <td>" . $course[$i]->getOwnerId() . "</td>
            <td>";
                $st = getStudentFullName($service, $course[$i]->getId());
                for ($i = 0; $i < count($st); $i++) {
                    $output .= "<tr>" . $st[$i] . "</tr>";
                    $output .= "</td></tr>";
                }
            }
            $output .= "</table>";
        }
        return $output;
    }
}

$st =[];
if (isset($_GET['courseID'])) {

    $st = test($_GET['courseID']);
}
//$st = test(252565900353);

//print "<pre>".print_r($st)."</pre>";

//print "<pre>".var_export($st)."</pre>";

$client = getClient();
$service = new Google_Service_Classroom($client);

$studentGrade = [];
$studentNames = [];
$studentAvg = [];

print "ҚАЗАҚСТАН РЕСПУБЛИКАСЫ БІЛІМ ЖӘНЕ ҒЫЛЫМ МИНИСТРЛІГІ<br><br>";
print "«ҚАРАҒАНДЫ ИНДУСТРИЯЛЫҚ УНИВЕРСИТЕТІ» КеАҚ<br><br>";
print "№___ рейтинг ведомосі<br><br>";
print "Мамандық, оқу тобы: ".getSection($service, $_GET['courseID'])."<br><br>";
print "Пәннің аты: ".getCourseName($service, $_GET['courseID'])."<br><br>";
/*print "Оқытушылар және тең құқықтары бар есептік жазбалар:<br><br>";
$courseTeachers = getCourseTeachers($service, $_GET['courseID']);
//var_dump($courseTeachers);
//print_r($courseTeachers);
for ($i = 0; $i < count($courseTeachers); $i++){
    print " - ".$courseTeachers[$i]->getProfile()->getName()->getFullName()."<br>";
}*/

for ($i = 0; $i < count($st); $i++){
    $studentGrade[$i] = $st[$i];
    //print_r($studentGrade[$i]);
    //print_r($st[$i]);
}
//print_r($studentGrade);

for ($i = 0; $i < count($studentGrade); $i++){
    $studentNames[$i] = $studentGrade[$i]['userID'];
}
print "<br><br>";
$studentNames = array_unique($studentNames);
//print_r($studentNames);

for ($i = 0; $i < count($studentNames); $i++){
    $studentAvg[$i] = array(
        "studentName" => $studentNames[$i],
        "gradeAvg" => getGradeByName($studentNames[$i], $studentGrade),
    );
}

//print "<br><br>";
//print_r($studentAvg);
//print "<br><br>";

print "<table border =1>";
print "<tr><th>Студенттің тегі, аты-жөні</th><th>Аралық бақылау бағасы</th></tr>";
for ($i = 0; $i < count($studentAvg); $i++){
    print "<tr><td>".$studentAvg[$i]['studentName']."</td><td>".number_format($studentAvg[$i]['gradeAvg'], 1)."</td></tr>";
}
print "</table>";
/*
print "<br><br>";
print "<table border =1>";
print "<tr><th>Студенттің тегі, аты-жөні</th><th>Аралық бақылау бағасы</th></tr>";

foreach ($st as $key => $value) {
    print "<tr>";

    foreach ($value as $key => $val) {
        print "<td>" . $val . "</td>";
    }
    print "</tr>";
}
print "</table>";*/

//var_dump(test(252565900353));

//TODO A4 printable
//TODO remove empty courses
//todo print teacher name