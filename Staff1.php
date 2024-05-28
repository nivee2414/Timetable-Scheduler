<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Details Form</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Staff.css">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
        }

        .nav-links {
            display: flex;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .logout {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="nav-links">
        <a href="Course.php">Courses</a>
        <a href="Staff1.php">Teacher</a>
        <a href="Room.php">Rooms</a>
        <a href="GenerateTimetable.php">Generate Timetable</a>
    </div>
    <a href="home.php" class="logout">Logout</a>
</div>
<div class="container">
    <h1 class="mt-5 mb-4">Staff Details</h1>
    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "t_t";   // Replace with your MySQL database name
    $port = 3308; // Specify the port number here

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $name = $designation = $email = $academic_position = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = test_input($_POST["id"]);
        $name = test_input($_POST["name"]);
        $designation = test_input($_POST["designation"]);
        $email = test_input($_POST["email"]);
        $academic_position = test_input($_POST["academic_position"]);

        // Insert data into database
        $sql = "INSERT INTO staff_details (id, name, designation, email, academic_position) VALUES ('$id', '$name', '$designation', '$email', '$academic_position')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="designation">Designation:</label>
            <input type="text" class="form-control" id="designation" name="designation" required>
        </div>
        <div class="form-group">
            <label for="email">Email ID:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="academic_position">Academic Position:</label>
            <select class="form-control" id="academic_position" name="academic_position" required>
                <option value="">Select Academic Position</option>
                <option value="Professor">Professor</option>
                <option value="Assistant Professor">Assistant Professor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html
