<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Event</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&f=false" name="eventform" method="post">
		<table>
			<tr>
				<td width="100px">Title</td>
				<td><input type="text" name="title" id=""></td>
			</tr>
			<tr>
				<td width="100px">Detail</td>
				<td><textarea name="detail" id="" cols="30" rows="6"></textarea></td>
			</tr>
			<tr>
				<td width="100px"></td>
				<td><input type="submit" value="Add Event" name="add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	if(isset($_POST['add'])){
		$title=$_POST['title'];
		$detail=$_POST['detail'];
		$eventdate=$month."/".$day."/".$year;
		mysql_query("INSERT INTO eventcalendar(titile,detail,eventdate,eveventadded) VALUES('".$title."','".$detail."','".$eventdate."','".date('m/d/Y')."')")  or die(mysql_error());
		echo "Event was add successfuly!";

	}
?>