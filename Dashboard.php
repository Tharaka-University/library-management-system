<?php
// Connect to the database
$host = 'localhost';
$dbname = 'library_management';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch counts for the dashboard
$totalBooks = $pdo->query("SELECT COUNT(*) FROM books")->fetchColumn();
$availableBooks = $pdo->query("SELECT COUNT(*) FROM books WHERE status = 'available'")->fetchColumn();
$issuedBooks = $pdo->query("SELECT COUNT(*) FROM books WHERE status = 'issued'")->fetchColumn();
$returnedBooks = 0; // Assuming you have a way to track returned books separately
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Library Management System</h1>
        <div class="dashboard">
            <div class="card" style="background-color: #4CAF50;">
                <h2>Total Books</h2>
                <p><?php echo $totalBooks; ?></p>
            </div>
            <div class="card" style="background-color: #FFEB3B;">
                <h2>Available Books</h2>
                <p><?php echo $availableBooks; ?></p>
            </div>
            <div class="card" style="background-color: #FF5722;">
                <h2>Issued Books</h2>
                <p><?php echo $issuedBooks; ?></p>
            </div>
            <div class="card" style="background-color: #03A9F4;">
                <h2>Returned Books</h2>
                <p><?php echo $returnedBooks; ?></p>
            </div>
            <div class="card" style="background-color: #E91E63;">
                <h2>Total Users</h2>
                <p><?php echo $totalUsers; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
