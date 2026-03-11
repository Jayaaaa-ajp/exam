<?php

include "config.php";

if(isset($_GET['id'])){
$id=$_GET['id'];
$conn->query("DELETE FROM consultations WHERE consultation_id='$id'");
}

if(isset($_GET['patient'])){
$id=$_GET['patient'];
$conn->query("DELETE FROM patients WHERE patient_id='$id'");
}
header("Location: landing.php");
?>