<?php
require_once('db-connect.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Id no definido.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
if($delete){
    echo "<script> alert('El evento se ha eliminado con éxito.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "Error.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>
