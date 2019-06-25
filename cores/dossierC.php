<?PHP
include_once "config.php";
include_once "fichierC.php";
include_once "userC.php";

class DossierC
{
    function ajouterDossier($dossier)
    {
        $date = date("Y-m-d");
        $sql = "insert into dossier (nom, sur_dossier, dateajout) values (:nom, :sur_dossier, :date)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':nom', $dossier->getNom());
            $req->bindValue(':sur_dossier', $dossier->getSur_dossier());
            $req->bindValue(':date', $date);
            $req->execute();
            $dossierC1 = new DossierC();
            $iddossier = $dossierC1->idDossier($dossier->getNom(), $dossier->getSur_dossier());
            if($_SESSION['type'] == "2"){
                $userc = new UserC();
                $userc->droitDossier($iddossier, $_SESSION['login'], 'oui', 'oui', 'oui');
            }
            $dossierC1->ajouterHistorique($_SESSION['nom'], $dossier->getNom(), 'ajouter', 'dossier', $dossierC1->recupererAdresseDossier($iddossier), "");
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    
    function ajouterHistorique($nomuser, $nomobj, $typemodif, $typeobj, $adresse, $ancien_nom)
    {
        $date = date("Y-m-d H:i:s");
        $sql = "insert into historique (id, nom_user, profil, nom, date_modif, type_modif, type_obj, adresse, ancien_nom) values (:id, :nom_user, :profil, :nom, :datemodif, :typemodif, :typeobj, :adresse, :ancien_nom)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':id', "0");
            $req->bindValue(':nom_user', $nomuser);
            $req->bindValue(':profil', $_SESSION['profil']);
            $req->bindValue(':nom', $nomobj);
            $req->bindValue(':datemodif', $date);
            $req->bindValue(':typemodif', $typemodif);
            $req->bindValue(':typeobj', $typeobj);
            $req->bindValue(':adresse', $adresse);
            $req->bindValue(':ancien_nom', $ancien_nom);
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    
    function recupererHistorique($search, $date)
    {
        $sql = "select * from historique  where (nom_user like :nom_user or nom like :nom or ancien_nom like :ancien_nom or type_obj like :type_obj) and date_modif like :date_modif order by date_modif desc";
        $db = config::getConnexion();
        try {
            $historique = $db->prepare($sql);
            $historique->bindValue(':nom_user', "%".$search."%");
            $historique->bindValue(':nom', "%".$search."%");
            $historique->bindValue(':ancien_nom', "%".$search."%");
            $historique->bindValue(':type_obj', "%".$search."%");
            $historique->bindValue(':date_modif', "%".$date."%");
            $historique->execute();
            return $historique;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererHistoriqueId($search_id)
    {
        $sql = "select * from historique  where id = :id ";
        $db = config::getConnexion();
        try {
            $historique = $db->prepare($sql);
            $historique->bindValue(':id', $search_id);
            $historique->execute();
            return $historique;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function nombreDossier()
    {
        $sql = "select count(*) as nbre from dossier";
        $db = config::getConnexion();
        try {
            $dossier = $db->prepare($sql);
            $dossier->execute();
            foreach($dossier as $row)
            {
                return $row['nbre'];
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererDossier($id, $id_user, $type)
    {
        if($type == '1')
            $sql = "select * from dossier d left join acces a on d.id = '-2' where sur_dossier = :sur_dossier";
        else
            $sql = "select * from dossier d left join acces a on d.id = a.id_dossier where sur_dossier = :sur_dossier and id_user = :id_user";
        $db = config::getConnexion();
        try {
            $dossier = $db->prepare($sql);
            $dossier->bindValue(':sur_dossier', $id);
            if($type == '2')
            $dossier->bindValue(':id_user', $id_user);
            $dossier->execute();

            return $dossier;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercherDossier($nom, $id_user, $type, $date)
    {
        if($type == '1')
            $sql = "select * from dossier d left join acces a on d.id = '-2' where nom like :nom and d.dateajout like :dateajout order by d.dateajout desc";
        else
            $sql = "select * from dossier d left join acces a on d.id = a.id_dossier where id_user = :id_user and nom like :nom and d.dateajout like :dateajout order by d.dateajout desc and order by nom asc";
        $db = config::getConnexion();
        try {
            $dossier = $db->prepare($sql);
            $dossier->bindValue(':nom', "%".$nom."%");
            $dossier->bindValue(':dateajout', "%".$date."%");
            if($type == '2')
            $dossier->bindValue(':id_user', $id_user);
            $dossier->execute();

            return $dossier;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererNomDossier($id_dossier)
    {
        $sql = "select * from dossier where id = :id_dossier";
        $db = config::getConnexion();
        try {
            $dossier = $db->prepare($sql);
            $dossier->bindValue(':id_dossier', $id_dossier);
            $dossier->execute();
            foreach($dossier as $rows)
            {
                return $rows['nom'];
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererAllDossier($id)
    {
        $sql = "select * from dossier where sur_dossier = :sur_dossier";
        $db = config::getConnexion();
        try {
            $dossier = $db->prepare($sql);
            $dossier->bindValue(':sur_dossier', $id);
            $dossier->execute();

            return $dossier;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererAdresseDossier($id)
    {
        if($id == -1)
        {
            return "";
        }
        else
        {
            $dossierC1 = new DossierC();
            $sql = "select * from dossier where id = :sur_dossier";
            $db = config::getConnexion();
            try {
                $dossier = $db->prepare($sql);
                $dossier->bindValue(':sur_dossier', $id);
                $dossier->execute();
                foreach($dossier as $row)
                {
                    $sur_dossier = $row['sur_dossier'];
                    return $dossierC1->recupererAdresseDossier($sur_dossier)."/".$row['nom'];
                }
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    }

    function verifier()
    {
        $sql = "select count(*) as nbre from dossier";
        $db = config::getConnexion();
        try {
            $dossier = $db->prepare($sql);
            $dossier->execute();

            return $dossier;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function nommerDossier($nom, $id)
    {
        $dossierC1 = new DossierC();
        $an_nom = $dossierC1->recupererNomDossier($id);
        $sql = "update dossier set nom = :nom where id = :id_dossier";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':nom', $nom);
            $req->bindValue(':id_dossier', $id);
            $req->execute();
            $dossierC1->ajouterHistorique($_SESSION['nom'], $dossierC1->recupererNomDossier($id), 'renommer', 'dossier', $dossierC1->recupererAdresseDossier($id), $an_nom);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function idDossier($nom, $surdossier)
    {
        $sql = "select id from dossier where nom = :nom and sur_dossier = :sur_dossier";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':nom', $nom);
            $req->bindValue(':sur_dossier', $surdossier);
            $req->execute();
            foreach($req as $row){
                return $row['id'];
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    
    function supprimerUnDossier($id_dossier) {
        $dossierC1 = new DossierC();
        $adresse = $dossierC1->recupererAdresseDossier($id_dossier);
        $sql="DELETE FROM dossier where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id_dossier);
		try{
            $dossierC1->ajouterHistorique($_SESSION['nom'], $dossierC1->recupererNomDossier($id_dossier), 'supprimer', 'dossier', $adresse, "");
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function supprimerDossier($id_dossier) {

        $fichierc = new FichierC();
        $dossierc = new DossierC();
        $fichier = $fichierc->recupererAllFichier($id_dossier);
        foreach($fichier as $rowf)
        {
            $fichierc->supprimerfichier($rowf['id']);
        }
        $dossier = $dossierc->recupererAllDossier($id_dossier);
        if($dossier->rowCount() == 0)
        {
            $dossierc->supprimerUnDossier($id_dossier);
        }
        else
        {
            foreach($dossier as $row)
            {
                $dossierc->supprimerDossier($row['id']);
            }
        }
    }

function afficherArbreDossier($id_dossier, $login, $type)
{
    
    $dossierC1 = new DossierC();
    $alldossier = $dossierC1->recupererDossier($id_dossier, $login, $type);
    if($alldossier->rowCount() > 0){
        foreach($alldossier as $row)
        {
            if($row['lecture'] == "oui" || $_SESSION['type'] == 1)
            {
                echo "
                <li class=\"treeview\">
                  <a href=\"gestionFichier.php?dossier=".$row['id']."' class=\"small-box-footer\">
                    <i class=\"fa fa-pie-chart\"></i>
                    <span>".$row['nom']."</span>
                    <span class=\"pull-right-container\">
                      <i class=\"fa fa-angle-left pull-right\"></i>
                    </span>
                  </a>
                  <ul class=\"treeview-menu\">
                    <li>
                        <a href='gestionFichier.php?dossier=".$row['id']."'>
                            <i class='fa fa-circle-o'>
                            </i>
                            ouvrir
                        </a>
                    </li>
                ";
                $dossierC1->afficherArbreDossier($row['id'], $login, $type);
                if($type == 1 || $row['ecriture'] == "oui"){
                    $_SESSION['surdossier'] = $row['id'];
                echo "<li><a href='' onclick=\"open('ajoutDossier.php?surdossier=".$row['id']."', 'Popup', 'scrollbars=1,resizable=1,height=300,width=400'); return false;\"><img src='add.png' alt='add'/>nouveau dossier</a>
                <a href='' onclick=\"open('ajoutFichier.php?surdossier=".$row['id']."', 'Popup', 'scrollbars=1,resizable=1,height=350,width=400'); return false;\"><img src='add.png' alt='add'/>nouveau fichier</a></li>";
                }
                echo "</ul>
                </li>";
            }
        
        }
    }
    else
    {
        return ;
    }

            /*$result1 = $dossierC1->recupererDossier($id_dossier);
            foreach($result1 as $row1)
            {
                $id_surdossier1 = $row1['id'];

            echo "<li class='treeview'><a href=''><i class='fa fa-circle-o'></i>".$row1['nom']."</a> 
                <ul class='treeview-menu'>";
                    $result2 = $dossierC1->recupererDossier($id_surdossier1);
                    foreach($result2 as $row2)
                    {
                  echo "<li><a href='gestionFichier.php?dossier=".$row2['id']."'><i class='fa fa-circle-o'></i>".$row2['nom']."</a></li>";
                   }
                    if($_SESSION['type'] == 1){
                        $_SESSION['surdossier'] = $row1['id'];
                        $_SESSION['surdossier'] = $row1['id'];
                  echo "<li><a href='' onclick='open('ajoutDossier.php?surdossier=".$row1['id']."', 'Popup', 'scrollbars=1,resizable=1,height=300,width=400'); return false;'><img src='add.png' alt='add'/> dossier</a>
                  <a href='' onclick='open('ajoutFichier.php?surdossier=".$row1['id']."', 'Popup', 'scrollbars=1,resizable=1,height=350,width=400'); return false;'><img src='add.png' alt='add'/> fichier</a></li>";
                    }
                echo "</ul>
                </li>";
            }
              if($_SESSION['type'] == 1){
                $_SESSION['surdossier'] = $row['id'];
                $_SESSION['surdossier'] = $row['id'];
            echo "<li><a href='' onclick='open('ajoutDossier.php?surdossier='".$row['id']."', 'Popup', 'scrollbars=1,resizable=1,height=300,width=400'); return false;'><img src='add.png' alt='add'/> dossier</a>
            <a href='' onclick='open('ajoutFichier.php?surdossier='".$row['id']."', 'Popup', 'scrollbars=1,resizable=1,height=350,width=400'); return false;'><img src='add.png' alt='add'/> fichier</a></li>";
              }
          echo "</ul>
          </li>";
        */
     }
        
}
?>