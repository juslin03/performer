<?php
 $host = 'http://performer.ci:2083';
 $dbname = 'performe_db';
 $user = 'performe_user';
 $pass = 'N#kFr#%8KZ3t';
 $reg_date = Date('Y-m-d H:i:s');
 try {
     $conn = new PDO("mysql:host = $host; dbname = $dbname", $user, $pass);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
     die('Erreur: ' . $e->getMessage());
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href="favicon.ico" type="image/x-icon" rel="icon" />
  <link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
  <meta name="description" content="site de formation à distance" />
  <meta name="keywords" content="" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style_performer.css" />
  <link rel="manifest" href="images/favicon.ico">
  <link rel="mask-icon" href="images/favicon.ico" color="#b55bd5">
  <meta name="msapplication-TileColor" content="#da532c">


    <title>Performer | Inscription</title>
  </head>
  <body class="">
    <div class="off-canvas-wrap">
        <div class="inner-wrap">
            <!-- HEADER -->
      <?php include 'includes/header.php'; ?>
      <!-- FIN HEADER -->
            <div class="container m-5 p-5">
      <div class="" role="alert">
          <h2
        style="text-transform: uppercase; margin-left: 15%; margin-top:15px;"
      >
        BOOTCAMP ENTRE ARTISANS
      </h2>
    </div>
    <div class="row">
        <div class='' style="background-size:cover; display flex; justify-content:center;">
            <center><img src="images/entreartisans.jpg" style="width:75%; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);border-radius:  0.25rem;" class='img-fluid' alt="Bootcamp entre digiteuz" /></center>
                <div>
                    <h4 class="mt-2 text-center">PROGRAMME</h4>

                    <p class='text-center'>Entre Artisans est un programme de formation conçu pour accompagner les gens de metier.</p>
                
                
                <center>
                    <table width="70%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="10%" style='font-weight:bold;'>Session1</td>
                        <td width="90%">: En cours de programmation</td>
                    </tr>
                    
                    
                    <tr>
                        <td style='font-weight:bold;'>Heure</td>
                        <td>: 09h-15h</td>
                    </tr>
                    
                    <tr>
                        <td style='font-weight:bold;'>Lieu Prévu</td>
                        <td>: Salle de Formation du GPE (Gestion de la Politique Economique) à Cocody</td>
                    </tr>
                    
                    <tr>
                        <td style='font-weight:bold;'>Cible</td>
                        <td>: 100 Jeunes hommes de metiers</td>
                    </tr>
                    
                    <tr>
                        <td style='font-weight:bold;'>Objectif</td>
                        <td>: Recruter, former et accompagner des hommes de metiers à mieux comprendre le marché dans lequel ils évoluent et à exploiter les opportunités qui s’y trouvent</td>
                    </tr>
                    
                                <tr>
                                  <td style='font-weight:bold;'>Programme</td>
                                  <td> : Bientôt disponible</td>
                                </tr>
                                <tr>
                                  <td style='font-weight:bold;'><p><strong>Programme Post-Formation </strong></p></td>
                                  <td><table border='0' style='border:0;' cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td> - Soumission d’un formulaire en ligne par les participantes</td>
                                    </tr>
                                    <tr>
                                      <td> - Publication d’un pitch par les participantes</td>
                                    </tr>
                                    <tr>
                                      <td> - Sélection des 30 meilleures candidats pour une formation et un accompagnement dans le cadre de notre incubateur-accélérateur </td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td style='font-weight:bold;'>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                </table>
            </center>

        </div>
    </div>
          <div>
              <h4 class="mt-2 text-center">INSCRIPTION</h4>
      <form class="row needs-validation" id="regForm" novalidate>
                <div style='display: flex; flex-wrap:wrap; justify-content: center;'>
                    <div style='display:flex; justify-content: center; width: 80%;'>
                          <div class="col-md-6" style=" width: 50%;">
                            <div class="form-group">
                              <label for="nom" class="form-label">Nom</label>
                              <input
                              style="width: 100%;"
                                type="text"
                                class="form-control"
                                id="nom"
                                name='nom'
                                autocomplete="off"
                                placeholder="Ecrire votre nom ici"
                                required
                              />
                            </div>
                          </div>
                          <div class="col-md-6" style="margin-left: 10px; width: 50%;">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input
                              type="text"
                              style="width: 100%;"
                              class="form-control"
                              id="prenom"
                              name='prenom'
                              autocomplete="off"
                              placeholder="Ecrire votre prenom ici"
                            />
                          </div>
                        </div>
                        
                        
                        <div style='display:flex; justify-content: space-between; width: 80%;'>
                            <div class="col-md-6" style='width:50%;'>
                              <label for="genre" class="form-label">Genre</label>
                                <div class="form-check" style='display: flex; flex-direction: row;'>
                                    <label class="form-check-label" for="M" style='margin-right:20px;'>
                                      <input
                                        class="genre form-check-input"
                                        name="genre"
                                        value="M"
                                        type="radio"
                                        id="M"
                                      />
                                      Masculin
                                    </label>
                        
                                    <label class="form-check-label ml-4" for="F">
                                      <input
                                        class="genre form-check-input"
                                        type="radio"
                                        id="F"
                                        name="genre"
                                        value="F"
                                      />
                                      Feminin
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6" style='width:50%;'>
                              <label for="datenaissance" class="form-label"
                                >Date de naissance</label
                              >
                              <input
                                type="date"
                                style="width: 100%;"
                                class="form-control"
                                id="datenaissance"
                                name='datenaissance'
                                autocomplete="off"
                              />
                            </div>
                        </div>    
                    
                        <div style='display:flex; justify-content: center; width: 80%;'>
                          <div class="col-md-6" style=" width: 50%;">
                            <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                              <input
                                type="email"
                                style='width:100%'
                                class="form-control"
                                id="email"
                                name='email'
                                placeholder="Votre adresse email"
                              />
                            </div>
                          </div>
                          <div class="col-md-6" style="margin-left: 10px; width: 50%;">
                         <label for="phone" class="form-label">Numero de telephone</label>
                              <input
                                type="tel"
                                class="form-control"
                                id="phone"
                                name='phone'
                                placeholder="Votre numero de telephone"
                                autocomplete="off"
                              />
                            </div>
                        </div>
                        
                        
                    
                
                <!--<div class="col-md-6">-->
                <!--  <label for="email" class="form-label">Email</label>-->
                <!--  <input-->
                <!--    type="email"-->
                <!--    class="form-control"-->
                <!--    id="email"-->
                <!--    placeholder="Votre adresse email"-->
                <!--  />-->
                <!--  <div class="invalid-feedback">Email obligatoire</div>-->
                <!--</div>-->
                <!--<div class="col-md-6">-->
                <!--  <label for="phone" class="form-label">Numero de telephone</label>-->
                <!--  <input-->
                <!--    type="tel"-->
                <!--    class="form-control"-->
                <!--    id="phone"-->
                <!--    placeholder="Votre numero de telephone"-->
                <!--    autocomplete="off"-->
                <!--  />-->
                <!--  <div class="invalid-feedback">Numero de telephone obligatoire</div>-->
                <!--</div>-->
                
                <div class="col-md-6" style='width:80%;'>
                  <label for="commune" class="form-label">Commune</label>
                  <select
                    name='commune'
                    style='width:100%'
                    class="form-control"
                    id="commune"
                    placeholder="Votre Commune"
                    autocomplete="off"
                  >
                      <option value='Marcory'>Marcory</option>
                      <option value='Yopougon'>Yopougon</option>
                      <option value='Grand-Bassam'>Grand-Bassam</option>
                      <option value='Bingerville'>Bingerville</option>
                      
                      <option value='Cocody'>Cocody</option>
                      <option value='Abobo'>Abobo</option>
                      <option value='Anyama'>Anyama</option>
                      <option value='Williamsville'>Williamsville</option>
                      
                  </select>
                </div>
                
                
                            <div style='display:flex; justify-content: space-between; width: 80%;'>
                                <div class='col-md-6' style='width:50%;'>
                                  <label for="genre" class="form-label">Que souhaitez-vous ?</label>
                                    <div class="form-check" style='display: flex; flex-direction: row;'>
                                        <label class="form-check-label" for="suivre" style='margin-right:20px;'>
                                          <input
                                            class="form_survey form-check-input"
                                            name="form_survey"
                                            value="Suivre la formation"
                                            type="radio"
                                            id="suivre"
                                          />
                                          Suivre la formation
                                        </label>
                                    
                                        <label class="form-check-label" for="accompagnement">
                                          <input
                                            class="form_survey form-check-input"
                                            type="radio"
                                            id="accompagnement"
                                            name="form_survey"
                                            value="Etre sélectionné pour un accompagnement"
                                          />
                                          Etre sélectionné pour un accompagnement
                                        </label>
                                    </div>
                                </div>
                               <div class="col-md-6" style='width:50%;'>
                                    <label class="form-label">Avez-vous un projet ?</label>
                                    <div class="form-check" style='display: flex; flex-direction: row;'>
                                    <label class="form-check-label" style='margin-right:20px;' for="oui">
                                      <input
                                        class="projet_survey form-check-input"
                                        required
                                        name="projet_survey"
                                        value="oui, j'ai un projet"
                                        type="radio"
                                        id="oui"
                                      />
                                      Oui
                                    </label>
                                    
                                    <label class="form-check-label" for="non">
                                      <input
                                        class="projet_survey form-check-input"
                                        type="radio"
                                        required
                                        id="non"
                                        name="projet_survey"
                                        value="non, je n'ai pas de projet"
                                      />
                                      Non
                                    </label>
                                    </div>
                                </div>
                            </div>
              
               
                <div style='display:flex; justify-content: space-between; width: 80%;'>
                    <div class="col-md-6" style='width: 50%;'>
                      <label for="nomprojet" class="form-label"
                        >Nom du projet (si oui)</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="nomprojet"
                        name='nomprojet'
                        placeholder="Ecrire le nom de votre projet"
                        autocomplete="off"
                      />
                    </div>
                    <div class="col-md-6" style='width: 50%; margin-left: 10px;'>
                      <label for="activity" class="form-label"
                        >Description du projet(si oui)</label
                      >
                      <textarea
                      style='width:100%; resize: none;'
                        class="form-control"
                        id="activity"
                        name='activity'
                        rows="2"
                        placeholder="Ecrire une description du projet"
                      ></textarea>
                    </div>
                    </div>
                
                    <div style='display:flex; justify-content: space-between; width: 80%;'>
                        <div class="col-md-6" style='width: 50%;'>
                          <label class="form-label">Maitrise de l'outil informatique</label>
                          <div class="form-check" style='display: flex; flex-direction: row;'>
                            <label class="form-check-label" for="debutant" style='margin-right: 20px;'>
                              <input
                                class="tic_survey form-check-input"
                                name="tic_survey"
                                value="Debutant"
                                type="radio"
                                id="debutant"
                              />
                              Debutant
                            </label>
                            <label class="form-check-label ml-4" for="expert">
                              <input
                                class="tic_survey form-check-input"
                                type="radio"
                                id="expert"
                                name="tic_survey"
                                value="Confirmé"
                              />
                              Confirmé
                            </label>
                          </div>
                        </div>
                        
                        <div class="col-md-6" style='width: 50%;'>
                          <label for="inputAddress" class="form-label"
                            >Comment avez-vous été informé.e?</label
                          >
                          <div class="form-check" style='display: flex; flex-direction: row;'>
                            <label class="form-check-label" for="reseaux" style='margin-right: 20px;'>
                              <input
                                class="info_survey form-check-input"
                                name="info_survey"
                                value="reseaux"
                                type="radio"
                                id="reseaux"
                              />
                              Reseaux sociaux
                            </label>
                            <label class="form-check-label ml-4" for="site" style='margin-right: 20px;'>
                              <input
                                class="info_survey form-check-input"
                                type="radio"
                                id="site"
                                name="info_survey"
                                value="Site web"
                              />
                              Site web
                            </label>
                            <span class="m-2"></span>
                            <label class="form-check-label ml-3" for="amis">
                              <input
                                class="info_survey form-check-input"
                                type="radio"
                                id="amis"
                                name="info_survey"
                                value="amis"
                              />
                              Amis
                            </label>
                          </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" style='display:flex; justify-content: space-between; width: 80%;'>
                      <label for="lien" class="form-label">Lien de page Facebook</label>
                      <input
                        type="url"
                        class="form-control"
                        id="lien"
                        name='lien'
                        placeholder="ex: https://facebook.com/ID_DE_LA_PAGE"
                      />
                    </div>
                </div>
                
                <!--<div class="col-md-6" style='width: 50%;'>-->
                <!--  <label for="inputAddress" class="form-label"-->
                <!--    >Comment avez-vous été informé.e?</label-->
                <!--  >-->
                <!--  <div class="form-check">-->
                <!--    <label class="form-check-label" for="reseaux">-->
                <!--      <input-->
                <!--        class="info_survey form-check-input"-->
                <!--        name="info_survey"-->
                <!--        value="reseaux"-->
                <!--        type="radio"-->
                <!--        id="reseaux"-->
                <!--      />-->
                <!--      Reseaux sociaux-->
                <!--    </label>-->
                <!--    <label class="form-check-label ml-4" for="site">-->
                <!--      <input-->
                <!--        class="info_survey form-check-input"-->
                <!--        type="radio"-->
                <!--        id="site"-->
                <!--        name="info_survey"-->
                <!--        value="Site web"-->
                <!--      />-->
                <!--      Site web-->
                <!--    </label>-->
                <!--    <span class="m-2"></span>-->
                <!--    <label class="form-check-label ml-3" for="amis">-->
                <!--      <input-->
                <!--        class="info_survey form-check-input"-->
                <!--        type="radio"-->
                <!--        id="amis"-->
                <!--        name="info_survey"-->
                <!--        value="amis"-->
                <!--      />-->
                <!--      Amis-->
                <!--    </label>-->
                <!--    <div class="invalid-feedback">Veuillez remplir ce champ</div>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-md-6">-->
                <!--  <label for="lien" class="form-label">Lien de page Facebook</label>-->
                <!--  <input-->
                <!--    type="url"-->
                <!--    class="form-control"-->
                <!--    id="lien"-->
                <!--    placeholder="ex: https://facebook.com/ID_DE_LA_PAGE"-->
                <!--  />-->
                <!--</div>-->
               <center> <div class="col-12">
                  <button type="button" name='reg' class="btn btn-primary" id="user_register">
                    Valider
                  </button>
                  <a href="/" class="btn btn-danger ml-3"
                    >Annuler et retourner au site</a
                  >
                </div></center>
                    
                </div>
              </form>
          </div>
      </div>
    </div>

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
        $("#msg").hide();
        $(document).on("click", "#user_register", function () {
          var nom = $("#nom").val();
          var prenom = $("#prenom").val();
          var datenaissance = $("#datenaissance").val();
          var email = $("#email").val();
          var phone = $("#phone").val();
          var commune = $("#commune").val();
          var form_survey = $(".form_survey:checked").val();
          var genre = $(".genre:checked").val();
          var projet_survey = $(".projet_survey:checked").val();
          var nomprojet = $("#nomprojet").val();
          var tic_survey = $(".tic_survey:checked").val();
          var lien = $("#lien").val();
          var info_survey = $(".info_survey:checked").val();
          var activity = $("#activity").val();

          if (
            nom &&
            prenom &&
            datenaissance &&
            email &&
            phone &&
            commune &&
            form_survey &&
            genre &&
            projet_survey &&
            tic_survey &&
            info_survey
          ) {
            $.ajax({
              url: "register_artisans.php",
              type: "POST",
              data: {
                reg: 1,
                nom: nom,
                prenom: prenom,
                datenaissance: datenaissance,
                email: email,
                phone: phone,
                commune: commune,
                form_survey: form_survey,
                genre: genre,
                projet_survey: projet_survey,
                nomprojet: nomprojet,
                tic_survey: tic_survey,
                lien: lien,
                info_survey: info_survey,
                activity: activity,
              },
              success: function (dt) {
                Swal.fire({
                  icon: "success",
                  title: "Inscription effectuee...",
                  text: "Merci de votre comprehension!",
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
              $("#nom").addClass("is-invalid");
              $("#prenom").addClass("is-invalid");
              $("#datenaissance").addClass("is-invalid");
              $("#email").addClass("is-invalid");
              $("#phone").addClass("is-invalid");
              $("#commune").addClass("is-invalid");
              $(".form_survey:checked").addClass("is-invalid");
              $(".genre:checked").addClass("is-invalid");
              $(".projet_survey:checked").addClass("is-invalid");
              $(".tic_survey:checked").addClass("is-invalid");
              $(".info_survey:checked").addClass("is-invalid");
              $("#regForm")[0].reset();
            });
          }
        });
      });
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<?php
if (isset($_POST['reg'])) {
    $nom = addslashes($_POST['nom']);
    $prenom = addslashes($_POST['prenom']);
    $datenaissance = addslashes($_POST['datenaissance']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $commune = addslashes($_POST['commune']);
    $form_survey = addslashes($_POST['form_survey']);
    $genre = addslashes($_POST['genre']);
    $projet_survey = addslashes($_POST['projet_survey']);
    $nomprojet = addslashes($_POST['nomprojet']);
    $tic_survey = addslashes($_POST['tic_survey']);
    $info_survey = addslashes($_POST['info_survey']);
    $projet_desc = addslashes($_POST['activity']);
    $lien = addslashes($_POST['lien']);

    $req = $conn->prepare(
        'INSERT INTO performe_db.artisans SET nom = :nom, prenom = :prenom, datenaissance = :datenaissance, email = :email, phone = :phone, commune = :commune, form_survey = :form_survey, genre = :genre, projet_survey = :projet_survey, nomprojet = :nomprojet, tic_survey = :tic_survey, info_survey = :info_survey, projet_desc = :projet_desc, lien = :lien, reg_date = :reg_date'
    );
    $req->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'datenaissance' => $datenaissance,
        'email' => $email,
        'phone' => $phone,
        'commune' => $commune,
        'form_survey' => $form_survey,
        'genre' => $genre,
        'projet_survey' => $projet_survey,
        'nomprojet' => $nomprojet,
        'tic_survey' => $tic_survey,
        'info_survey' => $info_survey,
        'projet_desc' => $projet_desc,
        'lien' => $lien,
        'reg_date' => $reg_date,
    ]);

    die('success');
}
?>
