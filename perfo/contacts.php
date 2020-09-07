<!doctype html>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact | PERFORMER </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="favicon.ico" type="image/x-icon" rel="icon" />
<link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
<meta name="description" content="site de formation à distance" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/style_performer.css" />
<link rel="stylesheet" type="text/css" href="../maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="manifest" href="images/favicon.ico">
<link rel="mask-icon" href="images/favicon.ico" color="#b55bd5">
<meta name="msapplication-TileColor" content="#da532c">
</head>

<body>
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    
    <!-- HEADER -->
    <?php  include('includes/header.php');?>
    <!-- FIN HEADER --> 
    
    <!-- FIL D'ARIANE -->
    <div class="row">
      <div class="large-12 columns">
        <div class="breadcrumbs"> Vous êtes ici : <a href="index.php" title="Page d'accueil">Accueil</a> > Contacts  </div>
      </div>
    </div>
    <!-- FIN FIL D'ARIANE -->
    
    <div class="row">
      <div class="large-9 columns">
        <div class="panel_formation">
                <div class="content_formation">
                    <h1 class="title xxlarge line secondary mb-large">Formulaire Contact</h1>
                    
                    <div class="container">
                      <div class="row">
                       <div class="col-md-12">
<legend><span class="glyphicon glyphicon-globe"></span> Nous contacter</legend>
                         <address>
                           <strong>Koumassi, Abidjan</strong><br>
                           Boulevard du Gabon<br>
                           <abbr title="Phone">
                             Téléphone:</abbr>
                          +225 77 43 15 63 / +225 21 37 63 62
                           </address>
                         <address>
                           <strong>Email</strong><br>
                           <a href="mailto:#">contact@performer.net</a>
                           </address>
                           
                           <hr>
                           
                          </div>
                          </div>
                       <div class="row">   
                        <div class="col-md-12">
                        
                        
                <form id='regForm'>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">
                            Nom</label>
                          <input type="text" class="form-control" id="name" name='nom' placeholder="Votre Nom..." required />
                        </div>
                        <div class="form-group">
                          <label for="email">
                            Email</label>
                          <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input type="email" class="form-control" id="email" name='email' placeholder="Votre email" required /></div>
                        </div>
                                  
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">
                            Votre Message</label>
                          <textarea id="message" class="form-control" name='message' rows="9" cols="25" required placeholder="Votre Message"></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <button type="button" class="btn btn-primary pull-right" name='submit' id="btnContactUs">
                          Envoyer le Message</button>
                      </div>
                    </div>
                    </form>
                          </div>
                       
                      </div>
                    </div>
                </div>
                
            </div>
      </div>
      

      
      <!-- SIDEBAR -->
       <?php  include('includes/side_bar.php');?>
      <!-- FIN SIDEBAR -->
    </div>
    
    
    <!-- FOOTER -->   
     <?php  include('includes/footer.php');?>
    <!-- FIN FOOTER -->
    
    <a class="exit-off-canvas"></a> 
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $(document).on("click", "#btnContactUs", function () {
          var nom = $("#name").val();
          var email = $("#email").val();
          var message = $("#message").val();

          if (
            nom &&
            email &&
            message
          ) {
            $.ajax({
              url: "contacts.php",
              type: "POST",
              data: {
                send: 1,
                nom: nom,
                email: email,
                message: message
              },
              success: function (dt) {
                Swal.fire({
                  icon: "success",
                  title: "Message envoyé...",
                  text: "Nous vous recontacterons très prochainement!",
                }).then(() => {
                  $("#regForm")[0].reset();
                });
              },

              error: function (err) {
                console.log(err.message);
              },
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Merci de corriger les erreurs avant de continuer!",
            }).then(() => {
              $("#name").addClass("is-invalid");
              $("#email").addClass("is-invalid");
              $("#message").addClass("is-invalid");
              $("#regForm")[0].reset();
            });
          }
        });
      });
    </script>

<script type="text/javascript" src="js/modernizr.min.js">
</script><script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/foundation/js/foundation.min.js"></script>
<script type="text/javascript" src="js/caroufredsel.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>

</body>

</html>

      <?php 
if(isset($_POST['send'])){
    $to = "info@performer.ci"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $nom= $_POST['nom'];
    $smg = $_POST['message'];
    $subject = "DEMANDE D'INFORMATIONS";
    $subject2 = "Copie de votre message envoyé";
    $message = $nom . " vous a envoyé le message suivant:" . "\n\n" . $msg;
    $message2 = "Une copie de votre message envoyé " . $nom . "\n\n" . $msg;

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    die('success');
    }
?>