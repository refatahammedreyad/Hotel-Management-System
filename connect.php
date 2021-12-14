<?php
	$username = $_POST['username'];
	$useremail = $_POST['usermail'];
	$userphone = $_POST['userphone'];
	$usermsg = $_POST['usermsg'];

	// Database connection
	$conn = new mysqli('localhost','root','','connect');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into connect(username, usermail, userphone, usermsg) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $username, $usermail, $userphone, $usermsg);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>