<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once('./database.php');
require_once('./env.php');

// first of all, login page
// require_once("./views/pages/login.php");
require_once('./contacts.php');
