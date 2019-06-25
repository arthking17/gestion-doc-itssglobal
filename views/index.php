<?PHP 
session_start();
if(!isset($_SESSION['login']))
{
  //echo "<script>window.location.href=login.html</script>";
  if($_SESSION['type'] != '1')
  header ('location: pages/examples/login.html');
}
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
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
                      <img src="<?PHP echo $hist['profil']; ?>" alt="profil" class="img-circle img-sm"> <?PHP if($hist['type_obj']=='dossier'){
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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?PHP echo $_SESSION['profil']; ?>" alt="User Image" height="" class="user-image">
              <span class="hidden-xs"><?PHP echo $_SESSION['login'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?PHP echo $_SESSION['profil']; ?>" alt="User Image" height="" class="img-circle">

                <p>
                  <?PHP echo $_SESSION['nom'] ?>
                  <small>membre depuis <?PHP echo $_SESSION['date'] ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profil</a>
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
        </div>
        <div class="pull-left info">
          <p><?PHP echo $_SESSION['login'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>
      <!-- search form -->
      <form action="gestionFichier.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Recherche...">
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
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="gestionFichier?dossier=-1">
            <i class="fa fa-pie-chart"></i>
            <span>Gestion des fichiers</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="gestionAcces.php">
            <i class="fa fa-pie-chart"></i>
            <span>Gestion de l'accès aux dossiers</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tableau de bord
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Tableau de bord</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?PHP echo $fichierC->nombreFichier(); ?></h3>

              <p>Fichiers</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->  
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?PHP echo $dossierC1->nombreDossier(); ?></h3>

              <p>Dossier</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="gestionFichier?dossier=-1" class="small-box-footer">plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?PHP echo $userc->nombreUser('2'); ?></h3>

              <p>Nouveaux utilisateurs</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="users.php" class="small-box-footer">plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?PHP echo $userc->nombreUser('1'); ?></h3>

              <p>Administrateurs</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="users.php" class="small-box-footer">plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
      <section class="col-lg-7 connectedSortable">
        <!-- USERS LIST -->
        <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Les membres récents</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?PHP $alluser = $userc->recupererHuitUser(); echo $alluser->rowCount(); ?> nouveaux membres</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?PHP 
                      $date = date("Y-m-d");
                      $date_hier= date("Y-m-d", strtotime($date." - 1 day"));
                      foreach($alluser as $user){
                    ?>
                    <li>
                      <img class="img-circle img-sm" src="<?PHP echo $user['profil']; ?>" alt="User Image" sizes="(min-height: 800px) 500px, 50vw">
                      <a class="users-list-name" href="#"><?PHP echo $user['nom'] ?></a>
                      <span class="users-list-date"><?PHP if($user['datei']==$date) echo "aujourd hui"; else if($user['datei']==$date_hier) echo "hier"; else echo $user['datei']; ?></span>
                    </li>
                    <?PHP 
                      }
                      ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="users.php" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>        
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendrier</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
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
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
</body>
</html>
