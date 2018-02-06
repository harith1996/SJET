<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if($_SESSION["CHECK"]!=1)
{
header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<script type="text/javascript"  src="jquery-2.2.2.js"></script>
<!--<script type="text/javascript">
$(document).ready(function(){
  $("input").focus(function(){
    $("input").css("background-color","#FFFFCC");
  });
  $("input").blur(function(){
    $("input").css("background-color","#D6D6FF");
  });
});
</script>-->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Your description goes here" />
	<meta name="keywords" content="your,keywords,goes,here" />
	
	<link rel="stylesheet" type="text/css" href="css/sjet.css" title="Variant Multi" media="all" />
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
<a style="color:#FFFFFF; float:right;padding-right:30px;" href="logout.php" >Logout</a>
    <div class="form" style="padding-top:13px; "><img src="nitc_logo.png" style=" height:62px;"> </div>
    <h1 style="size:12px; color:#FFFFFF;">Silver Jubilee Endowment Trust</h1>
    <h2 style="color:#FFFFFF; text-decoration:none;">National Institute of Technology Calicut</h2>
  </div>
  <ul class="topmenu" style="padding-top:10px;">
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="admin_home.php">Update News</a> </li>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="descrip.php">Home page Description</a>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="#">Trustees</a>
        <ul>
          <li><a  style="text-decoration:none; font-weight:bold" href="trusteesupdate.php">Add Trustees </a></li>
          <li><a  style="text-decoration:none; font-weight:bold" href="trusteedelete.php">Modify Trustees</a></li>
	</ul>
    </li>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="#">Scholarship</a>
        <ul>
          <li><a  style="text-decoration:none; font-weight:bold" href="add_scholarship.php">Add Scholarship </a></li>
          <li><a  style="text-decoration:none; font-weight:bold" href="delete_scholarship.php">Modify Scholarship</a></li>
	</ul>
    </li>

    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="#">Scholarship Awardees</a>
        <ul>
          <li><a  style="text-decoration:none; font-weight:bold" href="awarded_trustee.php">Add Scholarship Awardees </a></li>
	  <li><a  style="text-decoration:none; font-weight:bold" href="awarded_view.php">Modify Scholarship Awardees</a></li>
	</ul>
    </li>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="#">Donators</a>
        <ul>
          <li><a  style="text-decoration:none; font-weight:bold" href="donators_trustee.php">Add Donators </a></li>
	  <li><a  style="text-decoration:none; font-weight:bold" href="donators_view.php">Modify donators</a></li>
	</ul>
    </li>
    <li class="submenu"><a  style="text-decoration:none; font-weight:bold" href="#">FAQs</a>
        <ul>
          <li><a  style="text-decoration:none; font-weight:bold" href="add_faq.php">Add FAQ </a></li>
          <li><a  style="text-decoration:none; font-weight:bold" href="delete_faq.php">Delete FAQ</a></li>
	</ul>
    </li>

   </ul>


