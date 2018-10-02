<?php
   session_start();
   
   if (isset($_SESSION["csrf_session"]))
   	{
   	header('Location: home.php');
   	exit();
      	}
     else
   	{
    //Validate form action
   	if (isset($_POST['username']) && isset($_POST['password']))
   		{
   		if ($_POST['username'] == "chamindu.cta@gmail.com" && $_POST['password'] == "password")
   			{
                   //Set session variable
               $_SESSION["csrf_session"] = $_POST['username'] . $_POST['password'];    
               //Set session in a coookie named'csrf_session_cookie' 
               setcookie("csrf_session_cookie", session_id(), (time() + (56400)), "/");
               generateToken(session_id());
   			header('Location: home.php');
   			}
   		  else
   			{
   			echo '<div class="alert alert-danger">Username or Password is Invalid!</div>';
   			}
   		}
   	}
       function generateToken($formName){
           return $_SESSION['csrf_token_string'] = base64_encode(openssl_random_pseudo_bytes(32));
        
           } 
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>IT15000118</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/mdbpro.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <form id="login-form" name="login-form" action="index.php" method="POST">
         <div class="modal-dialog cascading-modal" role="document">
            <div class="modal-content">
               <div class="modal-c-tabs">
                  <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Login</a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                        <div class="modal-body mb-1">
                           <div class="md-form form-sm mb-5">
                              <i class="fa fa-envelope prefix"></i>
                              <input type="email" name="username" id="username"  class="form-control form-control-sm validate">
                              <label data-error="wrong" data-success="right" for="modalLRInput10">Your email</label>
                           </div>
                           <div class="md-form form-sm mb-4">
                              <i class="fa fa-lock prefix"></i>
                              <input type="password" name="password" id="password" class="form-control form-control-sm validate">
                              <label data-error="wrong" data-success="right" for="modalLRInput11">Your password</label>
                           </div>
                           <div class="text-center mt-2">
                              <button class="btn btn-info">Log in <i class="fa fa-sign-in ml-1"></i></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/popper.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/mdbpro.min.js"></script>
   </body>
</html>