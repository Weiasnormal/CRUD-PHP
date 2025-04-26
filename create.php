<?php
// Include the database connection file
include 'db.php';

// Check if the form has been submitted via POST
if ($_POST) {
    // Retrieve form data from the POST request
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Insert the new patient record into the database
    $conn->query("INSERT INTO tbl_patient (name, age, gender, address)
                VALUES ('$name', $age, '$gender', '$address')");

    // Redirect to the index page after successfully adding the record
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Patient</title>
  <!-- Include Bootstrap CSS for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Add Patient</h2>
  <!-- Form for adding a new patient -->
  <form method="post" class="mt-3">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <!-- Input field for the patient's name -->
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Age</label>
      <!-- Input field for the patient's age -->
      <input type="number" name="age" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gender</label>
      <!-- Dropdown for selecting the patient's gender -->
      <select name="gender" class="form-select">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <!-- Input field for the patient's address -->
      <input type="text" name="address" class="form-control">
    </div>
    <!-- Submit button to save the new patient record -->
    <button type="submit" class="btn btn-success">Save</button>
    <!-- Back button to return to the index page -->
    <a href="index.php" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>
