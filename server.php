<?php
session_start();

// inicializimi i variablave te regjistrimit apo te loginit
$username = "";
$email    = "";
$errors = array(); 

// inicializimi i variablave te aplikimit per pune
$name = "";
$surename = "";



// lidhja ne databaze
$db = mysqli_connect('localhost', 'root', '', 'registration');



//-------------------------------------------------------------------------- Regjistro userin---------------------------------------------------------------------------------------
if (isset($_POST['register'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

 

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

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
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
    
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";
            header('location: index.php');		  
          }else{
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";
    
            header('location: index.php');
          }
        }else {
          array_push($errors, "Wrong username/password combination");
        }
      }
    }
  
  


  //-------------------------------------------------- Job application -------------------------------------------------------------------------------

if(isset($_POST['insert']))
{
  $name = $_POST['name'];
  $surename = $_POST['surename'];
  $email = $_POST['email'];






  $query = "INSERT INTO jobappliaction (name, surename, email) VALUES ('$name' , '$surename', '$email')";
  $query_run = mysqli_query($db, $query);

  if($query_run){

    echo '<script type="text/javascript"> alert("Data Saved");</script>';

  }else{
    echo '<script type="text/javascript"> alert("Data not Saved");</script>';
  }
  
}

?>
