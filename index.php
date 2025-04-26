<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Patient List</h2>
  <a href="create.php" class="btn btn-primary mb-3">Add Patient</a>
  <table class="table table-bordered">
    <thead class="table-light">
      <tr>
        <th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Address</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM tbl_patient");
    while($row = $result->fetch_assoc()):
    ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['age'] ?></td>
        <td><?= $row['gender'] ?></td>
        <td><?= $row['address'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this patient?')">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>