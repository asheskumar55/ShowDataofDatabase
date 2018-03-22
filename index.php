<?php
	include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Table with database</title>
	<style>
		table{
			border-collapse: collapse;
			width: 100%;
			color:#588c7e;
			font-family: monospace;
			font-size: 25px;
			text-align: left;
		}
		th{
			background-color: #588c7e;
			color: white;
		}

		input{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
}
	</style>
</head>
<body>
	<table>
		<h1>Student Information</h1>
		<div>
		<form action="index.php" class="inputform" method="POST">
			First name: <br>
	<input type="Student Firstname" placeholder="Enter Firstname" name="Firstname"/>
	<br>
	Last name: <br>
	<input type="Student Lastname" placeholder="Enter Lastname " name="Lastname"/>
	<br>
	Rollno: <br>
	<input type="Student Rollno" placeholder="Enter Rollno" name="Rollno"/>
	<br>
	Class: <br>
	<input type="Student Class" placeholder="Enter Class" name="Class"/>
	<br>
	Section: <br>
	<input type="Student Section" placeholder="Enter Section" name="Section"/>
	<br>
	<br>
	<input type="submit" name="submit" value="insert"/>
	<br><br>
	</form>
	</div>
		<tr>
			<th>Student Id </th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Roll no</th>
			<th>Class</th>
			<th>Section</th>
		</tr>

		<?php 
			$sql="SELECT student_id,student_first,student_last,student_rollno,student_class,student_section from studentinfo";
			$result= mysqli_query($conn,$sql);
			$num=mysqli_num_rows($result);

			for($i=1;$i<=$num;$i++){
				$row=mysqli_fetch_array($result);
				echo "<tr><td>".$row["student_id"]."</td><td>".$row["student_first"]."</td><td>".$row["student_last"]."</td><td>".$row["student_rollno"]."</td><td>".$row["student_class"]."</td><td>".$row["student_section"]."</td></tr>";
			}

		 ?>
	</table>
</body>
</html>
<?php 
	if(isset($_POST['submit']))
	{
			$student_first = $_POST['Firstname'];
			$student_last= $_POST['Lastname'];
			$student_rollno= $_POST['Rollno'];
			$student_class= $_POST['Class'];
			$student_section= $_POST['Section'];
			$sql = "INSERT INTO studentinfo (student_first,student_last,student_rollno,student_class,student_section)
			VALUES ('$student_first', '$student_last', '$student_rollno','$student_class','$student_section')";
			if (mysqli_query($conn, $sql)) {
			    echo " ";
			}
			 else 
			 {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
	}
 ?>
