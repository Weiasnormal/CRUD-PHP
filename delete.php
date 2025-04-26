<?php
// Include the database connection file
include 'db.php';

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Sanitize the 'id' parameter to prevent SQL injection
    $id = intval($_GET['id']); // Convert the id to an integer

    // Prepare a DELETE query to safely remove the record
    $stmt = $conn->prepare("DELETE FROM tbl_patient WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // Redirect the user back to the index.php page after successful deletion
        header("Location: index.php");
        exit();
    } else {
        // Display an error message if the query fails
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Redirect to index.php if 'id' is not provided in the URL
    header("Location: index.php");
    exit();
}

// Close the database connection
$conn->close();
?>