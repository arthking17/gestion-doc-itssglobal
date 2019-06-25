<?PHP
include_once "config.php";
include_once "dossierC.php";

class FichierC
{
    function ajouterFichier($fichier)
    {
        $date = date("Y-m-d");
        $sql = "insert into fichier (nom, url, dossier, dateajout) values (:nom, :url, :dossier, :date)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':nom', $fichier->getNom());
            $req->bindValue(':dossier', $fichier->getDossier());
            $req->bindValue(':url', "uploads/".$fichier->getUrl());
            $req->bindValue(':date', $date);
            $req->execute();
            $dossierC1 = new DossierC();
            $dossierC1->ajouterHistorique($_SESSION['nom'], $fichier->getNom(), 'ajouter', 'fichier', $dossierC1->recupererAdresseDossier($fichier->getDossier()), "");
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function idFichier($nom, $dossier)
    {
        $sql = "select id from fichier where nom = :nom and dossier = :dossier";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':nom', $nom);
            $req->bindValue(':dossier', $dossier);
            $req->execute();
            foreach($req as $row){
                return $row['id'];
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function nombreFichier()
    {
        $sql = "select count(*) as nbre from fichier";
        $db = config::getConnexion();
        try {
            $fichier = $db->prepare($sql);
            $fichier->execute();
            foreach($fichier as $row)
            {
                return $row['nbre'];
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererFichier($dossier, $fichier)
    {
        $sql = "select * from dossier where dossier = :dossier and nom = :fichier";
        $db = config::getConnexion();
        try {
            $fichier = $db->prepare($sql);
            $fichier->bindValue(':dossier', $dossier);
            $fichier->bindValue(':fichier', $fichier);
            $fichier->execute();

            return $fichier;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererAllFichier($dossier)
    {
        $sql = "select * from fichier where dossier = :dossier";
        $db = config::getConnexion();
        try {
            $fichier = $db->prepare($sql);
            $fichier->bindValue(':dossier', $dossier);
            $fichier->execute();

            return $fichier;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercherAllFichier($nom, $date)
    {
        if($_SESSION['type']==1){
            $sql = "select * from fichier where nom like :nom and dateajout like :dateajout ";
            $db = config::getConnexion();
            try {
                $fichier = $db->prepare($sql);
                $fichier->bindValue(':nom', "%".$nom."%");
                $fichier->bindValue(':dateajout', "%".$date."%");
                $fichier->execute();

                return $fichier;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        else if($_SESSION['type']==2){
            $sql = "select * from fichier f inner join acces a on a.id_dossier = f.dossier where nom like :nom and a.lecture = :lecture and a.id_user = :login and d.dateajout like :dateajout ";
            $db = config::getConnexion();
            try {
                $fichier = $db->prepare($sql);
                $fichier->bindValue(':nom', "%".$nom."%");
                $fichier->bindValue(':lecture', 'oui');
                $fichier->bindValue(':login', $_SESSION['login']);
                $fichier->bindValue(':dateajout', "%".$date."%");
                $fichier->execute();

                return $fichier;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    }

    function nbre_fichier($dossier)
    {
        $sql = "select count(*) as nbre from fichier where dossier = :dossier";
        $db = config::getConnexion();
        try {
            $fichier = $db->prepare($sql);
            $fichier->bindValue(':dossier', $dossier);
            $fichier->execute();

            return $fichier;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
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

    function editerFichier($fichier)
    {
        $fichierc = new FichierC();
        $an_nom = $fichierc->recupererNom($fichier->getId());
        $sql = "update fichier set nom = :nom, url = :url where id = :id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':nom', $fichier->getNom());
            $req->bindValue(':url', $fichier->getUrl());
            $req->bindValue(':id', $fichier->getId());
            $req->execute();
            $dossierC1 = new DossierC();
            $dossierC1->ajouterHistorique($_SESSION['nom'], $fichier->getNom(), 'renommer', 'fichier', $dossierC1->recupererAdresseDossier($fichierc->recupererIdDossier($fichier->getId())), $an_nom);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    
    function recupererIdDossier($id)
    {
        $sql = "select dossier from fichier where id = :id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':id', $id);
            $req->execute();
            foreach($req as $row){
                return $row['dossier'];
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function recupererNom($id)
    {
        $sql = "select nom from fichier where id = :id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':id', $id);
            $req->execute();
            foreach($req as $row){
                return $row['nom'];
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function supprimerfichier($id) {
        $fichierc = new FichierC();
        $nom = $fichierc->recupererNom($id);
        $sql="DELETE FROM fichier where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $dossierC1 = new DossierC();
            $dossierC1->ajouterHistorique($_SESSION['nom'], $nom, 'supprimer', 'fichier', $dossierC1->recupererAdresseDossier($fichierc->recupererIdDossier($id)), "");
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
