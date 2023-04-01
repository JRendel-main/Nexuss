<?php

// Connect to the database
$database = new mysqli('localhost', 'root', '', 'scheduling');
if ($database->connect_error) {
    die('Connection failed: ' . $database->connect_error);
}

// Retrieve the peerid parameter
$peerid = $_POST['peerid'];

// Retrieve the tutor's profile details from the database
$stmt = $database->prepare('SELECT fname, email, sex FROM tbl_peer WHERE peerid = ? AND category = 1');
$stmt->bind_param('i', $peerid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$name = $row['fname'];
$email = $row['email'];
$phone = $row['sex']; // assuming "sex" field contains the phone number

// Return the data as a JSON object
echo json_encode(array(
    'name' => $name,
    'email' => $email,
    'phone' => $phone
));

// Close the database connection
$stmt->close();
$database->close();

?>
