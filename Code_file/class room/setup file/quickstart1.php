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

        $client = getClient();
        $service = new \Google_Service_Classroom($client);
        $courseId = '328776504166';
        $courseWorkId = '361223650991';
        $id = 'Cg0IiOu99CkQr_3t1MEK';
        $post_body = new \Google_Service_Classroom_StudentSubmission(array(
            'assignedGrade' => '20',
            'draftGrade' => '90'

        ));
        $params = array(
            'updateMask' => 'assignedGrade,draftGrade'
          );
        $list = $service->courses_courseWork_studentSubmissions->patch($courseId, $courseWorkId, $id, $post_body,$params);


        //
        
    

// $client = getClient();
// $service = new Google_Service_Classroom($client);
// $courseId = '328776504166';
// $course = new Google_Service_Classroom_Course(array(
//   'section' => 'Period 5',
//   'room' => '406'
// ));
// $params = array(
//   'updateMask' => 'section,room'
// );
// $course = $service->courses->patch($courseId, $course, $params);
// printf("Course '%s' updated.\n", $course->name);