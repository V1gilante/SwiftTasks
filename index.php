<?php
session_start();

    include("connections.php");
    include("functions.php");
    
    $user_data = check_login($con);

   // Add a task to the database
if (isset($_POST['addTask'])) {
    $taskText = $_POST['taskText'];
    $completed = 0; // Set to 1 if the task is completed

    $sql = "INSERT INTO tasks (text, completed) VALUES ('$taskText', $completed)";
    if ($conn->query($sql) === TRUE) {
        echo "Task added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve tasks from the database
if (isset($_GET['getTasks'])) {
    $tasks = [];
    $result = $conn->query("SELECT * FROM tasks");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }
    echo json_encode($tasks);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="todo.css?v=<?php echo time(); ?>">
    <title>SwiftTasks</title>
    <style>
        #svgelem {
            position: relative;
            left: 48.9%;
            -webkit-transform: translateX(-20%);
            -ms-transform: translateX(-20%);
            transform: translateX(-20%);
        }
    </style>
</head>
<body>
    <!-- Hamburger button to open/close the sidebar -->
    <span class="openbtn" onclick="openNav()">&#9776;</span>

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <a href="calender.php">Calender</a>
        <a href="note.php">Notes</a>
        <a href="logout.php">Logout</a>
        <!-- Add more navigation links as needed -->
    </div>

    <header>
        <svg id="svgelem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><line x1="96" y1="128" x2="160" y2="128" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><line x1="96" y1="160" x2="160" y2="160" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><path d="M56,40H200a8,8,0,0,1,8,8V200a24,24,0,0,1-24,24H72a24,24,0,0,1-24-24V48A8,8,0,0,1,56,40Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><line x1="80" y1="24" x2="80" y2="56" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><line x1="128" y1="24" x2="128" y2="56" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><line x1="176" y1="24" x2="176" y2="56" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/></svg>
    </header>

    <div class="container">
        <h1>SwiftTasks</h1>
        <div class="todo-app">
            <h2>Make Every Second Count</h2>
            <div class="row">
                <input type="text" id="input-box" placeholder="Add Your Task">
                <button onclick="addTask()">Add</button>
            </div>
            <ul id="list-container">
                <!-- <li class="checked">Task 1</li>
                <li>Task 2</li>
                <li>Task 3</li> -->
            </ul>
        </div>
    </div>

    <script>
        // JavaScript to open/close the sidebar
        function openNav() {
            var sidebar = document.getElementById("mySidebar");
            if (sidebar.style.width === "250px") {
                sidebar.style.width = "0";
            } else {
                sidebar.style.width = "250px";
            }
        }
    </script>
    <script src="todo.js"></script>
</body>

</html>


