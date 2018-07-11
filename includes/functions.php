<?php

if (isset($_GET['delete'])) {
	$id = $_GET['id'];
	delete($id);
}

if (isset($_GET['edit'])) {
	$id=$_GET['id'];
	saveUpdate($id);
	# code...
}

if (isset($_GET['interest'])) {
	$id=$_GET['id'];
	echo $id;
	request($id);
	# code...
}

if (isset($_GET['approve'])) {
	$id=$_GET['id'];
	echo $id;
	approve($id);
}

function email_exists($email) 
{
	global $conn;

	$sql = "SELECT id FROM member WHERE email = '$email'";

	$result = $conn->query($sql);

	if($result->num_rows == 1 ) {
		return true;
	} else {
		return false;
	}
}

function get_name($email) {
	global $conn;

	$sql = "SELECT first_name FROM member WHERE email = '$email'";

	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	return $row["first_name"];
}

function set_message($message) 
{
	if(!empty($message)){
		$_SESSION['message'] = $message;
	}else {
		$message = "";
	}
}

function display_message()
{
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];

		unset($_SESSION['message']);
	}
}

function redirect($location){
	return header("Location: {$location}");
}

function validation_errors($error_message) 
{
$error_message = <<<DELIMITER

<div class="alert alert-danger alert-dismissible" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	<strong>Warning!</strong> $error_message
 </div>
DELIMITER;

set_message($error_message);
}

function logged_in(){
	if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
		return true;
	} else {
		return false;
	}
}

		

function delete($id) {
	$conn = new mysqli("localhost", 'root', '', 'member');

	//$id = $_GET['id'];
	$sql="delete from maids where id = '$id'"; 
	// $conn->query($sql);
	if ($conn->query($sql) === TRUE) {
		echo "Sucess";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}
  }




function request($id){
	$conn = new mysqli("localhost", 'root', '', 'member');
	$sql="UPDATE maids SET status='pending' where id='$id' ";

	if ( $conn->query($sql)) {

	  	echo "Sucessful request";
	  } else {
	  	echo "error".$conn.error;
	  }



}

function approve($id){
	$conn = new mysqli("localhost", 'root', '', 'member');
	$sql="UPDATE maids SET status='inactive' where id='$id' ";

	if ( $conn->query($sql)) {

	  	echo "Sucessful approval";
	  } else {
	  	echo "error".$conn.error;
	  }



}











?>