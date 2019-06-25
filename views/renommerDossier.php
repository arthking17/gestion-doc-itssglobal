<?PHP
session_start();
include "../entities/dossier.php";
include "../cores/dossierC.php";
echo "<!DOCTYPE html>
<html>
<head><meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>ITSS Global | Renommer un dossier</title>
<link rel='icon' type='image/png' href='https://www.itssglobal.com/wp-content/uploads/2019/02/LOGO_ITSSGLOBAL-1.png'/>
<!-- Tell the browser to be responsive to screen width -->
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'><link rel='stylesheet' href='bower_components/bootstrap/dist/css/bootstrap.min.css'>
<!-- Font Awesome -->
<link rel='stylesheet' href='bower_components/font-awesome/css/font-awesome.min.css'>
<!-- Ionicons -->
<link rel='stylesheet' href='bower_components/Ionicons/css/ionicons.min.css'>
<!-- Theme style -->
<link rel='stylesheet' href='dist/css/AdminLTE.min.css'>
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'>
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
if (isset($_POST['dossier']) and isset($_POST['valider'])){
    $dossier1 = new Dossier($_POST['dossier'], $_SESSION['iddossier']);
    $dossierC1 = new DossierC();
    $dossierC1->nommerDossier($_POST['dossier'], $_SESSION['iddossier']);
    echo "<div class='alert alert-success alert-dismissible' align='center'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <h4><i class='icon fa fa-check'></i> Alert!</h4>
    Modification effectuée avec succès
    </div>";
} 
	
else{
	echo "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <h4><i class='icon fa fa-ban'></i> Alert!</h4>
    Erreur. champ de données vide. Veillez remplir tous les champs.
  </div>";
}
echo "<script src='bower_components/jquery/dist/jquery.min.js'></script>
<!-- Bootstrap 3.3.7 -->
<script src='bower_components/bootstrap/dist/js/bootstrap.min.js'></script>
<!-- FastClick -->
<script src='bower_components/fastclick/lib/fastclick.js'></script>
<!-- AdminLTE App -->
<script src='dist/js/adminlte.min.js'></script>
<!-- AdminLTE for demo purposes -->
<script src='dist/js/demo.js'></script></body>
</html>";
?>