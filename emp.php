<?php 
$DB_servername="localhost";
$DB_username="root";
$DB_password="";
$DB_Name="test";

$connection=mysqli_connect($DB_servername,$DB_username,$DB_password,$DB_Name);
if(!$connection){
  die("Failed".mysqli_connect_error());
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Info</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
     <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Employee Table</a>
          </div>
        </div>
      </nav>
    </div>
    <div class="container">
      <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
    <i class="fa fa-plus"></i> Add Employee
    </button>
 
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="container">
    <h2>New Employee</h2>
  
  </div>
      <div class="modal-body">
      <form action="emp_store.php" method="post">
<table id="empTbl" class="table">
  <tr>
  <td>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name[]" class="form-control" required id="name" aria-describedby="emailHelp" placeholder="Enter Name">
            <span style="color:red"> </span><br>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email[]" class="form-control"  required id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group">
            <label >Mobile</label>
            <input type="number" name="mobile[]" class="form-control" required id="mobile"   placeholder="Mobile">
          </div>

          <div class="form-group">
            <label >Gender</label>     
            <select class="form-control" aria-label="Default select example" id="gender" name="gender[]">
            <option value="male">Male</option>
            <option value="Female">Female</option>
            </select>
          </div>
      
          <div class="form-group">
            <label >Date of Birth</label>
            <input type="date" name="date[]" class="form-control"   id="dob" placeholder="Date of Birth">
          </div>

          <div class="form-group">
            <label >Salary</label>
            <input type="number" name="salary[]" class="form-control" id="salary" placeholder="Salary">
          </div>
          
          </td>
          </tr>
        </table>
          <button type="submit" name="save_multiple_data" class="btn btn-primary" value="Submit Form">Submit</button>
        </form>
          
         </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-success" id="add">
          <i class="fa fa-plus"></i> Add More
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
  </div>
</div>
</div>

<div class="container">
  <?php
        $sql = "select * from emp";
        $result = mysqli_query($connection, $sql) or die("failed");
        $output = "";
        if(mysqli_num_rows($result)>0){
           
           $th= " <table class='table'><th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Date</th>
            <th>Salary</th>
            ";

            while($row = mysqli_fetch_assoc($result)){
                $output= $output."<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['gender']}</td>
                  <td>{$row['date']}</td>
                  <td>{$row['salary']}</td></tr>
                  ";
                  }
                  mysqli_close($connection);
                  echo $th ."<br>";
                  echo $output;
          }
?></table> 
</div>
<script>
$(document).ready(function(){

    $("#add").click(function(){

      var htmlString= "<tr class='main-form'><td> <label>Add New Employee</label><br><label>Name</label><input required type='text' name='name[]' id='name' class='form-control'>"
      htmlString+= "<label>Email</label><input type='email' required name='email[]' id='email' class='form-control'>"
      htmlString+= "<label>Mobile</label><input type='number' name='mobile[]' id='mobile' class='form-control'>"
      htmlString+= "<label>Gender</label><select class='form-control' aria-label='Default select example' id='gender' name='gender[]'><option value='male'>Male</option> <option value='Female'>Female</option> </select>"
      htmlString+= "<label>Date of Birth</label><input type='date' id='date' name='date[]' class='form-control'>"
      htmlString+= "<label>salary</label><input type='number' id='salary' name='salary[]' class='form-control'>"
      htmlString+="<button type='button' class='btn btn-danger' id='remove-btn'><i class='fa fa-minus'></i> Remove </button>"
      htmlString+="</td></tr>"
     $('#empTbl').append(htmlString);
    });  
    
    $(document).on('click', '#remove-btn', function () {
        $(this).closest('.main-form').remove();
    });
});
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
</body>
</html>