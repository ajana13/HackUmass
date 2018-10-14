<?php 
//session start
session_start();
ob_start();
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'hackumassvi');



// variable declaration
$username = "";
$first    = "";
$last    = "";
$errors   = array(); 




//CHANGE PASSWORD:
if (isset($_POST['pass'])) {
    $old_pass = e($_POST['old_pass']);
    $password_1 = e($_POST['password_1']);
    $password_2 = e($_POST['password_2']);
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user']['username'];
        $pass = $_SESSION['user']['password'];
        $prev = $_SESSION['user']['prev_pass'];
    

    if (empty($old_pass)) {
        array_push($errors, "Old Password is required");
    }
    if (empty($password_1)) { 
        array_push($errors, "New Password is required"); 
    }
    if ($pass != $old_pass) {
	   array_push($errors, "The old password entered is incorrect");
    }
    if ($password_1 != $password_2) {
	   array_push($errors, "The two passwords do not match, please confirm the new password");
    }
    if ($old_pass == $password_1){
        array_push($errors, "Both the new and old Password are the same!");
    }
    if ($password_1 == $prev){
        array_push($errors, "New password should not match the previous two passwords used");
    }
    if (count($errors)==0){
        $query = "UPDATE users SET password = '$password_1', prev_pass = '$old_pass' WHERE username = '$username'";
  	    mysqli_query($db, $query);
  	    $_SESSION['username'] = $username;
        $_SESSION['success'] = "Password Changed";
        if (isset($_POST['user_type'])) {
            header('location: home.php');
        }
        else{
            header('location: index.php');
        }
    } 
    }
}

//CANCEL EDIT/DELETE from View Users Page
if (isset($_POST['can'])){
    header('location: user_info.php');
}
    
//CANCEL BUTTON RETURN HOME from options under settings menu
if (isset($_POST['cancel'])){
    if(isAdmin()){
        header('location: home.php');
    }
    else{
        header('location: index.php');
    }
}

// register function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $first, $last;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$first       =  e($_POST['first']);
    $last       =  e($_POST['last']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($first)) { 
		array_push($errors, "First Name is required"); 
	}
    if (empty($last)) { 
		array_push($errors, "Last Name is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

    $query = "SELECT * FROM user WHERE username='$username'";
    if(!empty($query)){
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) != 0)
        {
            array_push($errors, "Username is Taken");
        }
    }
    
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = ($password_1);//md5 encrypt the password before saving in the database

		$query_insert = "INSERT INTO user (username, first, last, pass, prev_pass, Status) 
					  VALUES('$username', '$first', '$last', '$password', '', 1)";			
		}
        mysqli_query($db, $query_insert);
    
		$query = "SELECT * FROM user WHERE username = '$username' AND pass = '$password' LIMIT 1";
        
		$result = mysqli_query($db, $query);
		$logged_in_user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $logged_in_user;

        $queryTable = "CREATE TABLE $username(
            friend_id int(11) NOT NULL
        )";
        mysqli_query($db, $queryTable);
        $_SESSION['success']  = "New user successfully created!!";
        header('location: home.php');
    }

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn(){
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// login function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	global $db, $susername, $errors;

	// grap form values
	$susername = e($_POST['susername']);
	$spassword = e($_POST['spassword']);

	// make sure form is filled properly
	if (empty($susername)) {
		array_push($errors, "Username is required for Login");
	}
	if (empty($spassword)) {
		array_push($errors, "Password is required for Login");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$spassword = ($spassword);

		$query = "SELECT * FROM user WHERE username = '$susername' AND pass = '$spassword' LIMIT 1";
		$results = mysqli_query($db, $query);

		  if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
/*            if($logged_in_user['locked']==1){
                array_push($errors, "You are currently locked. Please contact the Administration");
            }
			else if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: home.php');		  
			}
            else{*/
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: home.php');
//			}
//		  }
        }
        else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

// check if user logged in has admin rights
function isAdmin(){
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}
    else if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'super' ) {
		return true;
	}
    else{
		return false;
	}
}
