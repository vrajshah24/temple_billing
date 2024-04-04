<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Events</title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
    <style>
    /* Custom CSS for background image */
    .bg-image {
      background-image: "{{asset('assets/temple.jpg')}}"; /* Replace 'your-image.jpg' with the path to your image */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh; /* Adjust as needed */
    }
  </style>
  <title>Add Events</title>
</head>
<body>
<!-- "{{asset('assets/temple.jpg')}}" -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{  url('') }}/home">Add New Events</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{  url('') }}/addAdmin">Add Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('') }}/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav> 

<div class="row d-flex justify-content-center mt-3">
    <div class="card col-md-8 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <div class="container pb-3">
                <h1 class="text-center mt-0"></h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="event_name">Event Name:</label>
                            <input type="text" id="event_name" name="event_name"  class="form-control"  required>        
                        </div>
                        <div class="form-group">
                            <label for="event_date">Event Date:</label>
                            <input type="date" id="event_date" name="event_date"  class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="start_time">Start Time:</label> 
                            <input type="time" id="start_time" name="start_time"  class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="end_time">End Time:</label>
                            <input type="time" id="end_time" name="end_time"  class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="event_description">Event Description:</label>
                            <textarea id="event_description" name="event_description" rows="4" cols="50"  class="form-control"  required></textarea>
                        </div>
                        <center>
                            <input type="submit" value="Add Event" class = "btn btn-primary btn-lg">
                        </center>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
  </div>
</div>
</div>
</div>
</body>
</html>













