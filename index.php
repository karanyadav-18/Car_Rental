<?php

// session_start();
// include("components/Pages/dashboard.php");
// include("components/Pages/booking.php");
?>
<?php
session_start();

// Get the clean request path
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = trim($request, '/');
$request = explode('/', $request);
$request = end($request);

switch (strtolower($request)) {
    case 'dashboard':
    case 'index.php':
    case '':
        require 'components/Pages/dashboard.php';
        break;
    case 'login':
        require 'components/Authentication/login.php';
        break;
    case 'booking':
        require 'components/Pages/booking.php';
        break;
    default:
        http_response_code(404);
        require 'components/Pages/404.php'; // Better to have a 404 page
        exit;
}
?>