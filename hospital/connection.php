<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "hospital_records";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
