<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$dotenv = parse_ini_file(__DIR__ . '/.env');

$servername = $dotenv['DB_SERVER'];
$username = $dotenv['DB_USERNAME'];
$password = $dotenv['DB_PASSWORD'];
$dbname = $dotenv['DB_NAME'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexion fallida: ". mysqli_connect_error());
}
?>
