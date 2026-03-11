<?php
include "config.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>HealthyCare Hospital Manager</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style>

body{
background:#f5f7fb;
}

.card{
border-radius:12px;
box-shadow:0 5px 12px rgba(0,0,0,0.08);
}

</style>
</head>

<body>
<div class="container mt-4">
<h2 class="mb-4">HealthyCare Hospital Manager</h2>
<ul class="nav nav-tabs mb-3">
<li class="nav-item">
<a class="nav-link active" data-bs-toggle="tab" href="#consult">Consultations</a>
</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="tab" href="#patient">Patients</a>
</li>
</ul>
<div class="tab-content">

<!-- CONSULTATION TAB -->
<div class="tab-pane fade show active" id="consult">
<div class="card p-4 mb-3">
<h5>Record New Consultation</h5>
<form action="insert.php" method="POST">
<div class="row">
<div class="col-md-3">
<select name="patient_id" class="form-control" required>
<option value="">Choose Patient</option>
<?php

$result = $conn->query("SELECT * FROM patients");

while($row=$result->fetch_assoc()){
echo "<option value='".$row['patient_id']."'>".$row['full_name']."</option>";
}

?>

</select>

</div>

<div class="col-md-2">
<input type="text" name="doctor_name" class="form-control" placeholder="Doctor Name" required>
</div>

<div class="col-md-2">
<input type="date" name="consultation_date" class="form-control" required>
</div>

<div class="col-md-2">
<input type="text" name="diagnosis" class="form-control" placeholder="Diagnosis">
</div>

<div class="col-md-2">
<input type="text" name="treatment" class="form-control" placeholder="Treatment">
</div>

<div class="col-md-1">
<button class="btn btn-success">Save</button>
</div>

</div>

</form>

</div>

<!-- CONSULTATION TABLE -->

<div class="card p-3">

<table class="table table-hover">

<thead>

<tr>
<th>ID</th>
<th>Patient Name</th>
<th>Doctor</th>
<th>Date</th>
<th>Diagnosis</th>
<th>Treatment</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php

$sql="SELECT consultations.*,patients.full_name
FROM consultations
INNER JOIN patients
ON consultations.patient_id = patients.patient_id";

$data=$conn->query($sql);

while($row=$data->fetch_assoc()){

echo "<tr>

<td>#".$row['consultation_id']."</td>
<td>".$row['full_name']."</td>
<td>".$row['doctor_name']."</td>
<td>".$row['consultation_date']."</td>
<td>".$row['diagnosis']."</td>
<td>".$row['treatment']."</td>

<td>

<a href='update.php?id=".$row['consultation_id']."' class='text-primary'>Edit</a> |
<a href='delete.php?id=".$row['consultation_id']."' class='text-danger'>Delete</a>

</td>

</tr>";

}

?>

</tbody>

</table>

</div>

</div>

<!-- PATIENT TAB -->

<div class="tab-pane fade" id="patient">

<div class="card p-4 mb-3">

<h5>Add New Patient</h5>

<form action="insert.php" method="POST">

<div class="row">

<div class="col-md-3">
<input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
</div>

<div class="col-md-2">
<input type="number" name="age" class="form-control" placeholder="Age">
</div>

<div class="col-md-2">

<select name="gender" class="form-control">
<option>Male</option>
<option>Female</option>
</select>

</div>

<div class="col-md-3">
<input type="text" name="contact_number" class="form-control" placeholder="Contact Number">
</div>

<div class="col-md-2">
<button name="add_patient" class="btn btn-success">Add Patient</button>
</div>

</div>

</form>

</div>

<!-- PATIENT TABLE -->

<div class="card p-3">

<table class="table table-hover">

<thead>

<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Contact</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php

$p=$conn->query("SELECT * FROM patients");

while($row=$p->fetch_assoc()){

echo "<tr>

<td>#".$row['patient_id']."</td>
<td>".$row['full_name']."</td>
<td>".$row['age']."</td>
<td>".$row['gender']."</td>
<td>".$row['contact_number']."</td>

<td>

<a href='update.php?patient=".$row['patient_id']."' class='text-primary'>Edit</a> |
<a href='delete.php?patient=".$row['patient_id']."' class='text-danger'>Delete</a>

</td>
</tr>";

}

?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>