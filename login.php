<?php
$invalidData='';
$success=$user='';
$errors['username']=$errors['password']='';
$username=$password='';
if(isset($_POST['submit'])){
  if(empty($_POST['username'])){
    $errors['username']= 'A username is required';
  }else{
    $username=$_POST['username'];
  }
  if(empty($_POST['password'])){
    $errors['password']= ' A password is required';
  }else{
    $password=$_POST['password'];
    include 'connect.php';
    $sql="SELECT * FROM hello WHERE username='$username' and  password='$password'";
    $result=mysqli_query($con,$sql);
      if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $success=true;
          session_start();
          $_SESSION['username']=$username;
          header('location:Home.php');
        }else{
          $invalidData=true;
        }
      
      }
    }
   
  }
  
 
    
  


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--materializecss-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
	  .brand{
	  	background: #cbb09c !important;
	  }
  	.brand-text{
  		color: #cbb09c !important;
  	}
  	form{
  		max-width: 400px;
  		margin: 20px auto;
  		padding: 20px;
  	}
    .user-exists-message{
      color:red;
      width:400px;
      padding: 0px;
      background-color:rgba(128,0,0,0.3);
      text-align:center;
      font-size:18px;
      

    }
    .successful-signup-message{
      color:green;
      width:400px;
      padding: 0px;
      background-color:rgba(0,128,0,0.3);
      text-align:center;
      font-size:18px;
      

    }
    
    .message-container{
      margin-top:50px;
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
    }footer .section{
      margin-bottom:100px; 
    }
    .empty-div{
      margin-top:250px;
    }
  </style>



    <title>Login page</title>
  </head>
  <body class="grey lighten-4">
    <div class="container">
    <?php
   // if($user){
    //  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     // <strong>Ohh no sorry!</strong> User already exist
      //<button type="button" class="close" data-dismiss="alert" aria-label="Close">
       // <span aria-hidden="true">&times;</span>
      //</button>
   // </div>';
    //}
    
    //<?php
    //if($success){
     // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     // <strong>Success!</strong> You are successfully signed up
      //<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      //  <span aria-hidden="true">&times;</span>
      //</button>
    //</div>';
    //}
    //?>
      <section class="container grey-text">
		<h4 class="center">Login to our website</h4>
		<form class="white" action="login.php" method="POST">
			<label>Username:</label>
			<input type="text" name="username" value="<?php echo $username;?>">
      <div class="red-text"><?php echo $errors['username'];?></div>
			<label>Password:</label>
			<input type="text" name="password" value="<?php echo $password; ?>">
      <div class="red-text"><?php echo $errors['password'];?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
  <div class="message-container">
  <div class="user-exists-message"><?php if($invalidData): ?>
    <p><strong>Oops!</strong> Invalid name or password</P>
    <?php endif ?>
  </div> 
  <div class="successful-signup-message"><?php if($success): ?>
    <p>You are successfully logged in</P>
    <?php endif ?>
  </div>
   
  </div>  

	<?php include('footer.php'); ?>

   
  </body>
</html>