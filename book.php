<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Update with your MySQL password
$dbname = "library_management";

// Establish the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $book_name = $conn->real_escape_string($_POST['book_name']);
    $category = $conn->real_escape_string($_POST['category']);
    $isbn = $conn->real_escape_string($_POST['isbn']);
    $author = $conn->real_escape_string($_POST['author']);
    $publisher = $conn->real_escape_string($_POST['publisher']);
    $price = $conn->real_escape_string($_POST['price']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $location = $conn->real_escape_string($_POST['location']);

    // Prepare SQL query
    $sql = "INSERT INTO books (book_name, category, isbn, author, publisher, price, quantity, location) 
            VALUES ('$book_name', '$category', '$isbn', '$author', '$publisher', '$price', '$quantity', '$location')";

    // Execute query and check if successful
    if ($conn->query($sql) === TRUE) {
        echo "Book details have been submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
