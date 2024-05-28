<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Timetable</title>
    <link rel="stylesheet" href="CSS/Generate.css">
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
            <a href="generate.php">Generate Timetable</a>
        </div>
        <a href="home.php" class="logout">Logout</a>
    </div>
    <div class="container">
    <h2>Generate Timetable</h2>
    <div class="semester-select">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="semesterSelect">Select Semester:</label>
            <select id="semesterSelect" name="semester">
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
                <option value="7">Semester 7</option>
                <option value="8">Semester 8</option>
            </select>
            <button type="submit" id="generateBtn">Generate</button>
        </form>
    </div>
        <table class="timetable">
            <thead>
                <tr>
                    <th></th>
                    <th>9:15 - 10:05</th>
                    <th>10:05 - 10:55</th>
                    <th>11:15 - 12:00</th>
                    <th>12.00 - 12.50</th>
                    <th>1.50  - 2.40</th>
                    <th>2.40  - 3.30</th>
                    <th>3.45  - 4.30</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Monday</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-two-columns"></td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-two-columns"></td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-two-columns"></td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-two-columns"></td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-two-columns"></td>
                </tr>
                
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "t_t";
$port = 3308; // Specify the port number here

// Attempt to establish connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $semester = $_POST['semester'];
    // Fetch all courses for the selected semester
    $sql = "SELECT * FROM courses_detials WHERE semester = $semester";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate timetable based on the fetched courses
        // Your logic for generating timetable goes here
        // You can allocate subjects randomly or based on some criteria
        echo "<p>Timetable generated successfully.</p>";
    } else {
        echo "<p>No courses found for the selected semester.</p>";
    }
}

$conn->close();
?>
