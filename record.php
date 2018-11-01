<?php
// connect to the database

require('code.php');

// get results from database

$sql = ("SELECT * FROM studentdata");
$stmt = $conn->prepare($sql);
$stmt->execute();
?>


<!DOCTYPE HTML>
<html>
<head>
<title>View Records</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!-- bootstrap  -->
  <!-- END CSS -->

  <!-- SCRIPT -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <!-- END SCRIPT -->
  <style>
table, th, td {
    border: 2px solid black;
}
</style>

</head>

<body>
<table>
	<thead>
		<tr>
		    <th>id</th>
			<th>first name</th>
			<th>middle name</th>
			<th>last name</th>
			<th>email address</th>
			<th>contact address</th>
			<th>phone number</th>
			<th>date of birth</th>
			<th>name of institution</th>
			<th>course of study</th>
			<th>sex</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php

// display data in table

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

echo '<tr>';
 echo '<td>'.$row['id'].'</td>';
 echo '<td>'.$row['firstname'].'</td>';
 echo '<td>'.$row['middlename'].'</td>';
 echo '<td>'.$row['lastname'].'</td>';
 echo '<td>'.$row['emailaddress'].'</td>';
 echo '<td>'.$row['contactaddress'].'</td>';
 echo '<td>'.$row['phonenumber'].'</td>';
 echo '<td>'.$row['dateofbirth'].'</td>';
 echo '<td>'.$row['nameofinstitution'].'</td>';
 echo '<td>'.$row['courseofstudy'].'</td>';
 echo '<td>'.$row['sex'].'</td>';
 echo '<td><a class= "update_btn" href="update2.php?id='.$row['id'].'">Edit</a></td>';
 echo '<td><a class= "del_btn" href="del.php?id='.$row['id'].'">Delete</a></td>';

echo '</tr>';
}
?>

	</tbody>
</table>	
</body>
</html>