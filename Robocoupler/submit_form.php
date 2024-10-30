<?php
$host = "localhost";
$username = "root";
$password = "password";
$dbname = "internship_db";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$resume_path = "";
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $resume_name = basename($_FILES['resume']['name']);
    $upload_dir = "uploads/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $resume_path = $upload_dir . $resume_name;

    if (!move_uploaded_file($resume_tmp, $resume_path)) {
        die("Resume upload failed.");
    }
}

$sql = "INSERT INTO internship_form 
        (name, email, college, branch, domain, phone, queries, resume_path) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $conn->error);
}

$stmt->bind_param(
    "ssssssss",
    $_POST['name'],
    $_POST['email'],
    $_POST['college'],
    $_POST['branch'],
    $_POST['domain'],
    $_POST['phone'],
    $_POST['queries'],
    $resume_path
);

if ($stmt->execute()) {
    echo "Form submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
