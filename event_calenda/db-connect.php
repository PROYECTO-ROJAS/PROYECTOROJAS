<?php
$conn = new mysqli('localhost', 'root', '', 'evento_calendar');
if(!$conn){
    die("no conectto". $conn->error);
}