<?php  

	session_start();
	  if(isset($_SESSION[sha1("user_data")])){
	    session_destroy();
	    header("location: login.php?success=session_ending");
	  }

?>