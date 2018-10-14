<?php
   session_start();
   
   if(isset($_COOKIE['session_cookie']) && isset($_SESSION['session'])){
   	header('Location: index.php');
      }
     else{
    //Validate form action
   	if (isset($_POST['username']) && isset($_POST['password'])){
   		if ($_POST['username'] == "chamindu" && $_POST['password'] == "password"){
                   //Set session variable
               $_SESSION["session"] = $_POST['username'] . $_POST['password'];    
               //Set session in a coookie named'session_cookie' 
               setcookie("session_cookie", session_id(), (time() + (56400)), "/");
               generateToken(session_id());
   			header('Location: index.php');
   			} else{
   			echo '<div class="alert alert-danger">Username or Password is Invalid!</div>';
   			}
   		}
   	}
    function generateToken($formName){
        return $_SESSION['csrf_token_string'] = base64_encode(openssl_random_pseudo_bytes(32)).$formName;
    } 
   ?>
<!DOCTYPE html>
<html  lang="en">
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
   <body class="mainbody" id="particles-js" >
      <form id="login-form" name="login-form" action="login.php" method="POST">
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
                              <input placeholder="username = chamindu" type="text" name="username" id="username"  class="form-control form-control-sm validate">
                              <label data-error="wrong" data-success="right" for="modalLRInput10">Username</label>
                           </div>
                           <div class="md-form form-sm mb-4">
                              <i class="fa fa-lock prefix"></i>
                              <input placeholder="password = password" type="password" name="password" id="password" class="form-control form-control-sm validate">
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
      <script type="text/javascript" src="js/particles.js"></script>
      <script type="text/javascript">
         particlesJS("particles-js",{
  "particles": {
    "number": {
      "value": 159,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 4.008530152163807,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "bounce",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
</script>
   </body>
</html>