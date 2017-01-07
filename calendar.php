<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Event Calendar</title>
</head>
<style>
	.today{
		background-color:#4ee;
	}
	.event{
		background-color:red;
	}
</style>
<?php
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	$db=mysql_select_db("event") or die(mysql_error());
	if(isset($_GET['day'])){
		$day=$_GET['day'];
	}
	else{
		$day=date('j');
	}
	if(isset($_GET['month'])){
		$month=$_GET['month'];
	}else{
		$month=date("n");
	}
	if(isset($_GET['year'])){
		$year=$_GET['year'];
	}else{
		$year=date("Y");
	}
	
	
	$currentTimeStamp=strtotime("$year-$month-$day");
	$monthName=date("F",$currentTimeStamp);
	$numDays=date("t",$currentTimeStamp);
	$counter=0;
?>
<body>
	<table celpadding="0" cellspacing="0" border="1">
		<tr>
			<td> <input type="button" name="previousbutton" value="<<" onclick="goLastMonth(<?php echo $month.','.$year;?>)"></td>
			<td colspan="5" align="center"><?php echo $monthName."/".$year;?></td>
			<td ><input type="button" name="nextbutton" value=">>" onclick="goNextMonth(<?php echo $month.','.$year;?>)"></td>
		</tr>
		<tr>
			<td width="50px" align='center'>Sun</td>
			<td width="50px" align='center'>Mon</td>
			<td width="50px" align='center'>Tue</td>
			<td width="50px" align='center'>Wed</td>
			<td width="50px" align='center'>Thu</td>
			<td width="50px" align='center'>Fri</td>
			<td width="50px" align='center'>Sa</td>
		</tr>
		<?php
			echo "<tr>";
				for($i=1; $i < $numDays; $i++,$counter++){
					$timeStamp=strtotime("$year-$month-$i");
					if($i == 1){
						$firstDay=date("w",$timeStamp);
					}
					
					if($i % 7 ==0){
						echo "</tr><tr>";
					}
					$monthstring=$month;
					$monthlength= strlen($monthstring);
					$daystring=$i;
					$daylength=strlen($daystring);
					if($monthlength <= 1){
						$monthstring = "0".$monthstring;
					}
					if($daylength <= 1){
						$daystring = "0".$daystring;
					}
					$todayDate=date("m/d/Y");
					$dateToCompare=$monthstring. "/" .$daystring. "/" .$year;
					echo "<td align='center'";
					if($todayDate ==$dateToCompare){
						echo "class='today'";
					}else{
						$sqlcount=mysql_query("SELECT * FROM eventcalendar WHERE eventdate='".$dateToCompare."'");
						$noEvent=mysql_num_rows($sqlcount);
						if($noEvent >=1){
							echo "class='event'";
						}
					}

					echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";

				}
			echo "</tr>";
		?>
	</table>
	<?php
		if(isset($_GET['v'])){
			echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=false'>Add Event</a>";
			if(isset($_GET['f'])){
				include('event.php');
			}
		}
	?>
	<script type="text/javascript">
		function goLastMonth(month,year){
			if(month==1){
				--year;
				month=13;
			}
			--month;
			var monthstring=""+month+"";
			var monthlength=monthstring.length;
			if(monthlength <= 1){
				monthstring = "0"+monthstring;
			}
			document.location.href="<?php echo $_SERVER['PHP_SELF']; ?>?month="+monthstring+"&year="+year;
		}

		function goNextMonth(month,year){
			if(month==12){
				++year;
				month=0;
			}
			++month;
			var monthstring=""+month+"";
			var monthlength=monthstring.length;
			if(monthlength <= 1){
				monthstring = "0"+monthstring;
			}
			document.location.href="<?php echo $_SERVER['PHP_SELF']; ?>?month="+monthstring+"&year="+year;
		}
	</script>
	<?php
		$eventdate=$month."/".$day."/".$year;
		$eventsql=mysql_query("SELECT * FROM eventcalendar WHERE eventdate='".$eventdate."'");
		while($row=mysql_fetch_array($eventsql)){ ?>
		<p><b><?php echo $row[1]?></b>: <?php echo $row[2];?><hr/></p>

	<?php
		}
	?>
</body>
</html>
