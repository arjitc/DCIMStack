<?php

/*
 * DB_HOST: database host, usually it's "127.0.0.1" or "localhost", some servers also need port info
 * DB_NAME: name of the database. please note: database and database table are not the same thing
 * DB_USER: user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT.
 * DB_PASS: the password of the above user
 */

define("DB_HOST", "127.0.0.1");
define("DB_NAME", "dbname");
define("DB_USER", "root");
define("DB_PASS", "mysql");

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
