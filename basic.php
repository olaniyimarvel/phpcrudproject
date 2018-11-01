<?php
include('code.php');
if(isset($_POST['insert']))
{

  //echo "Loading Fine";
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $emailaddress = $_POST['emailaddress'];
  $contactaddress = $_POST['contactaddress'];
  $phonenumber = $_POST['phonenumber'];
  $dateofbirth = $_POST['dateofbirth'];
  $nameofinstitution = $_POST['nameofinstitution'];
  $courseofstudy = $_POST['courseofstudy'];
  $sex = $_POST['sex'];
  

  //$query
  $pdoQuery = "INSERT INTO `studentdata`(`firstname`,`middlename`, `lastname`, `emailaddress`, `contactaddress`, `phonenumber`, `dateofbirth`, `nameofinstitution`, `courseofstudy`, `sex`) VALUES ('$firstname', '$middlename', '$lastname', '$emailaddress', '$contactaddress', '$phonenumber', '$dateofbirth', '$nameofinstitution', '$courseofstudy', '$sex')";
  $pdoResult = $conn->query($pdoQuery);
  $successmessage = $pdoResult -> rowCount ();
  if ($successmessage > 0) {
echo "<script> alert ('Data Submitted Successfully') ; </script>";
}

}
?>
<!Doctype>
<html lang="en">
<head>
<title> Basic Student data Information </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!-- bootstrap  -->
  <!-- END CSS -->

  <!-- SCRIPT -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <!-- END SCRIPT -->
</head>

<body>
<div class="container">
<div class="row">
<div class="col-md-offset-3 col-md-6">
<h2 class="text-center">BASIC STUDENT DATA INFORMATION</h2>
<h3 class="text-center">PLEASE ENTER YOUR DETAILS</h3>
<form action="basic.php" method="POST">
<div class= "form-group">
<label for="firstname">First Name</label>
<input type="text" class="form-control" id="firstname" required="" name="firstname">
</div>
<div class= "form-group">
<label for="middlename">Middle Name</label>
<input type="text" class="form-control" id="middlename" required="" name="middlename">
</div>
<div class= "form-group">
<label for="lastname">Last Name</label>
<input type="text" class="form-control" id="lastname" required="" name="lastname">
</div>
<div class= "form-group">
<label for="emailaddress">Email Address</label>
<input type="text" class="form-control" id="emailaddress" required="" name="emailaddress">
</div>
<div class= "form-group">
<label for="contactaddress">Contact Address</label>
<input type="text" class="form-control" id="contactaddress" required="" name="contactaddress">
</div>
<div class= "form-group">
<label for="phonenumber">Phone Number</label>
<input type="text" class="form-control" id="phonenumber" required="" name="phonenumber">
</div>
<div class= "form-group">
<label for="dateofbirth">Date of birth </label>
<input type="text" class="form-control" id="dateofbirth" placeholder="yyyy-mm-dd" required="" name="dateofbirth"><br>
</div>
<div class= "form-group">
<label for="nameofinstitution">Name of Institution</label>
<input type="text" class="form-control" id="nameofinstitution" required="" name="nameofinstitution">
</div>
<div class= "form-group">
<label for="courseofstudy">Course of study</label>
<input type="text" class="form-control" id="courseofstudy" required="" name="courseofstudy">
</div>
<div class= "form-group">
<label for="sex">Gender  </label>
<select class="form-control" name="sex" id="sex" required="" name="sex">
<option value="">select gender</option>
<?php              
            $sql = "SELECT * FROM `gender` where status='1'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='".$data['id']."'>".$data['sex']."</option>";
            }

            ?> 
          </select>
        </div><br>
<button type="submit" class= "btn btn-default" name="insert" id="insert">Submit</button>

</body>
<a style="text-align:center;" class="record_btn" href="record.php">view records</a>
</html>

