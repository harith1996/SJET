
<?php
session_start(); 
include("navbar2.php");
include("db_sjet.php");?>

<div style="background-color:#FFF;min-height:450px;">
		<form method="post" enctype="multipart/form-data" style="padding:20px;" onsubmit="return confirm('Are you sure you want to add this question?');">
			<h3>Add FAQ's </h3>
				<textarea name="question" rows="2" cols="70" placeholder="Question" required></textarea><br><br>
				<textarea name="answer" rows="4" cols="70" placeholder="Answer" required></textarea><br>
				<input type="submit" value="Submit" id="references_submit" name="uploadFaq"><br><br>
			
			</form>
</div>




<?php 
		if(isset($_POST['uploadFaq'])){
		$question = $_POST[question];
		$answer = $_POST[answer];
		$qry="INSERT INTO FAQ (faq_que,faq_ans) VALUES ('$question','$answer')";

		if(mysqli_query($conn,$qry) ){
			echo "DB update successful<br>";
		}
		else{
			echo "DB update failed <br>". mysqli_error(); ;
		}
		} //uploading file end

?>
