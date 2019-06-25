<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ITSS Global | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
  <link rel="icon" type="image/png" href="https://www.itssglobal.com/wp-content/uploads/2019/02/LOGO_ITSSGLOBAL-1.png"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript" language="javascript" src="../../js/form.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ITSS</b>Global</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="login" class="form-control" placeholder="login" name="login" id="login" onfocusout="checkIfEmty(this)"  required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name = "connecter" data-toggle='modal' data-target='#modal-connexion' class="btn btn-primary btn-block btn-flat" value="Sign In">
          <?PHP
session_start();
include "../../../entities/user.php";
include "../../../cores/userC.php";
$userC1 = new UserC();
$lien = "#";
if (isset($_POST['login']) and isset($_POST['password']) and isset($_POST['connecter'])){
    $result = $userC1->recupererUserMdp($_POST['login'], $_POST['password']);
    foreach($result as $row) {
        $mdp = $row['password'];
        $nom = $row['nom'];
        $email = $row['email'];
        $type = $row['type'];
        $date = $row['datei'];
        $profil = $row['profil'];
    }
    if($result->rowCount() == 0)
    {
      $class = "warning";
      $text = "Erreur. login ou mot de passe incorrect.";
    }
    else
    {
        if($mdp == $_POST['password']) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['nom'] = $nom;
            $_SESSION['email'] = $email;
            $_SESSION['type'] = $type;
            $_SESSION['date'] = $date;
            $_SESSION['profil'] = $profil;
            $class = "success";
            $text = "Login et mot de passe correcte, Connexion réussite.";
            $lien = "index.php";
            /*if($type == 1)
                header('Location: ../../index.php');
            else if($type == 2)
                header('Location: ../../gestionFichier.php?dossier=-1');*/
        }
    }
}
	
else{
  $class = "danger";
  $text = "Erreur. champ de données vide. Veillez remplir tous les champs.";
}
echo "
            <div class='modal modal-".$class." fade' id='modal-connexion'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                  <h4 class='modal-title'>Connexion</h4>
                </div>
                <div class='modal-body'>
                  <p>".$text."</p>
                </div>
                <div class='modal-footer'>
                  <a href='".$lien."'><button type='button' class='btn btn-outline'>Ok</button></a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>";
?>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
