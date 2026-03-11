<?php
include "config.php";

$id=$_GET['id'];

$data=$conn->query("SELECT * FROM consultations WHERE consultation_id='$id'");
$row=$data->fetch_assoc();

if(isset($_POST['update'])){

$doctor=$_POST['doctor_name'];
$date=$_POST['consultation_date'];
$diagnosis=$_POST['diagnosis'];
$treatment=$_POST['treatment'];

$conn->query("UPDATE consultations SET
doctor_name='$doctor',
consultation_date='$date',
diagnosis='$diagnosis',
treatment='$treatment'
WHERE consultation_id='$id'");

header("Location: landing.php");

}

?>

<form method="POST">

Doctor
<input type="text" name="doctor_name" value="<?php echo $row['doctor_name']; ?>">

Date
<input type="date" name="consultation_date" value="<?php echo $row['consultation_date']; ?>">

Diagnosis
<input type="text" name="diagnosis" value="<?php echo $row['diagnosis']; ?>">

Treatment
<input type="text" name="treatment" value="<?php echo $row['treatment']; ?>">

<button name="update">Update</button>

</form>