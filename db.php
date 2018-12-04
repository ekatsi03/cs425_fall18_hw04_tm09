<?php
/*
$user = 'root';
$pass = '';
$db = 'testdb';

//$db = new mysql('localhost', $user, $pass, $db)or die("Unable to connect");
$conn = mysqli_connect('localhost', $user, $pass);

if(! $conn ) {
    die('Could not connect: ' . mysqli_error());
}/*else
    echo "Database connected!";*/

    $host    = 'localhost';
    $db      = 'testdb';
    $user    = 'root';
    $pass    = '';
    $charset = 'utf8';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            ];
    
    
    $dbh = new PDO($dsn, $user, $pass, $opt);
?>