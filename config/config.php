<?php

/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'db_kasir';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

function rupiah($val)
{
    return "Rp" . number_format($val, 0, ',', '.');
}