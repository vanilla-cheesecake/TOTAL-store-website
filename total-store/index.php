<?php
include '../midterm/php/connect.php';
session_start();
?>



<!DOCTYPE html>
<html>
    <head>
    <title>LOGIN</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href='../midterm/css/style.css'> 

</head>


<body>
<center>
<img src="../midterm/assets/banner/banner.png" alt="">
</center>

   
<div class="container-fluid">
	<div class="container">           
        <div class="row">
                            
 <div class="col-md-5">	 	
    <fieldset>			
        <form role="form" method="POST">
            <!-- USER REGISTRATION -->
            <h1 class="text-uppercase pull-center"> SIGN UP</h1>	
            <div class="form-group">
                <input class="form-control input-lg"  type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">    
                <input class="form-control input-lg" type="text" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" name="lastname" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" type="text" name="age" placeholder="Age">
                </div>
                <div class="form-check">
								<label class="form-check-label">
								  <input type="checkbox" class="form-check-input">
								  By Clicking register you're agree to our policy & terms
								</label>
							  </div>
                <div >
                    <input class="btn btn-lg btn-primary"  id="submit" type="submit" name="submit3" value="Signup">
                </div>
             
        </form>
        </fieldset>

</div>


        <div class="col-md-2">
					<!-------null------>
                </div>
            	<div class="col-md-5">
                <form role="form" method="POST">
                    <fieldset>		
            <!-- USER LOGIN -->
            <h1 class="text-uppercase">USER</h1>
            <div class="form-group">
                <input class="form-control input-lg" type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
       <input class="form-control input-lg" type="text" name="password" placeholder="Password">
                </div>
                <div>
                <input class="btn btn-lg btn-primary" id="submit" type="submit" name="submit1" value="Login">
            </div>
</fieldset>
        </form>
</div>    
</div>
</div>
  




<?php
    // USER SUBMIT DATABASE BASE INSERT CODE HEREEEE
    // CHECK USER VALIDITY
    if(isset($_POST['submit1'])){
        // STORE INPUT INTO PHP VARIABLE
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];
        // DATA QUERY
		$select = $db->query("SELECT * FROM user WHERE username = '$user_username' AND password = '$user_password'");
		$count = $select->num_rows;
		$row = $select->fetch_assoc();
		if($count == 1){
        // REDIRECT INTO MAIN PAGE
        header('Location: home.php');
    }else { ?>
       <script>alert('Invalid username or password!')</script>
       
    <?php }}
    // ADMIN SUBMIT DATABASE BASE INSERT CODE HEREEEE
    if(isset($_POST['submit2'])){
        // STORE INPUT INTO PHP VARIABLE
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];
        // DATA QUERY
		$select = $db->query("SELECT * FROM super_admin WHERE username = '$user_username' AND password = '$user_password'");
		$count = $select->num_rows;
		$row = $select->fetch_assoc();
		if($count == 1){
        // REDIRECT INTO MAIN PAGE
        header('Location: admin.php');
    }else { ?>
       <script>alert('Invalid admin username or password!')</script>
       
<?php }}
    // REGISTER
    if(isset($_POST['submit3'])){
        // STORE INPUT INTO PHP VARIABLE
        $username = $_POST['username'];
		$password = $_POST['password'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        // INSERT DATA INTO USER TABLE    
        $insert = $db->query("INSERT INTO user(`username`, `password`, `name`, `lastname`, `age`, `date`) VALUES 
                                        ( '$username' ,'$password','$name','$lastname', '$age', NOW())");
        // DATA QUERY
        $select = $db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password' AND name = '$name' AND lastname = '$lastname' AND age = '$age'");
        $count = $select->num_rows;
		$row = $select->fetch_assoc();
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['lastname'] = $row['lastname'];
		$_SESSION['age'] = $row['age'];
		header('Location: home.php');
    }

?>




</body>
</html>