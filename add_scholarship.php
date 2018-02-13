
<?php
session_start(); 
include("navbar2.php");
include("db_sjet.php");?>

<div style="background-color:#FFF;min-height:450px;">
		<form method="post" enctype="multipart/form-data" style="padding:20px;" onsubmit="return confirm('Are you sure you want to add this scholarship?');">
			<h3>Select Scholarship File to upload </h3>
		    		<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
				<input type="text" name="sco_name"  placeholder="Name of the Scholarship" style="width:500px;"><br><br>
				<input type="number" name="position"  placeholder="Position" ><br><br>
				<input type="submit" value="Upload" id="references_submit" name="uploadReference"><br><br>
			
			</form>
</div>




<?php 
		if(isset($_POST['uploadReference'])){
		$sco_name = $_POST[sco_name];
		$position = $_POST[position];
		$target_dir = "uploads/scholarship/";
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
		$qry="INSERT INTO SCHOLARSHIPS (sco_name,sco_doc_name,sco_doc_path,position) VALUES ('$sco_name','$filename','$target_file',$position)";

		if( mysqli_query($conn,$qry) ){
			echo "DB update successful<br>";
		}
		else{
			echo "DB update failed<br>";
		}
		} //uploading file end

?>
