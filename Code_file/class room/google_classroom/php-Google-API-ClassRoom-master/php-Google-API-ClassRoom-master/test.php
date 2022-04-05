<?php
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

$courseID = '252565900353';
$client = getClient();
$service = new Google_Service_Classroom($client);
//$courseWorkID = $service->courses_courseWork->listCoursesCourseWork($courseID)->getCourseWork();
$service->courses_courseWork_studentSubmissions->listCoursesCourseWorkStudentSubmissions($courseID, $courseWorkID)->getStudentSubmissions();

function getCourseWorkType($service, $courseID){
    $courseWorks = $service->courses_courseWork->listCoursesCourseWork($courseID)->getCourseWork();
    $courseWorkTypes = [];
    for ($i = 0; $i < count($courseWorks); $i++){
        $courseWorkTypes[$i] = $courseWorks[$i]->getTitle();
    }
    return $courseWorkTypes;
}

function getAssignedGrades($service, $courseID, $studentSubmissions)
{
    /*$client = getClient();
    $service = new Google_Service_Classroom($client);*/

    $assignedGrades = [];
    for ($i = 0; $i < count($studentSubmissions); $i++) {
        $assignedGrades[$i] = array("userID" => getStudentByID($service, $studentSubmissions[$i]->getUserID()),
            "grade" => $studentSubmissions[$i]->getAssignedGrade(),
            "workType" => getCourseWorkType($service,$courseID),
            "title" => $studentSubmissions[$i]->getTitle()

        );
    }
    return $assignedGrades;
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

function getCourseWorkType1($service, $courseID){
    //$courseWorks = $service->courses_courseWork->;
    $courseWorkTypes = [];
    for ($i = 0; $i < count($courseWorks); $i++){
        $courseWorkTypes[$i] = $courseWorks[$i]->getTitle();
    }
    return $courseWorkTypes;
}

function getCourseWorkID($service, $courseID)
{
    return $service->courses_courseWork->listCoursesCourseWork($courseID)->getCourseWork();
}

/*
$courseWorks = $service->courses_courseWork->get($courseID, $courseWorkID)->getId();
for ($i = 0; $i < count($courseWorks); $i++){
    print $courseWorks[$i]->getTitle()."<br>";
}*/




//$courseWorkID = $service->courses_courseWork_studentSubmissions->listCoursesCourseWorkStudentSubmissions($courseID, $courseWorkID);

/*$workTypes = [];
for ($i = 0; $i < count($courseWorkID); $i++){
    //print_r($courseWorkID[$i]->getMaterials());
    //var_dump($courseWorkID[$i]->getWorkType());
    $workTypes[$i] = $courseWorkID[$i]->getCourseWorkType();*/

/*    if (is_null($courseWorkID[$i]->getCourseWorkType())){
        print "NULL<br>";
    }
    else {
        //$workTypes[$i] = $courseWorkID[$i]->getAssignment()->getStudentWorkFolder()->getTitle();
        $workTypes[$i] = $courseWorkID[$i]->getCourseWorkType();
    }*/

//}

//print_r($workTypes);
/*
for ($i = 0; $i < count($workTypes); $i++){
    //print_r($workTypes[$i]);
    var_dump($workTypes[$i]);
    //print($workTypes[$i]);
}*/



/*$client = getClient();
    $service = new Google_Service_Classroom($client);*/

//print_r(getCourseWorkType($service, $courseID));

$courseWorkID = getCourseWorkID($service, $courseID);
$studentSubmissions =  getStudentSubmissions($service, $courseID, $courseWorkID);
//print_r($studentSubmissions);
$assignedGrades = [];
$studentSubmissions1 = [];
for ($i = 0; $i < count($studentSubmissions); $i++) {
    $studentSubmissions1[$i] = $studentSubmissions[$i];
    /*$assignedGrades[$i] = array(
        "grade" => $studentSubmissions[$i]->getAssignedGrade(),
        "workType" => getCourseWorkType($service,$courseID),
        "title" => $studentSubmissions[$i]->getTitle()

    );*/
}

for ($i = 0; $i < count($studentSubmissions1); $i++){
    print_r($studentSubmissions1[$i]->getAssignedGrade());
}