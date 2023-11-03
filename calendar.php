<?php
session_start();

    include("connections.php");
    include("functions.php");
    
    $user_data = check_login($con);

?>
 <!DOCTYPE html>
<html lang="en">
<head>
<title>SwiftTasks - Calendar</title>
<!-- *Note: You must have internet connection on your laptop or pc other wise below code is not working -->
<link href="calendar.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/swifttasks">
                <img src="" alt="" height="40px">
            </a>
            <a class="navbar-brand" href="/swifttasks">SwiftTasks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" target="_blank">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h5 align="center">Calendar</h5>
			<div id="calendar"></div>
		</div>
	</div>
</div>
<!-- Start popup dialog box -->
<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Add New Event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">X</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label for="event_name">Event name</label>
							  <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Enter your event name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">  
							<div class="form-group">
							  <label for="event_start_date">Event start</label>
							  <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date">
							 </div>
						</div>
						<div class="col-sm-6">  
							<div class="form-group">
							  <label for="event_end_date">Event end</label>
							  <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Event end date">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
			</div>
		</div>
	</div>
</div>


<br>
</body>
<script src="calendar.js"></script>
</html> 