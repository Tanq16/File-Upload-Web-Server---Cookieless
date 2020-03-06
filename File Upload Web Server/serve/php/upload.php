<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['Submit'])) {
		if (!empty($_FILES['fileToUpload']['name'])) {
			$targetdir = "../../uploads/";
			$ticketnumber = htmlspecialchars($_POST["ticket"]);
			echo '<script>alert($ticketnumber);</script>';
			if(strlen($ticketnumber) > 40) {
				echo '<script>alert("Ticket number cannot be more than 40 characters in length ......\nGoing Back");</script>';
	                        echo '<script>window.history.back();</script>';
	                        exit();
			}
			//if(($_FILES["fileToUpload"]["size"] > 2000000)){
			//	echo '<script>alert("File size larger than allowed .....\nGoing Back");</script>';
                          //      echo '<script>window.history.back();</script>';
                            //    exit();
			//}
			$targetfile = $targetdir.$ticketnumber."_".basename($_FILES["fileToUpload"]["name"]);
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetfile);
//			echo '<script>history.replaceState({"php/upload.php": "/index.html"}, "page 1", "index.html");</script>';
			echo '<script>alert("FILE Uploaded"); history.pushState(null, null, "/index.html"); history.replaceState(null, null, "/index.html"); location.replace("https://10.10.210.111/");</script>';
		}
		else {
			echo '<script>alert("Select a file to upload.");</script>';
			echo '<script>window.history.back();</script>';
			exit();
		}
	}
}
?>
