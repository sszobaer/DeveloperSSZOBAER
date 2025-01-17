<?php
if (isset($_POST['submit'])) {
    // Capture form data
    $name = $_POST['Name'];
    $Email = $_POST['Email'];
    $ProjectDetails = $_POST['ProjectDetails'];
    $Massege = $_POST['Massage'];

    // Database connection details
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "portfoliousingbootsrap";

    // Connect to the database
    $conn = mysqli_connect($host, $user, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute SQL query
    $stmt = $conn->prepare("INSERT INTO hire_me (Name, Email, ProjectDetails, Massage) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $Email, $ProjectDetails, $Massege);

    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error sending message. Please try again later.');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>