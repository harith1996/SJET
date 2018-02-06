<?php require("navbar.php");
include("db_sjet.php");?>
<div style='background-color:#FFF;padding:20px;min-height:410px;'>
<h3 style="color:#000;">Contact Us</h3>
You can send us a message by completing the form given below.  
<br><br>
<form method="post" action="notification.php">
<table>
	<tr>
		<td>Full Name :</td> <td><input type="text" name="name" required></td>
	</tr>
	<tr>
		<td>E-mail :</td> <td><input type="email" name="email" required></td>
	</tr>
	<tr>
		<td>Subject :</td> <td><input type="text" name="subject" required></td>
	</tr>
	<tr>
		<td>Message :</td> <td><textarea name="message" cols = 70 rows = 20 required></textarea></td>
	</tr>
</table>
<center><input type="submit" value="Send message"></center>
</form>
<br><br><br>
</div>

