<?php
include 'database.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$conn = opencon();
	$enteredun = htmlspecialchars($_POST["Username"]);
	$enteredpw = hash('sha256', filter_var(htmlspecialchars($_POST["Password"]), FILTER_SANITIZE_STRING));
	$r = getall($conn, $enteredun, $enteredpw);
	//echo '<script>history.replaceState({"/php/login.php": "index.html}, "page 2", "index.html");</script>';
	//echo '<!DOCTYPE html><html><body style="background-color: black; color: white;"><form action="upload.php" method="post" enctype="multipart/form-data"><p align="center">Select file to upload:</p><br /><p align="center"><input type="file" name="fileToUpload" id="fileToUpload"></p><br /><p align="center"><input type="text" name="ticket" placeholder="Enter ticket number"></p><br /><p align="center"><input type="submit" value="Upload" name="Submit"></p></form><script>document.forms[0].addEventListener("submit", function( evt ) {var file = document.getElementById("fileToUpload").files[0];if(file.size < 1024*1024*50) {} else {alert("File too large!"); evt.preventDefault();} }, false);</script></body></html>';
	//		//header('Location: ' . $_SERVER['HTTP_REFERER']);
	//		echo '<script>window.location.replace(document.referrer);</script>';
	//		mysqli_close($conn);
	if ($r == 1) {
		echo '<!DOCTYPE html><html><body style="background-color: white; color: black;"><form action="upload.php" method="post" enctype="multipart/form-data"><p align="center">Select file to upload:</p><br /><p align="center"><input type="file" name="fileToUpload" id="fileToUpload"></p><br /><p align="center"><input type="text" name="ticket" placeholder="Enter ticket number"></p><br /><p align="center"><input type="submit" value="Upload" name="Submit"></p></form></body></html>';
		mysqli_close($conn);
		exit();
	}
	else {
		echo '<script>alert("Username or password invalid"); history.go(-1);</script>';
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		mysqli_close($conn);
		exit();
	}
}
?>
