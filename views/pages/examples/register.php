<?PHP
    session_start();
    include "../../../entities/user.php";
    include "../../../cores/userC.php";

    echo "<!DOCTYPE html>
<html>
<head><meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>ITSS Global | Registration Page</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'><link rel='stylesheet' href='../../bower_components/bootstrap/dist/css/bootstrap.min.css'>
<!-- Font Awesome -->
<link rel='stylesheet' href='../../bower_components/font-awesome/css/font-awesome.min.css'>
<!-- Ionicons -->
<link rel='stylesheet' href='../../bower_components/Ionicons/css/ionicons.min.css'>
<!-- Theme style -->
<link rel='stylesheet' href='../../dist/css/AdminLTE.min.css'>
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel='stylesheet' href='../../dist/css/skins/_all-skins.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'>
<link rel='icon' type='image/png' href='https://www.itssglobal.com/wp-content/uploads/2019/02/LOGO_ITSSGLOBAL-1.png'/>
<style>
.color-palette {
  height: 35px;
  line-height: 35px;
  text-align: center;
}

.color-palette-set {
  margin-bottom: 15px;
}

.color-palette span {
  display: none;
  font-size: 12px;
}

.color-palette:hover span {
  display: block;
}

.color-palette-box h4 {
  position: absolute;
  top: 100%;
  left: 25px;
  margin-top: -40px;
  color: rgba(255, 255, 255, 0.8);
  font-size: 12px;
  display: block;
  z-index: 7;
}
</style>
</head>
<body class='hold-transition skin-blue sidebar-mini'><br><br><br><br><br>";

    if(isset($_POST['login']) and isset($_POST['nom']) and isset($_POST['login']) and isset($_POST['password']) and isset($_POST['password_confirm']) and $_POST['password'] == $_POST['password_confirm'])
    {
        $date = date("Y-m-d");
        $user1 = new User($_POST['login'], $_POST['email'], $_POST['nom'], $_POST['password']);
        $userC1 = new UserC();
        $verifier = $userC1->VerifierUser($_POST['login'], $_POST['email']);
        if($verifier->rowCount() == 0){
        $userC1->addUser($user1);
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['type'] = '2';
        $_SESSION['date'] = $date;
        $_SESSION['profil'] = "uploads/".$_POST['profil'];
        echo "<div class='alert alert-success alert-dismissible'>
            <a href='../../gestionFichier.php?dossier=-1'><button type='button' class='close' aria-hidden='true'>&times;</button></a>
            <h4><i class='icon fa fa-ban'></i> Alert!</h4>
            Compte créé avec succès.
            <a href='../../gestionFichier.php?dossier=-1'><button type='button' class='btn btn-outline'>Ok</button></a>
            </div>";
            echo "<script>window.location.href = '../../gestionFichier.php?dossier=-1'</script>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible'>
        <a href='register.html'><button type='button' class='close' aria-hidden='true'>&times;</button></a>
        <h4><i class='icon fa fa-ban'></i> Alert!</h4>
        Erreur. login ou email indisponible. Veillez changer de login ou d'email !!!
        </div>";
        }
    }
    else{
        echo "<div class='alert alert-warning alert-dismissible'>
    <a href='register.html'><button type='button' class='close' aria-hidden='true'>&times;</button></a>
    <h4><i class='icon fa fa-ban'></i> Alert!</h4>
    Erreur. champ de données vide ou mot de passe de confirmation différent du mot de passe. Veillez remplir tous les champs.
  </div>";
    }
    echo "<script src='../../bower_components/jquery/dist/jquery.min.js'></script>
<!-- Bootstrap 3.3.7 -->
<script src='../../bower_components/bootstrap/dist/js/bootstrap.min.js'></script>
<!-- FastClick -->
<script src='../../bower_components/fastclick/lib/fastclick.js'></script>
<!-- AdminLTE App -->
<script src='../../dist/js/adminlte.min.js'></script>
<!-- AdminLTE for demo purposes -->
<script src='../../dist/js/demo.js'></script></body>
</html>";
?>