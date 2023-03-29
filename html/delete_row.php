<?php
// Connect to the database
include("function.php");
include 'config.php';

// Get the ID of the row to delete from the POST parameters
$id = mysqli_real_escape_string($conn, $_POST['id']);

// Delete the row from the database
$sql = "DELETE FROM uploads WHERE id = $id";
if (mysqli_query($conn, $sql)) {
  // If the row was successfully deleted, output "success"
  $error ='Project material deleted successfully';
  showNotif($success, "success");
} else {
  // If an error occurred while deleting the row, output the error message
  showNotif('Error deleting row: ' . mysqli_error($conn), "info");
}

// Close the database connection
mysqli_close($conn);

?>