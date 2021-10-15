<?php
  require 'header.php';
?>

<title>Articles</title>


<?php
$conn = mysqli_connect("localhost","root","","fitonobi_database") ;

?>

<?php
    $sql = "select * from data";
	$res = mysqli_query($conn,$sql);
?>

<div style="margin-top: 40px;"></div>

<?php
      
    while($row=mysqli_fetch_assoc($res)) { ?>
				<center><h2><?php echo $row['title']; ?></h2></center>
				<center><p>Published Date : <?php echo $row['a_date']; ?></p>
				</center>
    			
   				<p style=" margin: 20px;"><?php echo $row['article']; ?></p>
   				<p style="margin-right: 30px; float: right;">Author : <?php echo $row['name']; ?></p><br><br>

  </div>
<?php } ?>


