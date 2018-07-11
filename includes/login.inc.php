<?php
include_once "db.php";
include_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email		= $_POST['email'];
	$password	= md5($_POST['password']);

	$sql = "SELECT email, password,usertype FROM member WHERE email = '$email' AND password = '$password'";
	$result = $conn->query($sql);
	// $type="SELECT usertype FROM member WHERE email="$_POST['$result['email']']" ";
	// $typeRes=$conn->query($type);
	if ($result->num_rows == 1) {

		if (isset($_POST['remember'])) {
			setcookie('email', $email, time() + 86400);
		}
		
		if ($result->fetch_assoc()['usertype'] == 'admin'){
			$_SESSION['email'] = $email;
			redirect("admindash.php");
		} else {
			$_SESSION['email'] = $email;
			redirect("client.php");
		}
		

		
		exit;
	} else {
		set_message('<div class="alert alert-warning" role="alert" col-md-12"><p>Wrong username or password.</p></div>');
	}
}

?>