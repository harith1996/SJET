<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<script type="text/javascript"  src="js/jquery-2.2.2.js"></script>


	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Your description goes here" />
	<meta name="keywords" content="your,keywords,goes,here" />
	<meta name="author" content="Your Name / Original design by andreasviklund.com" />
	<link rel="stylesheet" type="text/css" href="css/sjet.css" title="Variant Multi" media="all" />
	<link rel="stylesheet" type="text/css" href="css/login.css" title="Variant Multi" media="all" />
	<title>SJET</title>

	    <style type="text/css">
<!--
.style6 {
	color: #9DC18E;
	font-weight: bold;
}
.style8 {color: #96A867; font-weight: bold; }
-->
        </style>
</head>

<body >
<div id="container980">
	
  <!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
  <div id="header" style="padding:30px 10px;">


<button style="text-align:right;float:right;" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01"  class="modal">
  
  <form class="modal-content animate" method="post" action="" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" class="login" placeholder="Enter Username" name="username" required>

      <label><b>Password</b></label>
      <input type="password" class="login" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="login_submit" style="width:100%;background-color:#047F05;">Login</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
    <?php
include("db_sjet.php");
if(isset($_POST['login_submit']))
{
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $sql="SELECT * FROM admin WHERE admin_id='".$user."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $DBpass = $row['password'];
    if($DBpass==$pass)
    {
        header("Location: login.php");
        exit();
    }
		else
    {
            echo("<script type='text/javascript'> alert('Invalid username or password'); </script>");		
    }
}
    else {echo "sup";}
?>

</div>

<script>

var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <div class="form"><img src="nitc_logo.png" style="padding-top:13px; height:62px;"> </div>
    <h1 style="size:12px; color:#FFFFFF;">Silver Jubilee Endowment Trust</h1>
    <h2 style="color:#FFFFFF; text-decoration:none;">National Institute of Technology Calicut</h2>
  </div>
  <ul class="topmenu" style="padding-top:10px;">
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="index.php">Home</a> </li>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="#">Scholarships</a>
        <ul>
          <li><a  style="text-decoration:none; font-weight:bold" href="schol_list.php">List of Scholarships </a></li>
          <li><a  style="text-decoration:none; font-weight:bold" href="application.php">Application Form</a></li>
	</ul>
    </li>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="trustees.php">Trustees</a> </li>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="awarded.php">Awarded Students</a></li>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="#">Donators</a>
        <ul>
          <li><a  style="text-decoration:none; font-weight:bold" href="donators.php">List of Donators </a></li>
          <li><a  style="text-decoration:none; font-weight:bold" href="benefits.php">Benefits of Donating</a></li>
	</ul>
    </li>
    <li class="submenu"><a   style="text-decoration:none; font-weight:bold"href="faq.php">FAQs</a> </li>
    <li class="submenu"><a   style="text-decoration:none; font-weight:bold"href="new_scholarship.php">Contact Us</a> </li>
  </ul>

