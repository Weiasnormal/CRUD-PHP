<?php
// Include the database connection file
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient List</title>
  <!-- Link to Bootstrap CSS for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <!-- Page title -->
  <h2 class="mb-4">Patient List</h2>
  <!-- Button to navigate to the create.php page for adding a new patient -->
  <a href="create.php" class="btn btn-primary mb-3">Add Patient</a>
  <!-- Table to display the list of patients -->
  <table class="table table-bordered">
    <thead class="table-light">
      <tr>
        <!-- Table headers -->
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    // Execute a query to fetch all records from the tbl_patient table
    $result = $conn->query("SELECT * FROM tbl_patient");
    // Check if the query was successful
    if (!$result) {
        // Stop execution and display an error message if the query fails
        die("Query failed: " . $conn->error);
    }
    // Check if there are any rows in the result set
    if ($result->num_rows > 0):
        // Loop through each row in the result set
        while ($row = $result->fetch_assoc()):
            ?>
      <tr>
        <!-- Display patient data in table rows -->
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['age']) ?></td>
        <td><?= htmlspecialchars($row['gender']) ?></td>
        <td><?= htmlspecialchars($row['address']) ?></td>
        <td>
          <!-- Edit button with a link to edit.php, passing the patient ID -->
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <!-- Delete button with a confirmation prompt -->
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this patient?')">Delete</a>
        </td>
      </tr>
    <?php
        endwhile; // End of while loop
    else: // If no rows are found, display a message
        ?>
        <tr>
            <td colspan="6" class="text-center">No patients found</td>
        </tr>
    <?php
    endif; // End of if-else block
    ?>
    </tbody>
  </table>
</div>
</body>
</html>
