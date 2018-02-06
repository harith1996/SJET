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
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
th{
padding:10px;
}

td{

text-align:center;
padding:10px;
}
tr{

margin-top:10px;
}
</style>

<?php 
include ('navbar2.php');
include ('db_sjet.php');
?>
<div style="background-color:#FFF;padding:30px;min-height:410px;" align="center">
<table>
<tr><th>Year of awarding the scholarship</th><th>Document of the awardees</th><th></th></tr>
<?php

if(isset($_POST['delete'])){
		$qry="select doc_path from DOCUMENTS where doc_id='$_POST[doc_id]'";	
		$result=mysqli_query($conn,$qry);
	        $row = mysqli_fetch_assoc($result);
		unlink($row['doc_path']);
		$qry="DELETE FROM DOCUMENTS WHERE doc_id = '$_POST[doc_id]'";
		if( mysqli_query($conn,$qry) ){
			echo "DB delete_update successful<br>";
		}
		else{
			echo "DB delete_update failed<br>";
		}
		}  

	
	$qry ="SELECT * FROM DOCUMENTS where doc_type = 'awarded' order by year DESC";
	$result = mysqli_query($conn,$qry);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<tr><td>$row[year]</td><td><a href ='$row[doc_path]'>View Awardees</a></td>";
			echo "<td style='padding-left:20px;'>  ";  ?>	
			<form method='post' enctype='multipart/form-data' onsubmit="return confirm('Are you sure you want to delete this list?');">
			<?php  echo "<input name='doc_id' type='text' value ='" . $row['doc_id'] . " 'hidden>
		  <input type='submit' class='btn btn-info btn-lg' value='Delete' id='references_submit' name='delete'><br>		
			</form>
			</td></tr>";
		}
		
	}
?>
</ul>
</div>
