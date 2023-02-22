<?php
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
                echo 'success';

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name='file'>
        <button type="submit" name="submit">UPLOAD</button>
    </form>   
    
</body>
</html>