<?php require("navbar.php");
include("db_sjet.php");?>

  <div id="main" style="min-height:410px;">

    <div id="sidebar">
      <div class="sidebarbox">
	<marquee>
	<?php
		$qry = "SELECT * from APPLICATION";
		$result = mysqli_query($conn,$qry);
		$row = mysqli_fetch_assoc($result);
		if($row["ready"]==1)
		{
			echo "<p ><a style='color:green;font-weight:700' href ='application.php'> Applications are open! </a></p>";
		} 
		else
		{
			echo "<p style='color:red;font-weight:700'>Applications are closed!</p>";
		} 

	?>
	</marquee>
        <h2>News/Announcements</h2>
        <ul>
         
<?php    
			$sql="SELECT * from NEWS" ;
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result)){
	echo "<li><span class='style8'> <a href= '$row[news_doc_path]'>  $row[description] </a></a></span> </li>";
				}
		}
?>
        </ul>
        </div>
      </div>
    <strong>
      <div id="content">
        <h3>SILVER JUBILEE ENDOWMENT TRUST</h3>
        <p align="justify"><?php $sql ="select * from home_desc";
				$result = mysqli_query($conn,$sql);
				if($row = mysqli_fetch_assoc($result))
				echo "$row[description]";?> 

 
      </div>
      
    </strong></div>
  <strong>
  <div id="footer">
    
    
  </div>
</strong></div>
</div>
</div>
</body>
</html>


