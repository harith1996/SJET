
<?php
session_start();
include('navbar.php');
include('db_sjet.php');
echo "<div style='background-color:#FFF;padding:30px;min-height:410px;'>";
			$sql="SELECT sco_name,sco_doc_path FROM SCHOLARSHIPS order by position,sco_id";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
echo "<ol>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	if($row["sco_doc_path"] == "uploads/scholarship/")
	{
		echo "<li><strong><a href='application.php' class='style3'>$row[sco_name]</a></strong></li>";
	}
	else
	{
        	echo "<li><strong><a href='$row[sco_doc_path]' class='style3'>$row[sco_name]</a></strong></li>";
	}    
}
echo "</ol>";
} else {
    echo "0 results";
}
					
?>
</div>




