<?php

$user = 'root';
$pass = '';
$db = 'testdb';

//$db = new mysql('localhost', $user, $pass, $db)or die("Unable to connect");
$conn = mysqli_connect('localhost', $user, $pass);

if(! $conn ) {
    die('Could not connect: ' . mysqli_error());
}/*else
    echo "Database connected!";*/

?>