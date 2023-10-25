<?php
include './teachers/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.108.0" />
  <title>Teachers Records Management</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/" />
  <link href="./src/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="./src/css/main.css">
  <link href="./src/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./src/css/datatables.min.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, 0.1);
      border: solid rgba(0, 0, 0, 0.15);
      border-width: 1px 0;
      box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
        inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -0.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    html {
      scroll-behavior: smooth;
    }


    #section2 {
      height: 600px;
      background-color: yellow;
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Teachers Records Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#list">Teacher List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            
          </ul>
          <ul class = "navbar-nav">
          <li class = "nav-item">
          <a class = " btn btn-secondary nav-link" href="./teachers/login.php"> Login </a> 
          </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./src/image/1st.jpg" width="100%" height="100%" alt="" />


          <div class="container">
            <div class="carousel-caption text-start">
              <h1 style="color:black">Welcome Teachers!</h1>
              <p style="color:black">
                Teachers Record Management System

              </p>

            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./src/image/login.png" width="100%" height="100%" alt="" />
          <div class="container">
            <div class="carousel-caption">


              <p><a class="btn btn-lg btn-primary" href="./teachers/login.php">Login</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./src/image/register.jpg" width="100%" height="100%" alt="" />
          <div class="container">
            <div class="carousel-caption text-end">
              <h1 style="color:black">Don't have an Acoount?</h1>
              <p>
                <a class="btn btn-lg btn-primary" href="./teachers/register.php">Click Here to register</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->


    <div class="container text-center">

      <!-- Three columns of text below the carousel -->

      <!-- ========= card-style-2 start ========= -->

      <div class="row">
        <div class="col-12">

        </div>
        <!-- end col -->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="card-style-2 mb-30">
            <div class="card-image">

              <img src="./src/image/cloud.jpg" alt="" />
            </div>
            <div class="card-content">
              <h4>Cloud Storage </h4>
              <p>
                Our webiste Using Cloud Storage to save your files
                to prevent data loss.
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="card-style-2 mb-30">
            <div class="card-image">

              <img src="./src/image/secured.jpg" alt="" />
            </div>
            <div class="card-content">
              <h4>Security</h4>
              <p>
                Secured Website for your confidential files.
              </p>
            </div>
          </div>
        </div>


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="card-style-2 mb-30">
            <div class="card-image">

              <img src="./src/image/fast.png" alt="" />
            </div>
            <div class="card-content">
              <h4>Fast and Realtime</h4>
              <p>
                Our webiste build in realtime for fasting saving of files.
              </p>
            </div>
          </div>
        </div>
      </div>






      <!-- end row -->
      <!-- ========= card-style-2 end ========= -->




      <!-- /.row -->

      <!-- START THE FEATURETTES -->


      <hr class="featurette-divider" />
      <!-- tables -->


      <h2 class="mb-10" id="list">Teachers Lists</h2>

      <div id="link_wrapper" class="table-wrapper table-responsive">
        <table id="table" class="table table-hover">
          <thead>
            <tr>
              <th>Picture</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>



        <hr class="featurette-divider" />
        <!-- about -->
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1" id="about">
              About!
              <span class="text-muted">Teachers Records Management</span>
            </h2>
            <p class="lead">
              This is a platform for teachers to Save their files
              at ease and for students you can easily search the teachers.


            </p>
          </div>
          <div class="col-md-5">
            <img src="./src/image/about.jpg" width="100%" height="100%" alt="" />

          </div>
        </div>

        <hr class="featurette-divider" />

        <!-- /END THE FEATURETTES -->
      </div>


      <!-- /.container -->

      <!-- FOOTER -->
      <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>
          &copy; 2017–2022 Company, Inc. &middot;
          <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
        </p>
      </footer>
  </main>

  <script src="./src/js/bootstrap.bundle.min.js"></script>
  <script src="./src/js/jquery-3.6.1.min.js"></script>
  <script src="./src/js/datatables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {


      var dataTable = $('table').DataTable({
        "ajax": "data.php", // URL to server-side script that returns JSON data
        "columns": [{
            "data": "Picture",
            "render": function(data, type, full, meta) {
              return '<img src="./teachers/profile/' + data + '" width="100" height="100">';
            }

          },
          {
            "data": "Name"
          },
          {
            "data": "Email"
          },
          {
            "data": "Address"
          },


        ],


        "rowCallback": function(row, data, index) {
          $(row).on('click', function() {
            window.location.href = 'profile.php?profile=' + data.Name;
          });
        },




        lengthMenu: [
          [5, 10, 50, -1],
          [5, 10, 50, 'All'],
        ],





      });
      $('.dataTables_filter input').attr('maxLength', 16),
        setInterval(function() {
          dataTable.ajax.reload(null, false); // Reload table data every 5 seconds
        }, 5000);
    });
  </script>




</body>

</html>