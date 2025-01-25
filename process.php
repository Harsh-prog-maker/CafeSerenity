<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = ''; // Default password for XAMPP is empty
$dbname = 'cafe_serenity'; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Redirect to a thank-you page
        header("Location: ThankingNote.php?name=" . urlencode($name));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch and display data from the database
$sql = "SELECT name, email, message FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' style='width:100%; text-align:left;'>";
    echo "<tr><th>Name</th><th>Email</th><th>Message</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td><a href='mailto:" . htmlspecialchars($row['email']) . "'>" . htmlspecialchars($row['email']) . "</a></td>";
        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No contacts found.";
}

// Close the connection
$conn->close();
