<?php
   session_start();   
   if (isset($_POST['csrf_request']))
   	{
   	if ($_POST['csrf_request'] == session_id()){
   		echo $_SESSION['csrf_token_string'];
   		} else	{
   		echo "Invalid Request....."
   		}
   	} else if (isset($_POST['verify']))	{
   	if ($_POST['csrf_token'] == $_SESSION['csrf_token_string']){
   		header("location: success.php");
   		}
   	  else		{
   		header("location: error.php");
   		}
   	}   
   ?>