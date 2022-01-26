<?php

 $request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/php/routes/':
        require __DIR__ . '/mahmud.php';
        break;

    case '/courses':
        require __DIR__ . '/views/courses.php';
        break;

    case '/views/authors':
        require __DIR__ . '/views/authors.php';
        break;

    case '/about':
        require __DIR__ . '/views/aboutus.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}