<?php 

//include config.php to connect to the database
	include("config.php"); 
	
	//start session
    session_start();
{
		// Define $myusername and $mypassword
	$magaca=$_POST['magaca'];
	$furaha=$_POST['furaha'];
	
	// To protect MySQL injection
	$magaca= mysqli_real_escape_string( $mysqli,$magaca);
	$furaha = mysqli_real_escape_string( $mysqli, $furaha);

    $fetch=mysqli_query( $mysqli, "select Employee_ID from employee where Username='$magaca' and Password = '$furaha'");
    $count=mysqli_num_rows($fetch);
    if($count!="")
    {
    $_SESSION['login_username']=$magaca;
	 header("location: Admin/index.php");
    }
    else
    {
	   header('Location: Admin/index.php');
	}

}
?>
