<?php
session_start(); 
include('navbar2.php'); 
include("db_sjet.php");?>
<div style="background-color:#FFF;padding:20px;">
<form style="text-align:center;padding:10px;" method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to add this account?');">
				<div class="section">
				
				<input type="text" name="donator_name" placeholder="Name"	required><br><br>
				<input type="text" name="curr_pos" placeholder="Current Position" ><br><br>
				<input type="email" name="email" placeholder="E-mail" required><br><br>
				<input type="tel" name="phone" placeholder="Phone Number" required><br><br>
				<input type="number" name="amount" placeholder="Amount Donated" required><br><br>
				<input type="number" name="year" placeholder="Year" required><br><br>
			<textarea name="other_info" placeholder="Other Information" cols ='20' rows'8'></textarea><br><br>
				Select the donator photo to upload
				<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
				<input type="submit" value="Add Donator" name="register" id="reg_btn">
		</div><br><br>		
		</form>
</div>
</div>
<?php
			if(isset($_POST['register'])){
		$name = $_POST['donator_name'];
		$curr_pos = $_POST['curr_pos'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$amount = $_POST['amount'];
		$year = $_POST['year'];
		$other_info = $_POST['other_info'];
		$target_dir = "uploads/donator/";
		$uploadOk = 1;
		if(basename($_FILES["fileToUpload"]["name"])==''){$target_file = $target_dir . 'profile_pic.jpg';}
		else{
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
		}
		$filename = $_FILES["fileToUpload"]["name"];
		$qry="INSERT INTO DONATORS (donator_name,donator_email,donator_mobile,donator_amount,donator_year,donator_photo_path,current_position,other_info) VALUES ('$name','$email','$phone',$amount,$year,'$target_file','$curr_pos','$other_info')";

		if($uploadOk!= 0 && mysqli_query($conn,$qry) ){
			echo "DB update successful<br>";
		}
		else{
			echo "DB update failed<br>";
		}
		} //uploading file end
			?>
