<?PHP 
session_start();
if(!isset($_SESSION['login']))
{
  header ('location: pages/examples/login.html');
}
include_once "../cores/fichierC.php";
$id_dossier = "";
$couleur = array("small-box bg-green", "small-box bg-yellow", "small-box bg-aqua", "small-box bg-red");
$i = 0;
include_once "../cores/dossierC.php";
include_once "../cores/fichierC.php";
include_once "../cores/userC.php";
$dossierC1 = new DossierC();
$fichierC = new FichierC();
$userc = new UserC();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ITSS Global</title>
  <link rel="icon" type="image/png" href="https://www.itssglobal.com/wp-content/uploads/2019/02/LOGO_ITSSGLOBAL-1.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="gestionFichier.php?dossier=-1" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IT</b>SS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="LOGO_ITSSGLOBAL.png" alt="ITSS Global"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <?PHP 
              $historique = $dossierC1->recupererHistorique("", "");
            ?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?PHP echo $historique->rowCount() ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Vous avez <?PHP echo $historique->rowCount() ?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?PHP 
                  foreach($historique as $hist){
                    ?>
                  <li>
                    <a href="historique.php?search_id=<?PHP echo $hist['id']; ?>">
                      <img src="<?PHP echo $hist['profil']; ?>" alt="profil" class="img-circle img-sm"> 
                      <?PHP if($hist['type_obj']=='dossier'){
                                if($hist['type_modif']=='ajouter'){
                                    echo $hist['nom_user']." a ajouté un nouveau dossier  <b> ".$hist['nom']."</b> Le ".$hist['date_modif'];
                                }
                                else if($hist['type_modif']=='renommer'){
                                    echo $hist['nom_user']." a renommé le dossier <b>".$hist['ancien_nom']."</b> en <b>".$hist['nom']."</b> Le ".$hist['date_modif'];
                                }
                                else if($hist['type_modif']=='supprimer'){
                                    echo $hist['nom_user']." a supprimé le dossier <b>".$hist['nom']."</b> Le ".$hist['date_modif'];
                                }
                        } else if($hist['type_obj']=='fichier'){
                            if($hist['type_modif']=='ajouter'){
                                echo $hist['nom_user']." a ajouté un nouveau fichier <b> ".$hist['nom']."</b> Le ".$hist['date_modif'];
                            }
                            else if($hist['type_modif']=='renommer'){
                                echo $hist['nom_user']." a renommé le fichier <b>".$hist['ancien_nom']."</b> en <b>".$hist['nom']."</b> Le ".$hist['date_modif'];
                            }
                            else if($hist['type_modif']=='supprimer'){
                                echo $hist['nom_user']." a supprimé le fichier <b>".$hist['nom']."</b> Le ".$hist['date_modif'];
                            }
                        }
                        ?>
                    </a>
                  </li>
                  <?PHP 
                }
                ?>
                </ul>
              </li>
              <li class="footer"><a href="historique.php">Tout voir</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?PHP echo $_SESSION['profil']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?PHP echo $_SESSION['login']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?PHP echo $_SESSION['profil']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?PHP echo $_SESSION['nom']?>
                  <small>membre depuis <?PHP echo $_SESSION['date'] ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="deconnexion.php" class="btn btn-default btn-flat">Déconnexion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?PHP echo $_SESSION['profil']; ?>" class="img-circle" alt="User Image">
          <br><br>
        </div>
        <div class="pull-left info">
          <p><?PHP echo $_SESSION['login'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>
      <!-- search form -->
      <form action="gestionFichier.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search" id="search" class="form-control" placeholder="Recherche..." value="<?PHP if(isset($_GET['search'])) echo $_GET['search']; else echo ""; ?>">
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" name="date_search" value="<?PHP if(isset($_GET['date_search'])) echo $_GET['date_search']; else echo ""; ?>" placeholder="Recherche via date">
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
          <span class="input-group-btn">
                <button type="submit" name="search-btn" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION PRINCIPALE</li>
        <?PHP if($_SESSION['type'] == '1')
        {
          echo "<li>
          <a href='index.php'>
            <i class='fa fa-dashboard'></i> <span>Tableau de bord</span>
            <span class='pull-right-container'>
            </span>
          </a>
        </li>";
        } ?>
        <li><a href="gestionFichier.php?dossier=-1"> /    Racine </a></li>
        <?PHP 
        include_once "../cores/dossierC.php";
        $dossierC1 = new DossierC();
        $dossierC1->afficherArbreDossier('-1', $_SESSION['login'], $_SESSION['type']);
        if($_SESSION['type'] == 1)
        {
            echo "<li><a href='' onclick=\"open('ajoutDossier.php?surdossier=-1', 'Popup', 'scrollbars=1,resizable=1,height=300,width=400'); return false;\"><img src='add.png' alt='add'/>nouveau dossier</a></li>";
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
    <a href="gestionFichier.php?dossier=<?PHP if(isset($_SESSION['precedent_id'])) echo $_SESSION['precedent_id']; else echo "#" ?>" class="small-box-footer"><?PHP  ?> <img src="precedent.png" alt="precedent"></a>
      <h1>
        Gestion des fichiers
        <small>fichiers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?PHP if($_SESSION['type']=='1') echo "index.php"; else echo "#" ?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active"><?PHP if(isset($_GET['dossier'])) echo ". ".$dossierC1->recupererAdresseDossier($_GET['dossier']) ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <?PHP
      $alldossier = NULL;
      $fichierC1 = new FichierC();
      if(isset($_GET['dossier']))
      {
        $_SESSION['precedent_id'] = $_GET['dossier'];
        $id_dossier = $_GET['dossier'];
        $alldossier = $dossierC1->recupererDossier($id_dossier, $_SESSION['login'], $_SESSION['type']);
      } else if(isset($_GET['date_search']) && isset($_GET['search'])){
        $alldossier = $dossierC1->rechercherDossier($_GET['search'], $_SESSION['login'], $_SESSION['type'], $_GET['date_search']);
      }
      else if(isset($_GET['date_search']))
      {
        $alldossier = $dossierC1->rechercherDossier("", $_SESSION['login'], $_SESSION['type'], $_GET['date_search']);
      } else if(isset($_GET['search'])) {
        $alldossier = $dossierC1->rechercherDossier($_GET['search'], $_SESSION['login'], $_SESSION['type'], "");
      }
      foreach($alldossier as $rowd)
      {
        if($rowd['lecture'] == "oui" || $_SESSION['type'] == 1)
        {
          $nbre_fichier = $fichierC1->nbre_fichier($rowd['id']);
          foreach($nbre_fichier as $nbre){
            $nb = $nbre['nbre'];
          }
    ?>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="<?PHP echo $couleur[$i] ?>">
            <div class="inner">
              <h3><?PHP echo $nb; ?><sup style="font-size: 20px">fichiers</sup></h3>

              <p><?PHP echo /*$dossierC1->recupererAdresseDossier($rowd['sur_dossier']) ."/".*/ $rowd['nom']; ?></p>
            </div>
            <div class="icon">
              <img src="icone_dossier.png" alt="dossier"/>
            </div>
            <?PHP
              echo "<a href='gestionFichier.php?dossier=".$rowd['id']."' class='small-box-footer'>ouvrir <i class='fa fa-arrow-circle-right'></i></a>";
              if($rowd['ecriture'] == "oui" || $_SESSION['type'] == 1)
              {
                echo "<a href='' onclick=\"open('nommerDossier.php?dossier=".$rowd['id']." && AN_nom=".$rowd['nom']."', 'Popup', 'scrollbars=1,resizable=1,height=300,width=400'); return false;\" class='small-box-footer'> renommer<img src='Rename_icon.png' alt='add'/></a>";
              }
              if($rowd['suppression'] == "oui" || $_SESSION['type'] == 1)
              {
                $_SESSION['iddossier']=$rowd['sur_dossier'];
                echo "<a href='#' class='small-box-footer' data-toggle='modal' data-target='#modal-dossier-".$rowd['id']."'>supprimer <img src='mini_delete.png' alt='delete'/></a>
                <div class='modal modal-danger fade' id='modal-dossier-".$rowd['id']."'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title'>Suppression</h4>
              </div>
              <div class='modal-body'>
                <p>Voulez-vous vraiment supprimer ce document ?<br><smal>cette action est irréversible</smal></p>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Annuler</button>
                <a href='supprimerDossier.php?dossier=".$rowd['id']."'><button type='button' class='btn btn-outline'>Confirmer la suppression</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>";
              }
              if($_SESSION['type'] == 1)
              {
                echo "<a class='small-box-footer' href='' onclick=\"open('choisirAcces.php?dossier=".$rowd['id']."', 'Popup', 'scrollbars=1,resizable=1,height=400,width=400'); return false;\" style='color:black'>gérer l'accès <img src='mini_cle.png' alt='droit d\'accès'/></a>";
              }
            ?>
            <a href="#" data-toggle='modal' data-target='#modal-info-dossier-<?PHP echo $rowd['id']?>' class='small-box-footer'>
                <span class="glyphicon glyphicon-info-sign"></span>
            </a>
          </div>
        </div>
      <?PHP
        $i++;
        if($i == 4)$i = 0;
        echo "<div class='modal modal-warning fade' id='modal-info-dossier-".$rowd['id']."'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <h4 class='modal-title'>Information sur le dossier</h4>
          </div>
          <div class='modal-body'>
            <p><ul>
                <li>Identifiant du dossier : ".$rowd['id']." </li>
                <li>Nom : ".$rowd['nom']." </li>
                <li>Adresse complète : ".$dossierC1->recupererAdresseDossier($rowd['id'])." </li>
                <li>Date de création : ".$rowd['dateajout']." </li>
                <li>Nombre de fichiers : ".$nb." </li>
            </ul></p>
          </div>
          <div class='modal-footer'>
            <a href='#'><button type='button' class='btn btn-outline' data-dismiss='modal'>Ok</button></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>";
      }
        }
      ?>
      <!-- /.row -->
      <!-- Main row -->
      <?PHP
            $fichierC = new FichierC();
            if(isset($_GET['dossier']))
            {
              $allfichier = $fichierC->recupererAllFichier($_GET['dossier']);
            } else if(isset($_GET['date_search']) && isset($_GET['search'])){
              $allfichier = $fichierC->rechercherAllFichier($_GET['search'], $_GET['date_search']);
            }
            else if(isset($_GET['date_search']))
            {
              $allfichier = $fichierC->rechercherAllFichier("", $_GET['date_search']);
            } else if(isset($_GET['search'])) {
              $allfichier = $fichierC->rechercherAllFichier($_GET['search'], "");
            }
            
              foreach($allfichier as $fichier)
              {
      ?>
      <div class="col-lg-3 col-xs-6">
          <?PHP
            /*if(isset($_GET['search']))
            {
              echo "<h4>".$fichier['nom']."</h4><small>".$dossierC1->recupererAdresseDossier($fichier['dossier']) ."/". $fichier['url']."</small>";
            }
            else{
              echo "<h4>".$fichier['nom']."</h4><small width=400>".$dossierC1->recupererAdresseDossier($fichier['dossier']) ."/". $fichier['url']."</small><br>";
            }*/
            echo "<embed src=".$fichier['url']." width=400 height=250 type='application/pdf'/>";
            ?>
            <a href='' onclick="open('<?PHP echo $fichier['url']; /*$dossierC1->ajouterHistorique($_SESSION['nom'], $fichier['nom'], 'consulter', 'fichier', $dossierC1->recupererAdresseDossier($fichier['id']), '');*/ ?>', 'Popup', 'scrollbars=1,resizable=1,height=720,width=720'); return false;"><img src='expand.png' alt='agrandir'/></a>
            <?PHP $suppression = "";
              $ecriture = "";
            $droit = $userc->recupererDroit($fichier['dossier'], $_SESSION['login']);
            foreach($droit as $d){
              $suppression = $d['suppression'];
              $ecriture = $d['ecriture'];
            }
            if($suppression=="oui" || $_SESSION['type']==1){
          ?>
          <a class="small-box-footer" data-toggle='modal' data-target='#modal-fichier-<?PHP echo $fichier['id']?>' href="#" style="color:red"><img src="delete.png" alt="delete"/></a>
            <?PHP
            echo "<div class='modal modal-danger fade' id='modal-fichier-".$fichier['id']."'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                  <h4 class='modal-title'>Suppression</h4>
                </div>
                <div class='modal-body'>
                  <p>Voulez-vous vraiment supprimer ce fichier ?<br><smal>cette action est irréversible</smal></p>
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Annuler</button>
                  <a href='supprimerFichier.php?fichier=".$fichier['id']."'><button type='button' class='btn btn-outline'>Confirmer la suppression</button></a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>";
          $_SESSION['iddossier']=$fichier['dossier'];
           } if($ecriture=="oui" || $_SESSION['type']==1){ ?>
              <a href='' onclick="open('editFichier.php?fichier=<?PHP echo $fichier['id']."&&AN_nom=".$fichier['nom'];?>', 'Popup', 'scrollbars=1,resizable=1,height=300,width=400'); return false;" class='small-box-footer'><img src="edit_icon.png" alt="éditer"/></a>
            <?PHP } ?>
            <a href="#" data-toggle='modal' data-target='#modal-info-fichier-<?PHP echo $fichier['id']?>'>
                <span class="glyphicon glyphicon-info-sign"></span>
            </a>
            <?PHP echo $fichier['nom']?>
            </div>
      <?PHP
      echo "<div class='modal modal-warning fade' id='modal-info-fichier-".$fichier['id']."'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <h4 class='modal-title'>Information sur le fichier</h4>
          </div>
          <div class='modal-body'>
            <p><ul>
                <li>Identifiant du fichier : ".$fichier['id']." </li>
                <li>Nom : ".$fichier['nom']." </li>
                <li>Adresse complète : ".$dossierC1->recupererAdresseDossier($fichier['dossier'])." </li>
                <li>Date de création : ".$fichier['dateajout']." </li>
                <li>Url du fichier : ".$fichier['url']." </li>
            </ul></p>
          </div>
          <div class='modal-footer'>
            <a href='#'><button type='button' class='btn btn-outline' data-dismiss='modal'>Ok</button></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>";
            }
          ?>      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
            var search = $(this).val();
            console.log(search);
            if(search != ""){
                $.ajax({
                    type:'GET',
                    url:'rechercherFichier.php',
                    data:'search=' + encoderURIComponent(search),
                    success:function(data){
                        if(data != ""){

                        }else{

                        }
                    }
                });
                console.log(search);
            }
        });
    });
</script>
</body>
</html>
