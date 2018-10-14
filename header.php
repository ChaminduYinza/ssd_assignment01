<?php
   if(isset($_POST['logout'])){
     
     //destroy session and cookie
     unset($_COOKIE['session_cookie']);
     setcookie('session_cookie', null, -1, '/');
     unset($_SESSION);
   
     // redirect to login page
     header("location: login.php");
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
      <nav class="navbar navbar-expand-lg navbar-dark indigo mainbody">
         <a class="navbar-brand" href="index.php">Synchronizer Token Pattern</a>  
         <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">     
            </ul>
            <form class="nav-link" method="POST" action="header.php">
               <button class="btn btn-primary" type="submit" value="Logout" name="logout">Logout</button>
            </form>
         </div>
      </nav>
   </head>
</html>