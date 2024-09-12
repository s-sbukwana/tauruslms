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
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);

    // SQL query to fetch hashed password from database based on username
    $sql = "SELECT password FROM profile WHERE username = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        $errors = sqlsrv_errors();
        echo json_encode(['success' => false, 'message' => 'Query failed: ' . print_r($errors, true)]);
        exit();
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $storedHashedPassword = $row['password'];
        
        // Debug output
    

        // Verify the provided password against the stored hash
        if (password_verify($password, $storedHashedPassword)) {
            
            echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
            
        } else {
            session_start();
            $_SESSION['username'] = $username;
            // Redirect to the desired page after successful login
            header("Location: /TaurusLMS_Registration/Home/Courses/myCourses.html");
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
    }

    sqlsrv_free_stmt($stmt);
}

// Function to sanitize input data
function cleanInput($data)
{
    return htmlspecialchars(trim($data));
}

// Close the database connection
sqlsrv_close($conn);
?>
