<?php require("navbar.php");
include("db_sjet.php");?>

<style>
td {
padding:10px;
}
h3{text-align:left};
</style>
  <div id="main">



<table >
<?php
$sql="SELECT * FROM FAQ  ";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result))
	{
echo "<tr><td style='width:50%'><h3> ". $row[faq_que]  . "</h3>";
echo "<p align='justify'>" . $row[faq_ans] . "</p></td>";
    if($row = mysqli_fetch_assoc($result))
      {
	echo "<td><h3> ". $row[faq_que]  . "</h3>";
        echo "<p align='justify'>" . $row[faq_ans] . "</p></td></tr>";
	}
  }
?>
</table>
</div>
</div>


</body>
</html>


