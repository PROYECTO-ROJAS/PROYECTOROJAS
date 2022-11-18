<?php
$conn = new mysqli('localhost', 'root', '', 'base_rojas');
if(!$conn){
    die("no conectto". $conn->error);
}