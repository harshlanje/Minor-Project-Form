<?php
include 'config.php';

// Enable exceptions for MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roll = $_POST['roll_no'];
    $name = $_POST['name'];
    $domain = $_POST['domain'];
    $topic = $_POST['project_topic'];

    try {
        $stmt = $conn->prepare("INSERT INTO minorproject (roll_no, name, domain, project_topic) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $roll, $name, $domain, $topic);

        $stmt->execute();
        echo "<script>alert('Data Inserted Successfully');</script>";

        $stmt->close();
    } catch (Exception $e) {
        if (str_contains($e->getMessage(), 'Duplicate')) {
            echo "<script>alert('Roll number already exists!');</script>";
        } else {
            echo "<script>alert('Unexpected Error: {$e->getMessage()}');</script>";
        }
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <h1>Project Topic for Industrial Training</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="roll_no">Roll No</label>
                <input type="text" name="roll_no" id="roll_no" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="domain">Domain</label>
                <input type="text" name="domain" id="domain" required>
            </div>
            <div class="form-group">
                <label for="project_topic">Project Topic</label>
                <input type="text" name="project_topic" id="project_topic" required>
            </div>
            <input type="submit" value="Submit" class="submit-btn">
        </form>
    </div>
</body>

</html>