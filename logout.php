<?php
if (session_id() === '') session_start();

session_destroy();

header('Location: http://localhost:8080/middle');
