<?php 
$host = "localhost";
$port = "5432";
$dbname = "mercado";
$user = "postgres";
$password = "123456"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string) or die('failed');     
?>