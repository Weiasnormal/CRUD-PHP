<?php
include 'db.php';
$id = $_GET['id'];
$patient = $conn->query("SELECT * FROM tbl_patient WHERE id=$id")->fetch_assoc();

if ($_POST) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];

  $conn->query("UPDATE tbl_patient SET name='$name', age=$age, gender='$gender', address='$address' WHERE id=$id");
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit Patient</h2>
  <form method="post" class="mt-3">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="<?= $patient['name'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Age</label>
      <input type="number" name="age" class="form-control" value="<?= $patient['age'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gender</label>
      <select name="gender" class="form-select">
        <option <?= $patient['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
        <option <?= $patient['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" name="address" class="form-control" value="<?= $patient['address'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>