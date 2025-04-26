<?php
// Include the database connection file
include 'db.php';

// Get the patient ID from the URL query string
$id = $_GET['id'];

// Fetch the patient record from the database based on the provided ID
$patient = $conn->query("SELECT * FROM tbl_patient WHERE id=$id")->fetch_assoc();

// Check if the form has been submitted via POST
if ($_POST) {
    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Update the patient record in the database with the new data
    $conn->query("UPDATE tbl_patient SET name='$name', age=$age, gender='$gender', address='$address' WHERE id=$id");

    // Redirect to the index page after updating the record
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Patient</title>
  <!-- Include Bootstrap CSS for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit Patient</h2>
  <!-- Form for editing patient details -->
  <form method="post" class="mt-3">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <!-- Input field for the patient's name, pre-filled with the current value -->
      <input type="text" name="name" class="form-control" value="<?= $patient['name'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Age</label>
      <!-- Input field for the patient's age, pre-filled with the current value -->
      <input type="number" name="age" class="form-control" value="<?= $patient['age'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gender</label>
      <!-- Dropdown for selecting the patient's gender, with the current value selected -->
      <select name="gender" class="form-select">
        <option <?= $patient['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
        <option <?= $patient['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <!-- Input field for the patient's address, pre-filled with the current value -->
      <input type="text" name="address" class="form-control" value="<?= $patient['address'] ?>">
    </div>
    <!-- Submit button to update the patient record -->
    <button type="submit" class="btn btn-primary">Update</button>
    <!-- Cancel button to return to the index page -->
    <a href="index.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>