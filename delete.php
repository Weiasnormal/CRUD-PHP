<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM tbl_patient WHERE id=$id");
header("Location: index.php");
?>