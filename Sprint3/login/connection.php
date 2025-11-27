<?php

$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "peca_rara_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){echo "Connection error <br> <br>";}