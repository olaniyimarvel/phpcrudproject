<?php
include ('code.php');
$userid = $_GET["id"];

try {
    $stmt = $conn->prepare("SELECT * FROM studentdata WHERE id =$userid");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll()as $k=>$v) {
        $id = $v{'id'};
        $fname = $v{'firstname'};
        $middlename = $v{'middlename'};
        $lastname = $v{'lastname'};
        $emailaddress = $v{'emailaddress'};
        $contactaddress = $v{'contactaddress'};
        $phonenumber = $v{'phonenumber'};
        $dateofbirth = $v{'dateofbirth'};
        $nameofinstitution = $v{'nameofinstitution'};
        $courseofstudy = $v{'courseofstudy'};
        $sex = $v{'sex'};
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<?php
if(isset($_POST['update']))
{
    //echo "It works";
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
try {
    $sql = "UPDATE studentdata SET firstname='$firstname', middlename='$middlename', lastname='$lastname', emailaddress='$emailaddress', contactaddress='$contactaddress', phonenumber='$phonenumber', dateofbirth='$dateofbirth', nameofinstitution='$nameofinstitution', courseofstudy='$courseofstudy', sex='$sex' WHERE id=$userid";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update a Record</title>
    <meta charset="utf-8">
</head>

<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Edit a record</h3>
                    </div>
             
                    <form class="form-horizontal" action="update2.php?id=<?php echo $id?>" method="post">
                      <div class="control-group"> 
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input name="firstname" type="text"  value="<?php echo $fname; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Middle Name</label>
                        <div class="controls">
                            <input name="middlename" type="text" value="<?php echo $middlename; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">last Name</label>
                        <div class="controls">
                            <input name="lastname" type="text" value="<?php echo $lastname; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="emailaddress" type="email" value="<?php echo $emailaddress; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Contact address</label>
                        <div class="controls">
                            <input name="contactaddress" type="text" value="<?php echo $contactaddress; ?>">
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <input name="phonenumber" type="text" value="<?php echo $phonenumber; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Date of birth</label>
                        <div class="controls">
                            <input name="dateofbirth" type="text" value="<?php echo $dateofbirth; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Name of Institution</label>
                        <div class="controls">
                            <input name="nameofinstitution" type="text" value="<?php echo $nameofinstitution; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Course of study</label>
                        <div class="controls">
                            <input name="courseofstudy" type="text" value="<?php echo $courseofstudy; ?>">
                        </div>
                      </div>
                      <div class= "form-group">
                      <label for="sex">Gender  </label>
                      <select class="form-control" name="sex" id="sex" required="" value="<?php echo $sex; ?>" name="sex">
                      <option value="">select gender</option>
                      <option value="m">male</option>"
                      <option value="f">female</option>"
              
                  </select>
               </div><br>
                      <div class="form-actions">
                          <button type="submit" name="update" value="update" class="btn btn-success">Update</button>
                          <a class="btn" href="record.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>