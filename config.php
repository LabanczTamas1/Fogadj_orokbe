<?php

// Enable development mode (set to false for production)
$GLOBALS['DEV_MODE'] = true;

// Database connection details
$GLOBALS['DB_HOST'] = '127.0.0.1';
$GLOBALS['DB_USER'] = 'root';
$GLOBALS['DB_PASS'] = '';
$GLOBALS['DB_NAME'] = 'fogadj_orokbe';
$GLOBALS['DB_PORT'] = '3306';

// Base directory of the project
$GLOBALS['BASE_DIR'] = realpath(__DIR__);

// Handling URL construction, fallback to default values in case $_SERVER is not fully populated (e.g., in CLI or testing environments)
$serverName = $_SERVER['SERVER_NAME'] ?? 'localhost'; // Fallback to 'localhost' if SERVER_NAME is not set
$requestUri = $_SERVER['REQUEST_URI'] ?? '/'; // Fallback to '/' if REQUEST_URI is not set

$GLOBALS['URL'] = 'http://' . $serverName . $requestUri;

// Set BASE_URL depending on development mode
$GLOBALS['BASE_URL'] = $GLOBALS['DEV_MODE'] ? 'http://localhost' : 'http://' . $serverName . $requestUri;