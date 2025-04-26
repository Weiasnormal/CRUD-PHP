<?php include 'db.php';
if ($_POST) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];

  $conn->query("INSERT INTO tbl_patient (name, age, gender, address)
                VALUES ('$name', $age, '$gender', '$address')");
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Add Patient</h2>
  <form method="post" class="mt-3">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Age</label>
      <input type="number" name="age" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gender</label>
      <select name="gender" class="form-select">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" name="address" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>