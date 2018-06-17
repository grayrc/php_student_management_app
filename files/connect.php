<?php
include 'connection.inc.php';
try
{
    $pdo = new PDO("mysql:host=$host;dbname=$database", $userMS, $passwordMS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
    $error = "Connection to database failed";
    include 'error.html.php';
    exit();
}
?>
