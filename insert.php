<?php

include "config.php";

if(isset($_POST['add_patient'])){

$name=$_POST['full_name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$contact=$_POST['contact_number'];

$conn->query("INSERT INTO patients(full_name,age,gender,contact_number)
VALUES('$name','$age','$gender','$contact')");

}

else{

$patient=$_POST['patient_id'];
$doctor=$_POST['doctor_name'];
$date=$_POST['consultation_date'];
$diagnosis=$_POST['diagnosis'];
$treatment=$_POST['treatment'];

$conn->query("INSERT INTO consultations(patient_id,doctor_name,consultation_date,diagnosis,treatment)
VALUES('$patient','$doctor','$date','$diagnosis','$treatment')");

}

header("Location: landing.php");

?>