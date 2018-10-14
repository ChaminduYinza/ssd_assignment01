<?php
   session_start();    
   if(!isset($_COOKIE['session_cookie']) || !isset($_SESSION['session'])){
       header("location: login.php");
   }
   ?>
<?php include ("header.php") ?>
<body>
   <form id="login-form" name="login-form" action="csrf.php" method="POST">
      <div class="modal-dialog animated bounceIn" role="document">
         <div class="modal-content">
            <div class="modal-header text-center">
               <h4 class="modal-title w-100 font-weight-bold">CSRF Synchronizer Token Pattern</h4>          
           </div>
            <div class="modal-body mx-3">
               <div class="md-form mb-5">
                  <i class="fa fa-user prefix grey-text"></i>
                  <input type="text" id="form34" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="form34">Your name</label>
               </div>
               <div class="md-form mb-5">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <input type="email" id="form29" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="form29">Your email</label>
               </div>               
               <div class="md-form">
                  <i class="fa fa-pencil prefix grey-text"></i>
                  <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Your message</label>
               </div>
               <div class="md-form mb-5">
                  <input type="hidden" id="csrf_token" name="csrf_token" value="csrf">
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button type="submit"class="btn btn-unique" name="verify">Submit <i class="fa fa-paper-plane-o ml-1"></i> </button>
            </div>
         </div>
      </div>
   </form>
   <!-- AJAX Call -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script>
      $(document).ready(function () {
          $.ajax({
              url: 'csrf.php',
              type: 'post',
              async: false,
              data: {
                  'csrf_request': '<?php echo $_COOKIE['session_cookie'] ?>'
              },
              success: function (data) {
                  document.getElementById("csrf_token").value = data;
                  $("#csrf_token_string").text(data);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                  console.log("Error on Ajax call :: " + xhr.responseText);
              }
          });
      });
   </script>
   <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
   <script type="text/javascript" src="js/popper.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/mdbpro.min.js"></script>