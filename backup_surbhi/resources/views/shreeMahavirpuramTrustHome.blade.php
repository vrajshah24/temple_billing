<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .clickable-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      margin: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
      cursor: pointer;
    }
    .clickable-container:hover {
      text-decoration: none;
      color: blue;
      transition: all 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
    }
    .center-container {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .modal-dialog {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 85vh;
    }
    .modal-content {
      text-align: center;
    }
  </style>
  <title>Shree Mahavirpuram | Home</title>
</head>
<body>
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
  <div class="container center-container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="clickable-container" data-toggle="modal" data-target="#container1Modal">
          <img src="{{asset('assets/shree-foundation-trust.jpg')}}" alt="Image 1" style="width: 500px; height: 350px; padding:50px">
          <center style="padding-bottom: 50px; font-weight: 700; font-size: 20px;">Shree Foundation Trust</center>
        </div>
      </div>
      <div class="col-md-6">
        <div class="clickable-container" data-toggle="modal" data-target="#container2Modal">
          <img src="{{asset('assets/shree-mahavirpuram.jpg')}}" alt="Image 2" style="width: 500px; height: 350px; padding:50px">
          <center style="padding-bottom: 50px; font-weight: 700; font-size: 20px;">Shree Mahavirpuram</center>
        </div>
      </div>
    </div>
  </div>

  <!-- Container 1 Modal -->
  <div class="modal fade" id="container1Modal" tabindex="-1" role="dialog" aria-labelledby="container1ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="container1ModalLabel">Shree Foundation Trust</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-center">
             <button class="btn btn-primary mr-2" onclick="window.location.href=`{{ route('shreeTrustDonaterList')}}`">View</button>
            <button class="btn btn-primary" onclick="window.location.href=`{{ route('shreeTrustInvoice')}}`">Add</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Container 2 Modal -->
  <div class="modal fade" id="container2Modal" tabindex="-1" role="dialog" aria-labelledby="container2ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="container2ModalLabel">Shree Mahavirpuram</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-center">
            <button class="btn btn-primary mr-2" onclick="window.location.href=`{{ route('mahavirpuramDonaterList')}}`">View</button>
            <button class="btn btn-primary" onclick="window.location.href=`{{ route('mahavirpuramInvoice')}}`">Add</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
