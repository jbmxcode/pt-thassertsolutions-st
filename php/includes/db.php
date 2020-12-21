<?php
// $mysqli = new mysqli("localhost", "root", "", "pt_thassertsolutions");
$mysqli = new mysqli("localhost", "root", "DWac5Y4WCQ1WHJ", "pt_thassertsolutions");

if($mysqli->connect_error) {
    exit('Error connecting to database');
}

if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
} else {
    printf("Current character set: %s\n", $mysqli->character_set_name());
}