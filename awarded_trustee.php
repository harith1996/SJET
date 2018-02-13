<?php
session_start(); 
include("navbar2.php"); 
include("db_sjet.php");?>
<div style="background-color:#FFF;padding:20px;">
<form method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to add this list?');">
		    			<h3>Upload the pdf file containing the students awarded the scholarship</h3>
		    			<div class="button-section">
		    				<input type="file" name="fileToUpload" id="fileToUpload"><br> <br>
		    				<input type="number" name="year" placeholder="Year" width=6>&nbsp;&nbsp;Year<br><br>
		    				<input type="submit" value="Upload" id="course_submit" name="upload">
		   			</div>
	
				</form>
</div>
<?php
			if(isset($_POST['upload'])){
			$year = $_POST['year'];
			$target_dir = "uploads/awarded/";
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
			    } else {
				$uploadOk = 0;
				echo 'Sorry, there was an error uploading your file.';
			    }
			}
			
			$filename = $_FILES["fileToUpload"]["name"];
			$qry="INSERT INTO DOCUMENTS (doc_type,doc_name,doc_path,description,year) VALUES ('awarded','$filename','$target_file','',$year)";

			if($uploadOk != 0 && mysqli_query($conn,$qry)){
			
				echo "DB update successful<br>";
			}
			else{
				echo mysqli_error();
			}
			}
			?>
