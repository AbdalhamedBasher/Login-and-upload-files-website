<?php 
$success=false; 
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
if(isset($_POST['submit'])){
  $file=$_FILES['file'];
  $fileName=$_FILES['file']['name'];
  $fileTmpName=$_FILES['file']['tmp_name'];
  $fileSize=$_FILES['file']['size'];
  $fileError=$_FILES['file']['error'];
  $fileType=$_FILES['file']['type'];

  $fileEXT=explode('.',$fileName);
  $fileActualExt=strtolower(end($fileEXT));
  $allowed=array('jpg','jpeg','png','pdf');
  if(in_array($fileActualExt,$allowed)){
      if($fileError==0){
          if($fileSize < 1000000){
              $fileNameNew=uniqid('',true).".".$fileActualExt;
              $fileDestination='uploads/'.$fileNameNew;
              move_uploaded_file($fileTmpName,$fileDestination);
              $success=true;
          }else{
              echo 'Your file is too big, please choose another file';
          }
              
      
          
      }else{
          echo 'There was an error uploading your file!';
      }
      
  }else{
      echo 'you can not upload a file of this type!';
  }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,700;0,800;1,600;1,700&family=Poppins:wght@300;600;700;800&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">



    <title>Welcome page!</title>

    <style>
      *{
        font-family: 'Open Sans',sans serif ;
        color:blue;


      }
      nav{
        background-color:coral;

      }
      ul{
        background-color:coral;
        display:flex;
        justify-content: space-around;
        width:50%;
        text-decoration:none;
        list-style-type:none;
        align-items:center;
        height: 80px;
      }
      p{
        color:white;
      }
      h3{
        color:white;
      }
      li{
        text-decoration:none;
      }
       a{
    text-decoration:none;
    }form{
      margin-top:-16px;
      padding-top:50px;
    }
      footer {
      width:105%;
      display:flex;
      justify-content: center;
      margin-top:400px;
      background-color: coral;
      height:100px;
      padding-bottom:0px;
      align-items:center;
      color:green;
      margin-left:-60px;
      margin-right:50px;

    }
    .middle-page.container{
      color:coral;
      background-color: green;
      font-family: 'Open Sans','sans serif';
      margin-top:100px;
      display:flex;
      flex-direction:coloumn;
      justify-content: space-between;
      padding-right:30px;
      margin-right:60px


    }.container{
      background-color:lightgreen;
      padding-left:60px;

    }
    @media(max-width:750px){
      ul{
        width:100%;
        justify-content:space-between;
      }
    }
  
    </style>
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="#about php">About PHP</a></li>
        <li><a href="#upload a file">Upload a file</a></li>
        <li><h1 class="text-center text-warning mt-5">Welcome <?php echo $_SESSION['username'];?></h1></li>
        <li> <button><a href="logout.php" id="log out">Log out</a></button>



      </ul>

    </nav>
    <div class="container">
    <form class="white" action="Home.php" method="POST" id="upload an file" enctype="multipart/form-data" >
			<label>Uploading files:</label>
          <input type="file" name="file"></p>
          <button type="submit" name="submit">UPLOAD</button>
          <?php if($success):?>
            <div>you have successfuly uploaded a file</div>
            <?php endif?>
		</form>
    <div class="middle-page container">
    <div id="about php">
    <h3>An introduction to PHP:</h3>
    <p>PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by The PHP Group. PHP was originally an abbreviation of Personal Home Page, but it now stands for the recursive initialism PHP: Hypertext Preprocessor.</p>
    <p>PHP is very widely used. W3Techs reports that, as of January 2023, "PHP is used by 77.8% of all the websites whose server-side programming language we know. It also reports that only 8% of PHP users use the currently supported 8.x versions. Most use unsupported PHP 7, more specifically 7.4, and even PHP 5 has 23% of the use, also not supported with security updates, known to have serious security vulnerabilities.</p>
    


    </div>
  </div>
  <footer>
    <div>copy right form and upload website</div>
  </footer>  



</body>
</html>