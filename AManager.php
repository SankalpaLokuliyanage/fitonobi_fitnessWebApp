<?php
  require 'dashboardHeader.php';
?>


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


 		
 <?php	} ?>



 	<div style = "padding: 10px;"class="row justify-content-center">
 		<table class="table">
 			<thead>
 				<tr>
 					<th>Title</th>
 					<th>Author Name</th>
 					<th>Published Date</th>
 					<th colspan="2">Action</th>
 				</tr>
 			</thead>
 			<?php
 			
     while($row=mysqli_fetch_assoc($res)) { ?>
         <tr>
         	<td><?php echo $row['title']; ?></td>
         	<td><?php echo $row['name']; ?></td>
         	<td><?php echo $row['a_date']; ?></td>
         	<td>
         		
         		<a href="AManager.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
         	</td>
         </tr>

     
 <?php } ?>
 				
 		</table>
 	</div>

 
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
			header('a_date: AManager.php');
        // header("a_date: ../crud.php?crud=success");
   		} else {
        header("a_date: ../AManager.php?error=sqlerror");
    	}
	 }

	 if (isset($_GET['delete'])) {
	 	$id = $_GET['delete'];

	 	$del = "DELETE FROM data WHERE id=$id";

	 	if($conn->query($del)){
	 		$_SESSION['message'] = "Record has been deleted!";
			$_SESSION['msg_type'] = "danger";
			header('a_date: AManager.php');
	 	}
	 	else {
        header("a_date: ../AManager.php?error=sqlerror");
    	}
	 }

	 // if (isset($_GET['edit'])) {
	 // 	$id = $_GET['edit'];

	 // 	$ed = "SELECT * FROM data WHERE id=$id";

	 // 	if ($conn->query($ed)) {
	 		
	 // 			$row=mysqli_fetch_assoc($res);
	 // 			$name = $row['name'];
	 // 			$a_date = $row['a_date'];
	 		
	 // 	}
	 // 	else {
	 // 		header("a_date: ../adminpanel_articleManager.php?error=sqlerror");
	 // 	}
	 // }

?>