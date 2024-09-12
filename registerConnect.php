<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection parameters
$serverName = "SIHLE\MSSQLSERVER01";
$connectionOptions = array(
    "Database" => "TaurusLMS",
    "Uid" => "",  // Provide your database username
    "PWD" => ""   // Provide your database password
);

// Establish the database connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    $errors = sqlsrv_errors();
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . print_r($errors, true)]);
    exit();
}

// Process form submission if POST data exists
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = cleanInput($_POST['name']);
    $surname = cleanInput($_POST['surname']);
    $email = cleanInput($_POST['email']);
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);
    $confirmPassword = cleanInput($_POST['confirm-password']);

    // Additional validation (e.g., password confirmation)
    if ($password !== $confirmPassword) {
        echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to check if username or email already exists
    $checkSql = "SELECT COUNT(*) AS count FROM profile WHERE username = ? OR email = ?";
    $checkParams = array($username, $email);
    $checkStmt = sqlsrv_query($conn, $checkSql, $checkParams);

    if ($checkStmt === false) {
        $errors = sqlsrv_errors();
        echo json_encode(['success' => false, 'message' => 'Check query failed: ' . print_r($errors, true)]);
        exit();
    }

    $checkRow = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);
    if ($checkRow['count'] > 0) {
        echo json_encode(['success' => false, 'message' => 'Username or email already exists.']);
        sqlsrv_free_stmt($checkStmt);
        exit();
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO profile (name, surname, email, username, password) VALUES (?, ?, ?, ?, ?)";
    $params = array($name, $surname, $email, $username, $hashedPassword);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        $errors = sqlsrv_errors();
        echo json_encode(['success' => false, 'message' => 'Insert query failed: ' . print_r($errors, true)]);
    } else {
        echo json_encode(['success' => true, 'message' => 'Registration successful.']);
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_free_stmt($checkStmt);
}

// Function to sanitize input data
function cleanInput($data)
{
    return htmlspecialchars(trim($data));
}

// Close the database connection
sqlsrv_close($conn);
?>
