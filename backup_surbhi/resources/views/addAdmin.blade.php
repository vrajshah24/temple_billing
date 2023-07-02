<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
  <title>Add New Admin</title>
</head>
<body>
<meta name="csrf-token" content="{{ csrf_token() }}">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{  url('') }}/home">Home</a>
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
<div class="container pb-5">
    <h1 class="text-center mt-5">Add New Admin</h1>
    <form id="loginForm" class="mt-5">
      <div class="form-group">
        <label for="username">Username <span class="text-danger">*</span>:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password<span class="text-danger">*</span>:</label>
        <input type="text" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="password">Confirm Password<span class="text-danger">*</span>:</label>
        <input type="text" class="form-control" id="password" name="password" required>
      </div>
      <button type="button" id="add_admin_btn" class="btn btn-primary">Add Admin</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
  var HOST_URL = "{{  url('') }}";
   $('#add_admin_btn').click(function() {
        $.ajax({
            type : 'POST',
            url :"{{ route('storeAdmin')}}",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:
            {
              'username':$('#username').val(),
              'password':$('#password').val()
            },
            success: function(data) {
                if(data == 'success'){
                  swal("NEW ADMIN ADDED SUCCESSFULLY", "",
                        "success").then(function() {
                          window.location.href = HOST_URL +"/home";
                        // REDIRECT TO HOME PAGE
                    });
                }else{
                  swal("USERNAME ALREADY TAKEN", "ENTER UNIQUE USERNAME",
                        "warning").then(function() {
                          
                          location.reload();
                    });
                }
            },
            error : function(data){
              swal("SOMETHING WENT WRONG...", "PLEASE TRY AGAIN",
                        "warning").then(function() {
                        location.reload();
                    });
            }
        });
    });

  </script>

  
</body>
</html>