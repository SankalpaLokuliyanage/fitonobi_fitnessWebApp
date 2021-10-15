
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- Logout -->
<?php
if (isset($_SESSION['userId'])) {
  if (isset($_GET['login'])) {
    if ($_GET['login'] == "adminsuccess") {
      echo '<nav class="navbar float-right navbar-expand-lg navbar-light bg-light mt-3">
              <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto"></ul>
                <a href="register.php" class="btn btn-success my-2 my-sm-0 mx-3" name="register-submit">Register New Society</a>
                <a href="#" class="btn btn-info my-2 my-sm-0 mr-3" data-toggle="modal" data-target="#newSociety">Remove A Society</a>
                <button class="btn btn-danger mt-2 my-sm-0" type="submit" name="logout-submit" data-toggle="modal" data-target="#logoutModal">Logout</button>
              </div>
            </nav>
            <br />
            <ul class="nav mt-5 pt-3 nav-tabs mb-3">
              <li class="nav-item">
                <a class="nav-link" href="add_event1.php?login=adminsuccess">Society 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="add_event2.php?login=adminsuccess">Society 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Society 3</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Society 4</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Society 5</a>
              </li>
            </ul><br />';
    } else if ($_GET['login'] == "success") {
      echo '<nav class="navbar float-right navbar-expand-lg navbar-light bg-light mt-3">
              <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto"></ul>
                  <button class="btn btn-danger mt-2 my-sm-0" type="submit" name="logout-submit" data-toggle="modal" data-target="#logoutModal">Logout</button>
              </div>
            </nav>';
    }
  }
}
?>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hi!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to logout?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <form class="form-inline my-2 my-lg-0 ml-3" action="includes/logout.inc.php" method="post">
          <button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout-submit" data-toggle="modal" data-target="#exampleModal">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Remove Society Modal -->
<div class="modal fade" id="newSociety" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove A Society</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/remove.inc.php" method="post">
          <div class="form-group">
            <label for="inputState">Select Society</label>
            <select id="inputState" class="form-control" name="select-society">
              <option selected value="society1">Society 1</option>
              <option value="society2">Society 2</option>
              <option value="society3">Society 3</option>
              <option value="society4">Society 4</option>
              <option value="society5">Society 5</option>
            </select>
          </div>
          <br>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          <button class="btn btn-danger my-2 my-sm-0" type="submit" name="remove-society">Remove Society</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="ml-4 my-4 pt-5 px-5">
  <h1>Name of Society 2 - Add an Event</h1>
  <br>
  <form class="add-event" method="POST" action="includes/add2.inc.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="eventName">Event Name</label>
      <input type="text" class="form-control" name="eventName" placeholder="Enter event name" required>
    </div>
    <div class="form-group">
      <label for="fixedDate">Fixed Date</label>
      <input type="date" class="form-control" name="fixedDate" placeholder="Date of the event" required>
    </div>
    <div class="form-group">
      <label for="eventVenue">Venue</label>
      <input type="text" class="form-control" name="eventVenue" placeholder="Enter the venue" required>
    </div>
    <div class="form-group">
      <label for="desc">Description to Display</label>
      <textarea class="form-control" name="description" rows="4" placeholder="Please enter name, date, venue and other information regarding the event" required></textarea>
    </div>
    <div class="form-group">
      <label for="image"><i class="fas fa-upload fa-2x mr-3"></i>Upload Image (Not Compulsory)</label>
      <input type="file" class="form-control-file" name="image">
    </div>
    <button type="submit" class="btn btn-primary" name="event-submit">Save</button>
  </form>
</div>



<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

  <div class="mt-3 text-center calendar">
    <?php
      include "Calendar/society2AdminCalendar.php";
     ?>
  </div>
</div>

<!-- Footer -->
<footer class="mt-5">
  <div class="container">
    <div class="row">
      <div class="col-3">
        <h2>Contact Us</h2><br>
        <ul type="none">
          <li><br></li>
          <li><br></li>
        </ul>
      </div>
      <div class="col-9">
        <a class="btn" href="http://www.facebook.com">
          <i class="fab fa-facebook-f fa-2x"></i>
        </a>
        <a class="btn" href="http://www.twitter.com">
          <i class="fab fa-twitter fa-2x"></i>
        </a>
        <a class="btn" href="http://www.instagram.com">
          <i class="fab fa-instagram fa-2x"></i>
        </a>
        <a class="btn" href="http://www.linkedin.com">
          <i class="fab fa-linkedin fa-2x"></i>
        </a>
        <a class="btn" href="http://www.youtube.com">
          <i class="fab fa-youtube fa-2x"></i>
        </a>
      </div>
    </div>
  </div>
</footer>

<!-- Javascript -->
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</div>
</body>

</html>
