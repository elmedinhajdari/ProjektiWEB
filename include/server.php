<?php
session_start();

// inicializimi i variablave te regjistrimit apo te loginit
$username = "";
$email    = "";
$errors = array(); 
$success = array();





// lidhja ne databaze
$db = mysqli_connect('localhost', 'root', '', 'registration');



//-------------------------------------------------------------------------- Regjistro userin---------------------------------------------------------------------------------------
if (isset($_POST['register'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

 




  


  

  // A eshte useri i krijuar ne databaze dhe nese po jep error
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);


 
    if($user){
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    else if($user['email'] === $email){
      array_push($errors, "Email already exists");
    }
  }
    else if (strlen($username) < 6 || preg_match('/\s/', $username))  
    { 
    array_push($errors, "Username must be at least 6 characters"); 
    }
    else if(strlen($password_1) < 6 || preg_match('/\s/', $password_1))  
    {
      array_push($errors, "Password must be at least 6 characters"); 
    }
    else if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
    }
  




  // Regjistro userin nese nuk ka errore
  if (count($errors) == 0) {
  	$password = md5($password_1);//enkripto passwordin e userit

  	$query = "INSERT INTO users (username, email, password, user_role) 
  			  VALUES('$username', '$email', '$password' , 'user')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['usertype'] = 'user';
  	header('location: index.php');

    $logged_in_user_id = mysqli_insert_id($db);

    $_SESSION['user'] = getUserById($logged_in_user_id); 
    $_SESSION['success']  = "You are now logged in";
    header('location: index.php');	
  }
}


function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

//-------------------------------------------------------------------------- Login ---------------------------------------------------------------------------------------

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    else if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        
        if (mysqli_num_rows($results) == 1) {
          $logged_in_user = mysqli_fetch_assoc($results);
          if ($logged_in_user['user_role'] == 'admin') {
    
            $_SESSION['username'] = $logged_in_user['username'];
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['usertype'] = $logged_in_user['user_role'];
            $_SESSION['success']  = "You are now logged in";
            header('location: index.php');		  
          }else{
            $_SESSION['username'] = $logged_in_user['username'];
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['usertype'] = $logged_in_user['user_role'];
            $_SESSION['success']  = "You are now logged in";
    
            header('location: index.php');
          }
        }else {
          array_push($errors, "Wrong username/password combination");
        }
      }
    }
  
  




//--------------------------------------------------- EDIT USERS ------------------------------------------------------------------------------------
if(isset($_GET['removeuser'])){
  $id=$_GET['removeuser'];

  $sql="delete from `users` where id='$id'";
  $result=mysqli_query($db,$sql);
  if($result){
      
  }else{
      die(mysqli_error($db));
  }
}

if(isset($_POST['update_user'])){
  $user=$_POST['user_id'];
  $username=$_POST['user_name'];
  $userrole=$_POST['user_role'];
  $sql="update `users` set username='$username',user_role='$userrole' where id='$user'";
  $result=mysqli_query($db,$sql);
  if($result){
      
  }else{
      die(mysqli_error($db));
  }
}






//--------------------------------------------------- EDIT PRODUCTS ------------------------------------------------------------------------------------

if(isset($_POST['update_product'])){
  $productid=$_POST['productid'];
  $oferta=$_POST['oferta'];
  $qmimi=$_POST['qmimi'];
  $kanalet=$_POST['kanalet'];
  $reseiver=$_POST['reseiver'];
  $download=$_POST['download'];
  $upload=$_POST['upload'];
  $support=$_POST['support'];
    $sql="update `produktet` set oferta='$oferta', qmimi='$qmimi', kanalet='$kanalet', reseiver='$reseiver',
     download='$download', upload='$upload', support='$support' where id='$productid'";
  $result=mysqli_query($db,$sql);
  if($result){
      
  }else{
      die(mysqli_error($db));
  }
}











// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
  // name of the uploaded file
  $filename = $_FILES['myfile']['name'];

  // destination of the file on the server
  $destination = 'uploads/' . $filename;

  // get the file extension
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  // the physical file on a temporary uploads directory on the server
  $name1=$_POST['name1'];
  $surename=$_POST['surename'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $city=$_POST['city'];
  $jobtitle=$_POST['jobtitle'];
  $file = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];

  if (!in_array($extension, ['pdf', 'docx'])) {
    array_push($errors,"You file extension must be .pdf or .docx");
  } elseif ($_FILES['myfile']['size'] > 9000000) { // file shouldn't be larger than 1Megabyte
    array_push($errors,  "File too large, it must be under 10MB");
  } else {
      
      if (move_uploaded_file($file, $destination)) {
        $sql = "INSERT INTO files (name1, surename, email, phone, city, jobtitle, name, size) VALUES
        ('$name1', '$surename', '$email', '$phone', '$city', '$jobtitle' , '$filename', '$size')";
          if (mysqli_query($db, $sql)) {
            array_push($success, "CV uploaded successfully");
          }
      } else {
        array_push($errors,"Failed to upload file.");
      }
  }
}




// Downloads files
if (isset($_GET['file_id'])) {
  $id = $_GET['file_id'];

  // fetch file to download from database
  $sql = "SELECT * FROM files WHERE id=$id";
  $result = mysqli_query($db, $sql);

  $file = mysqli_fetch_assoc($result);
  $filepath = 'uploads/' . $file['name'];

  if (file_exists($filepath)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename=' . basename($filepath));
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize('uploads/' . $file['name']));
      readfile('uploads/' . $file['name']);


  }

}



if(isset($_GET['removecv'])){
  $id=$_GET['removecv'];

  $sql="delete from `files` where id='$id'";
  $result=mysqli_query($db,$sql);

}







if (isset($_POST['ordernow'])) { 


  $username2=$_POST['username2'];
  $name2=$_POST['name2'];
  $surename2=$_POST['surename2'];
  $email2=$_POST['email2'];
  $phone2=$_POST['phone2'];
  $city2=$_POST['city2'];
  $address2=$_POST['address2'];
  $product2=$_POST['product2'];



 $product_check_query = "SELECT * FROM orderlist WHERE username2='$username2' LIMIT 1";
 $result1 = mysqli_query($db, $product_check_query);
 $product = mysqli_fetch_assoc($result1);



   
   if ($product) { 
    if ($product['username2'] === $username2 ) {
      array_push($errors, "You've already ordered once.");
    }
  }else{

      $sql = "INSERT INTO orderlist (username2, name2, surename2, email2, phone2, city2, address2, product2) VALUES
        ('$username2', '$name2', '$surename2', '$email2', '$phone2', '$city2', '$address2', '$product2')";
          if ($db->query($sql) === TRUE) {
  
          } 
  }


 


  function getProductById($id){
    global $db;
    $query = "SELECT * FROM products WHERE id=" . $id;
    $result1 = mysqli_query($db, $query);
  
    $product = mysqli_fetch_assoc($result1);
    return $product;
}



}


if(isset($_GET['removeorder'])){
  $id=$_GET['removeorder'];

  $sql="delete from `orderlist` where id='$id'";
  $result=mysqli_query($db,$sql);

}


