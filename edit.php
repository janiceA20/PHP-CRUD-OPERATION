<?php
  include "connection.php";
  $id="";
  $lastname="";
  $firstname="";
  $middlename="";
  $contact="";
  $date_of_birth="";

  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:myform/index.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from clients where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: myform/index.php");
      exit;
    }
    $lastname=$row["lastname"];
    $firstname=$row["firstname"];
    $middlename=$row["middlename"];
    $contact=$row["contact"];
    $date_of_birth=$row["date_of_birth"];

  }
  else{
    $id = $_POST["id"];
    $lastname=$_POST["lastname"];
    $firstname=$_POST["firstname"];
    $middlename=$_POST["middlename"];
    $contact=$_POST["contact"];
    $date_of_birth=$_POST["date_of_birth"];

    $sql = "update clients set lastname='$lastname', firstname='$firstname', middlename='$middlename', contact='$contact', date_of_birth='$date_of_birth' where id='$id'";
    $result = $conn->query($sql);
    
  }
  
?>
<!DOCTYPE html>
<html>
<head>
 <title>CRUD</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PHP CRUD OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Member </h1>
 </div><br>

 <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

 <label> Last Name: </label>
 <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control"> <br>

 <label> First Name: </label>
 <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control"> <br>

 <label> Middle Name: </label>
 <input type="text" name="middlename" value="<?php echo $middlename; ?>" class="form-control"> <br>

 <label> Contact: </label>
 <input type="text" name="contact" value="<?php echo $contact; ?>" class="form-control"> <br>

 <label> Date of Birth: </label>
 <input type="text" name="date_of_birth" value="<?php echo $date_of_birth; ?>" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>