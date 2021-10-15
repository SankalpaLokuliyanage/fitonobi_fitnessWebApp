<?php
  require 'header.php';
?>

<title>FITONOBI</title>

<div id="myCarousel" class="carousel slide" data-ride="carousel">

<div class="carousel-indicators">
	<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/img_caro1.jpg" style="filter: opacity(50%);" alt="First slide">

      <div>
          <div class="carousel-caption text-start" style="color: black;">
          	<h1>Join with us</h1>
            <p>You can share fitness experience with us.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
       </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/img_caro2.jpg" style="filter: opacity(50%); alt="Second slide">
       <div>
          <div class="carousel-caption text-start">
            <p><a class="btn btn-lg btn-primary" href="#">View Articles</a></p>
          </div>
       </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/img_caro3.jpg" style="filter: opacity(50%); alt="Third slide">
       <div>
          <div class="carousel-caption text-start">
            <p><a class="btn btn-lg btn-primary" href="#">Image Gallery</a></p>
          </div>
       </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  
  <style>
  	.carousel {
  margin-bottom: 4rem;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 32rem;
}
.carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 32rem;
}
  </style>


  <div class="container marketing" style="margin-bottom: 1.5rem; text-align: center;">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4" >
       <img src="img/avatar2.png" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img"/>

        <h2>Mr. Udana Herath</h2>
        <p>The founder and CEO of FITONOBI Organization.</p>
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="img/avatar1.png" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img"/>

        <h2>Ms. Nishani Baddegama</h2>
        <p>A founding member</p>
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
       <img src="img/avatar3.png" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img"/>

        <h2>Mr. Chandana Weerasekara</h2>
        <p>A founding member</p>
        
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>

<style>
  .marketing h2 {
  font-weight: 400;
}
/* rtl:begin:ignore */
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}
</style>


<?php
  require 'footer.php';
?>
