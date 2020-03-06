<?php
function opencon() {
	$server = "localhost";
	$db = "TEST";
	$user = "root";
	$pass = "root";
	$conn = new mysqli($server, $user, $pass, $db) or die("Connect failed");
	return $conn;
}
function closecon($conn) {
	$conn->close();
}

function getall($conn, $un, $pw) {
	$q = $conn->prepare('select * from data where un = ? and pw = ?');
	$q->bind_param('ss', $un, $pw);
	$q->execute();
	$e = $q->get_result();
	return $e->num_rows;
}

//$conn = opencon();
//$e = getall(opencon(), "test", "9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08");
//$r = mysqli_fetch_assoc($e);
//echo $e;
?>
