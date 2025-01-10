<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myoffice";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete record from database
    $sql = "DELETE FROM client WHERE id = $id";

    if ($connection->query($sql) === TRUE) {
        // If successful, redirect back to index.php with a success message
        header("Location: /crud/index.php?status=deleted");
        exit();
    } else {
        // If there's an error, redirect with an error message
        header("Location: /crud/index.php?status=error");
        exit();
    }
}

$connection->close();
?>
