
<?php
session_start();
include("navbar2.php");
include("db_sjet.php");?>

<div style="background-color:#FFF;min-height:450px;">
<?php 
if(isset($_POST["appl_btn"]))
{
	if($_POST["appl_btn"]=='Enable application')
	{
		$qry = "UPDATE APPLICATION SET ready = 1 where ready = 0";
		mysqli_query($conn,$qry);
	}
	else
	{
		$qry = "UPDATE APPLICATION SET ready = 0 where ready = 1";
		mysqli_query($conn,$qry);
	}
}

?>
<div style="float:right;padding:10px;">
<form method="post" onsubmit="return confirm('Are you sure you want to continue?');">
<?php
$qry = "SELECT * FROM APPLICATION";
$result= mysqli_query($conn,$qry);
$row = mysqli_fetch_assoc($result);
if($row["ready"] == 0)
{
echo '<input style="background:green;padding:5px;" type="submit" name="appl_btn" value="Enable application">';
}
else
{
echo '<input style="background:red;padding:5px;" type="submit" name="appl_btn" value="Disable application">';
}

?>
</form>
</div>
		<form method="post" enctype="multipart/form-data" style="padding:20px;" onsubmit="return confirm('Are you sure you want to add this news?');">
			<h3>Select News File to upload </h3>
		    		<input type="file" name="fileToUpload" id="fileToUpload"><br><br>OR<br>
				<br><input type="text" placeholder="URL to link" name='web'><br><br>
				<textarea name="description" rows="4" cols="70" placeholder="Title" required></textarea><br>
				<input type="submit" value="Upload" id="references_submit" name="uploadReference"><br><br>
			
			</form>
<ul>
         
<?php   echo exec('whoami'); 
		if(isset($_POST["delete"])){
		unlink($_POST["doc_path_remove"]);
		$sql = "DELETE from NEWS where news_id = '$_POST[doc_id]'";
		mysqli_query($conn,$sql);  
		}

		if(isset($_POST['uploadReference'])){
			$description = $_POST["description"];
			if($_POST["web"]=='')
			{
				$target_dir = "uploads/news/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$fi = new FilesystemIterator($target_dir, FilesystemIterator::SKIP_DOTS);
				$path_parts = pathinfo($target_file);
				// Check if file already exists
				if (file_exists($target_file)) {
			       $num= iterator_count($fi);
            		$target_file = $path_parts['dirname']. "/" . $path_parts['filename'] . $num . "." . $path_parts['extension'];
				    $uploadOk = 1;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.<br>";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
					} 
				    else {
					$uploadOk = 0;
					echo "Sorry, there was an error uploading your file.";
		 
				    }
				}
				$filename = $_FILES["fileToUpload"]["name"];
		
				$qry="INSERT INTO NEWS (news_doc_name,description,news_doc_path) VALUES ('$filename','$description','$target_file')";

				if( mysqli_query($conn,$qry) ){
					echo "DB update successful<br>";
				}
				else{
					echo "DB update failed<br>";
				}
				} 
			else{
				$target = $_POST['web'];
				$qry="INSERT INTO NEWS (news_doc_name,description,news_doc_path) VALUES ('$target','$description','$target')";

				if( mysqli_query($conn,$qry) ){
					echo "DB update successful<br>";
				}
				else{
					echo "DB update failed<br>";
				}
				
			}
			}
		
echo "<h3>EDIT NEWS</h3>";
			$sql="SELECT * from NEWS" ;
			$result = mysqli_query($conn,$sql);
			echo "<table>";
			if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result)){
	echo "<tr><td style='padding:20px;'><li><span class='style8'> <a href= '$row[news_doc_path]'>  $row[description] </a></a></span> </li></td>";?>
	<td style='padding:20px;'><form method='post' enctype='multipart/form-data' onsubmit="return confirm('Are you sure you want to delete?');">
		<?php echo"	<input type='hidden' name='doc_path_remove' value='".$row["news_doc_path"]."'>
				<input type='hidden' name='doc_id' value='$row[news_id]'>
				<input type='submit' name='delete' value ='Delete News'></form></td></tr>";
				}
	echo "</table>";
		}
?> 
        </ul>
</div>
