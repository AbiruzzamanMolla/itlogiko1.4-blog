<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbuser = "db_blog";

// Create connection
$db = new mysqli($servername, $username, $password, $dbuser);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
