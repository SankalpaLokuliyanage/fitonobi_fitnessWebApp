<?php
  require 'header.php';
?>

<title>IMAGE GALLERY</title>

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
<body>


<?php
$conn = mysqli_connect("localhost","root","","fitonobi_database") ;

?>

<!-- The four columns -->
<div style="padding-top: 120px; margin-left: 10px;" class="row">
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
  

<div class="container">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:100%">
  <div id="imgtext"></div>
</div>

<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>

