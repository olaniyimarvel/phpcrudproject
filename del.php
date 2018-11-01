<?php
include ('code.php');
$userid = isset($_GET['id']) ? $_GET['id'] : '';

 if(isset($_POST['delete'])){
try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM `studentdata` WHERE id='$userid'";

    // use exec() because no results are returned
    //echo $sql;
     $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    header('location: record.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete a record</title>
    <meta charset="utf-8">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a Record</h3>
                    </div>
                     
                    <form class="form-horizontal" action="" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" name="delete" value="delete" class="btn btn-danger">Yes</button>
                          <a class="btn" href="record.php">No</a>
                      </div>
                    </form>
                </div>
                 
    </div> 
</body>
</html>
