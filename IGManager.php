<?php
  require 'dashboardHeader.php';
?>


<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
}

/* The grid: Four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
}

/* Style the images inside the grid */
.column img {
  opacity: 0.8; 
  cursor: pointer; 
}

.column img:hover {
  opacity: 1;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The expanding image container */
.container {
  position: relative;
  display: none;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
</style>
</head>



<?php
$conn = mysqli_connect("localhost","root","","fitonobi_database") ;

if(isset($_POST["insert"])) {
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$query = "INSERT INTO image_gallery (name) VALUES ('$file')";

	if (mysqli_query($conn, $query)) {
		echo '<script>alert("Image inserted successfully")</script>';
	}
}

?>


<title>Image Gallery - Dashboard</title>

<h1 style="padding: 10px; margin-top: 5%;">IMAGE GALLERY MANAGER</h1>


<div style="margin: 10px;">

<form method="post" enctype="multipart/form-data">
	<input type="file" name="image" id="image" />
	<br>
	<input style="margin: 10px;" type="submit" name="insert" value="Insert" class="btn btn-success">
</form>

</div>
	
	
<div class="row" style="margin-left: 10px;">

	<?php
	$query = "SELECT * FROM image_gallery ORDER BY id DESC";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		echo '
				<div class="column">
					<img src = "data:image/jpeg;base64,'.base64_encode($row['name']).'" style="width:100%" onclick="myFunction(this);"/>
				</div>
				
			';
	}
	?>
	</div>

	<div class="container">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:100%">
  <div id="imgtext"></div>
</div>


<script>
	$(document).ready(function(){
		$('#insert').click(function(){
			var image_name = $('#image').val();
			if (image_name == '') {
				alert("Please Select Image");
				return false;
			}
			else {
				var extention = $('#image').val().split('.').pop().toLowerCase();
				if(jQuery.inArray(extention, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert('Invalid Image File');
					$('#image').val('');
					return false;
				}
			}
		});
	});

function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}

</script>



