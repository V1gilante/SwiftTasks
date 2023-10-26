<?php
session_start();

    include("connections.php");
    include("functions.php");
    
    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftTasks - Notes</title>
    <link rel="stylesheet" href="note.css?v=<?php echo time(); ?>">
</head>
<body>
    <span class="openbtn" onclick="openNav()">&#9776;</span>

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <a href="index.php">To-Do</a>
        <a href="calender.php">Calender</a>
        <a href="logout.php">Logout</a>
        <!-- Add more navigation links as needed -->
    </div>
    <div class="container">
        <h1>Notes</h1>
        <div id="date"></div>
        <textarea id="note" placeholder="Write your note here..."></textarea>
        <button id="save">Save</button>
        <div id="savedNotes">
            <!-- Saved notes will be displayed here -->
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
    <script src="note.js"></script>
</body>
</html>