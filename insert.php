<?Php
$first_name=$_POST['first_name'];
$middle_name=$_POST['middle_name'];
$last_name=$_POST['last_name'];
$email_address=$_POST['Email_address'];
$contact_address=$_POST['contact_address'];
$phonenumber=$_POST['phone number'];
$dateofbirth=$_POST['date of birth'];
$nameofinstitution=$_POST['name of institution'];
$courseofstudy=$_POST['course of study'];
$sex=$_POST['sex'];

//if (!empty($first_name) || !empty($last_name) || !empty($Email_address) || if !empty($contact_address) || if !empty($phonenumber)!empty ($dateofbirth) if !empty($nameofinstitution) || if !empty ($courseofstudy) || if !empty ($sex)){
	$host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
	$dbname ="studentdata";
	
	//create connection
	$conn = new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
	
	if (mysqli_onnect_error()){
		//die (connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	} else{
		$SELECT ="SELECT email_address from register where email_address = ? Limit 1";
		$INSERT =INSERT  into studentdata (firstname, middlename, lastname, emailaddress, contactaddress, phonenumber,
		dateofbirth, nameofinstitution, courseofstudy, sex) values(?,?,?,?,?,?,?,?,?,?)";
		
		//prepare statement
		$stmt = $conn=>prepare($SELECT),
		$stmt->bind_param("s", $email_address);
		$stmt->bind_result($email_address);
		$stmt->store_result();
		$rnum = $stmt=>num_rows;
		
		if ($rnum==0){
			$stsmt->close();
			
			$stmt = $conn=>prepare($INSERT);
			$stmt->bind_param("sssssiisss", $first_name, $middle_name, last_name, $email_address, $contact_address, $phone number, 
			$date of birth, $name of institution, $course of study, $sex)
			$stmt->execute();
			echo "New record inserted sucessfully";
		} else {
			echo "Someone already register using this email";
		}
		$stmt->close();
		$stmt->close();
	}
}




# code...
} else {
	echo "All fields are required";
	die();
}
?>