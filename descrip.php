
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-theme.css" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="font/css/font-awesome.css">	
	<link rel="stylesheet" href="css/form.css" />
	<link rel="stylesheet" href="css/examples1.css" />
	<script src="js/jquery-2.2.2.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.js"></script>
</head>


<?php 
include ('navbar2.php');
include ('db_sjet.php');
if(isset($_POST['descr'])){
		$qry="delete from home_desc";
		mysqli_query($conn,$qry);
		$qry = "insert into home_desc values ('$_POST[description]')";
		if( mysqli_query($conn,$qry) ){
	    			echo("<script type='text/javascript'> alert('Home page description changed successfully'); </script>");
		}
		else{
	    			echo("<script type='text/javascript'> alert('Home page description failed to change.'); </script>");
		}
}
?>
<div style="background-color:#FFF;padding:20px;min-height:410px;">
<form method = 'post'>
<?php
		$qry="Select description FROM  home_desc";
		$result = mysqli_query($conn,$qry);
		$row = mysqli_fetch_assoc($result);
		echo "<textarea cols='112' rows='20' name='description'>$row[description]</textarea><br><center><input type='submit' value='Change Description' name='descr'></center>";
		
?>
</form>
</div>
