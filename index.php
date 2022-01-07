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
  <h2>Register</h2>
  <form   action="<?php  echo  $_SERVER['PHP_SELF'];?>"  method="post">
   <input type="hidden"   value="1" name="register">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName"  required name="name" aria-describedby="" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail">Email </label>
    <input type="text"   class="form-control" id="exampleInputEmail1" required name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword"> Password</label>
    <input type="password"   class="form-control" id="exampleInputPassword1" required name="password" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputaddress">address</label>
    <input type="text"   class="form-control" id="exampleInputaddress" required name="address" placeholder="Address">
  </div>

  <div class="form-group">
    <label for="exampleInputgender">Gender</label>
    <input type="radio"  id="exampleRadio" required name="gender" value="male">male
    <input type="radio"  id="exampleRadio" required name="gender" value="female">female
  </div>

  <div class="form-group">
    <label for="exampleInputgender">Linkedin</label>
    <input type="text"  id="exampleInputlinkedin" required name="linkedin">
  
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</body>
</html>




<?php
session_start();
function Clean($input){

$input =  trim($input);
$input =  strip_tags($input);
$input =  stripslashes($input);
return $input;

return  trim(strip_tags(stripslashes($input)));
}



if($_SERVER['REQUEST_METHOD'] == "POST"){

$name     = Clean($_POST['name']); 
$email    = Clean($_POST['email']);
$password = Clean($_POST['password']);
$address  = Clean($_POST['address']);
$gender   = clean($_POST['gender']);
$linkedinURL= Clean($_POST['linkedin']);



$errors = [];


if(empty($name)){
$errors['Name'] = "Field Required";
}


if(empty($email)){
$errors['Email'] = "Field Required";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$errors['Email'] = "Invalid Email";
}

if(empty($password)){
$errors['Password'] = "Field Required";
}elseif(strlen($password) < 6){
$errors['Password'] = "Length must be >= 6 chars";
}

if(empty($address)){
  $errors['address']="Filed Required";
}elseif(strlen($address) <10){
  $errors['address']="Length must be >=10 chars";

}

if(empty($gender)){
  $errors['gender']="Filed Required";
}else{
  $gender=$_POST['gender'];

}

if(empty($linkedinURL)){
  $errors['linkedin']="Filed Required";
}
 elseif(!filter_var($linkedinURL, FILTER_VALIDATE_URL)){
  $errors['linkedin']="is a in valid URL";
}

if(count($errors) > 0){
foreach ($errors as $key => $value) {
    # code...
    echo '* '.$key.' : '.$value.'<br>';
}
}else{
  $_SESSION['name']  = $name;
  $_SESSION['email'] = $email;
  $_SESSION['password']=$password;
  $_SESSION['address']=$address;
  $_SESSION['gender']=$gender;
  $_SESSION['linkedin']=$linkedinURL;
  

 $_SESSION['user'] = ["name" => $name , "email" => $email,$password =>"password",$address =>"address",$gender =>"gender",$linkedinURL =>"linkedin"];

  echo 'Data Saved In Session';
}
}
?>

