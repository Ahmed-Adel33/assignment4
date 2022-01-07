
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Upload Image</h2>
 
 
 
  <form   action="<?php  echo  $_SERVER['PHP_SELF'];?>"  method="post" enctype="multipart/form-data">
 

  <div class="form-group">
    <label for="exampleInputPassword">profileImage</label>
    <input type="file"  name="image">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Upload</button>
</form>

</body>
</html>



<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
   

  
   if(!empty($_FILES['image']['name'])){

   $imgName     = $_FILES['image']['name'];
   $imgTempPath = $_FILES['image']['tmp_name'];
   $imagSize    = $_FILES['image']['size'];
   $imgType     = $_FILES['image']['type'];


    $imgExtensionDetails = explode('.',$imgName);
    $imgExtension        = strtolower(end($imgExtensionDetails));

    $allowedExtensions   = ['png','jpg','gif'];

       if(in_array($imgExtension ,$allowedExtensions)){
            
          
        $finalName = rand().time().'.'.$imgExtension;

         $disPath = './upload/'.$finalName;
          
        if(move_uploaded_file($imgTempPath,$disPath)){
            echo 'Image Uploaded';
        }else{
            echo 'Error Try Again';
        }

       }else{
           echo 'Extension Not Allowed';
       }


   }else{
       echo 'Image Field Required';
   }
}

?>
