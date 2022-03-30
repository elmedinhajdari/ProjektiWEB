<?php
session_start();

// inicializimi i variablave te regjistrimit apo te loginit
$username = "";
$email    = "";
$errors = array(); 





// lidhja ne databaze
$db = mysqli_connect('localhost', 'root', '', 'registration');



//-------------------------------------------------------------------------- Regjistro userin---------------------------------------------------------------------------------------
if (isset($_POST['register'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

 
//Admin/User



  // Forma e validimit
  if (empty($username) || empty($email) || empty($password_1))  { array_push($errors, "You're missing something.."); }

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  


  

  // A eshte useri i krijuar ne databaze dhe nese po jep error
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);


 
  
  
  //nese useri egziston
  if ($user) { 
    if ($user['username'] === $username || $user['email'] === $email ) {
      array_push($errors, "Username/Email already exists");
    }
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
    if (empty($password)) {
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
if (isset($_POST['save'])) {  

  $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server

    $surename = $_POST['surename'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO jobapplication (name, surename, email, phone, city, name, size) VALUES ('$username' , '$surename', '$email', '$phone', '$city', '$filename', $size)";
            if (mysqli_query($db, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
