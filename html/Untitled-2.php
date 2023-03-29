<?php

// Define how many results to display per page
$results_per_page = 12;

// Get the current page number
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
// Calculate the starting and ending result index for the current page
$start_index = ($page - 1) * $results_per_page;
$end_index = $start_index + $results_per_page - 1;

// Retrieve the data from the database
$sql = "SELECT * FROM uploads LIMIT $start_index, $results_per_page";
$result = mysqli_query($conn, $sql);

// Add pagination
$sql = "SELECT * FROM uploads";
$result = mysqli_query($conn, $sql);
$total_results = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$total_pages = ceil($total_results / $results_per_page);









// Define how many results to display per page
$results_per_page = 12;

// Get the current page number
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

// Calculate the starting and ending result index for the current page
$start_index = ($page - 1) * $results_per_page;
$end_index = $start_index + $results_per_page - 1;

// Retrieve the data from the database
$sql = "SELECT * FROM uploads LIMIT $start_index, $results_per_page";
$result = mysqli_query($conn, $sql);

// Check if there are more results
if (mysqli_num_rows($result) == 0 && $page > 1) {
  // If there are no more results on this page but there are previous pages, redirect to the last page
  header("Location: ?page=" . ($page - 1));
  exit;
}

// Add pagination
$sql = "SELECT COUNT(*) as total FROM uploads";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$total_results = $row['total'];
$total_pages = ceil($total_results / $results_per_page);

