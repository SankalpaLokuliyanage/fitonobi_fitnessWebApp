
<?php
  
  $con = mysqli_connect("localhost","root","","fitonobi_database");


 
 if(mysqli_connect_errno()){
     echo mysqli_connect_errno();
     die();
 }
 


 $sql = "select * from data";
 $res = mysqli_query($con,$sql);

 ?>

 <?php 


  if (isset($_SESSION['message'])) { ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>

    </div>


    
 <?php  } ?>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <title>User Dashboard</title>
    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
    </style>
    
  </head>
  <body>
    
<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="userArticle.php"><img src="img/logo.png" width="200px">USER</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="nav flex-row">
    <li class="nav-item">
    <p class="nav-link active" aria-current="page" style="font-size: 20px; padding-top: 10px;">Publish Your Article Here</a>
  </li>
  
  </ul>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <form class="form-inline my-2 my-lg-0 ml-3" action="includes/logout.inc.php" method="post">
      <button class="btn btn-danger mt-2 my-sm-0" type="submit" name="logout-submit" data-toggle="modal" data-target="#logoutModal">Logout</button>
    </form>
    </li>
  </ul>
</header>




 <div class="row justify-content-center" style="margin-top: 30px;">
<form enctype="multipart/form-data" method="POST">
  <div class="form-group">
  <label>Author Name</label>
  <input type="text" class="form-control" name="name">
  <label>Published Date</label>
  <input type="date" class="form-control" name="a_date">
  <label>Title</label>
  <input type="text" class="form-control" name="title">
  <label>Article</label>
  <textarea type="text" class="form-control" rows="10" cols="30" name="article"></textarea>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary" name="submit">Save</button>
  </div>
</form>
</div>


<?php 

  require 'db.php';

  

   if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $a_date = $_POST['a_date'];
    $title = $_POST['title'];
    $article = $_POST['article'];



    $sql = "INSERT INTO data (name, a_date, article, title) VALUES ('$name', '$a_date', '$article', '$title')";

      if($conn->query($sql)){
        $_SESSION['message'] = "Record has been saved!";
      $_SESSION['msg_type'] = "success";
      header('a_date: userArticle.php');
        // header("a_date: ../crud.php?crud=success");
      } else {
        header("a_date: ../userArticle.php?error=sqlerror");
      }
   }


?>



      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
