<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$doc_id = $_POST['doc_id'];
	$doc_name = $_POST['doc_name'];
	$doc_age = $_POST['doc_age'];
	$doc_speciality = $_POST['doc_speciality'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($doc_id) || empty($doc_name) || empty($doc_age)) {
				
		if(empty($doc_id)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($doc_name)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($doc_age)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		//insert data to database	
		$check="SELECT * FROM doctor WHERE doc_id = '$doc_id'";
		$res = mysqli_query($mysqli,$check);

		if($res->num_rows){
			echo "<script type='text/jscript'>alert('Doctor with this id already present')</script>";
		}else{
			$result = mysqli_query($mysqli, "INSERT INTO doctor(doc_id, doc_name, doc_age, doc_speciality) VALUES('$doc_id','$doc_id','$doc_id', '$doc_id')");

			//display success message
			echo "<font color='green'>Data added successfully.";
			echo "<br/><a href='doctor_details.php'>View Result</a>";
		}
	}
}
?>
</body>
</html>
