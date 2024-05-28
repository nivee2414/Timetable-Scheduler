<?php
$servername = "localhost:3308"; 
$username = "root";
$password = "";
$dbname = "t_t"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$roomType = $roomNumber = $capacity = '';
$message = ''; // Variable to hold the message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomType = $_POST['roomType'];
    $roomNumber = $_POST['roomNumber'];
    $capacity = $_POST['capacity'];

    $stmt = $conn->prepare("INSERT INTO room_details (roomType, roomNumber, allocation) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $roomType, $roomNumber, $capacity);

    if ($stmt->execute() === TRUE) {
        $message = "New record created successfully.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/room.css">
    <title>Room Details Form</title>
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
    <h2 style="margin-bottom: 20px">Room Details</h2>
    <?php if (!empty($message)) : ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="room-form">
        <div class="form-group">
            <label for="roomType">Room Type:</label>
            <select id="roomType" name="roomType">
                <option value="" disabled selected>--Select--</option>
                <option value="lectureHall">Lecture Hall</option>
                <option value="lab">Lab</option>
            </select>
        </div>

        <div class="form-group">
            <label for="roomNumber">Room Number:</label>
            <input
                type="text"
                id="roomNumber"
                name="roomNumber"
                placeholder="Enter Room Number"
                required
            />
        </div>

        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input
                type="text"
                id="capacity"
                name="capacity"
                placeholder="Enter capacity"
                required
            />
        </div>

        <div class="form-group" style="text-align: center">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
