<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM doctor ORDER BY doc_id asc");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="doctor_add.html">Add New Doctor</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>id</td>
			<td>name</td>
			<td>age</td>
			<td>speciality</td>
			<td>update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['doc_id']."</td>";
			echo "<td>".$res['doc_name']."</td>";
			echo "<td>".$res['doc_age']."</td>";
			echo "<td>".$res['doc_speciality']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[doc_id]\">Edit</a> | <a href=\"delete.php?id=$res[doc_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
