<?PHP
include_once "config.php";
include_once "dossierC.php";

class UserC
{
    function addUser($user)
    {
        $date = date("Y-m-d");
        $sql = "insert into user (login, email, nom, password, type, datei, profil) values (:login, :email, :nom, :password, :type, :datei, :profil)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':login', $user->getLogin());
            $req->bindValue(':password', $user->getPassword());
            $req->bindValue(':nom', $user->getNom());
            $req->bindValue(':email', $user->getEmail());
            $req->bindValue(':type', '2');
            $req->bindValue(':datei', $date);
            $req->bindValue(':profil', $_SESSION['profil']);

            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function existUser($login)
    {
        $sql = "select * from user where login=:login";
        $db = config::getConnexion();
        try {
            
            $user = $db->prepare($sql);

            $user->bindValue(':login', $login);
            $user->execute();
            if($user->rowCount() == 0)
            return 0;
            else
            return 1;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function droit($id_dossier, $login, $lecture, $ecriture, $suppression)
    {
        $date = date("Y-m-d");
        $sql = "select * from acces where id_user=:id_user and id_dossier=:id_dossier";
        $db = config::getConnexion();
        try {
            $result = $db->prepare($sql);

            $result->bindValue(':id_user', $login);
            $result->bindValue(':id_dossier', $id_dossier);
            $result->execute();
            if($result->rowCount() == 0)
            {
                $sql = "insert into acces (id_user, id_dossier, dateajout, lecture, ecriture, suppression) values (:id_user, :id_dossier, :date, :lecture, :ecriture, :suppression)";
                $db = config::getConnexion();
                try {
                    $req = $db->prepare($sql);

                    $req->bindValue(':id_user', $login);
                    $req->bindValue(':id_dossier', $id_dossier);
                    $req->bindValue(':date', $date);
                    $req->bindValue(':lecture', $lecture);
                    $req->bindValue(':ecriture', $ecriture);
                    $req->bindValue(':suppression', $suppression);
                    $req->execute();
                } catch (Exception $e) {
                    echo 'Erreur: ' . $e->getMessage();
                }
            }
            else{
                $sql = "update acces set dateajout = :date, lecture = :lecture, ecriture = :ecriture, suppression = :suppression where id_user = :id_user and id_dossier = :id_dossier";
                $db = config::getConnexion();
                try {
                    $req = $db->prepare($sql);

                    $req->bindValue(':id_user', $login);
                    $req->bindValue(':id_dossier', $id_dossier);
                    $req->bindValue(':date', $date);
                    $req->bindValue(':lecture', $lecture);
                    $req->bindValue(':ecriture', $ecriture);
                    $req->bindValue(':suppression', $suppression);
                    $req->execute();
                } catch (Exception $e) {
                    echo 'Erreur: ' . $e->getMessage();
                }
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function droitDossier($id_dossier, $login, $lecture, $ecriture, $suppression)
    {
        $dossierc = new DossierC();
        $userc = new UserC();
        $dossier = $dossierc->recupererAllDossier($id_dossier);
        $userc->droit($id_dossier, $login, $lecture, $ecriture, $suppression);
        if($dossier->rowCount() != 0)
        {
            foreach($dossier as $row)
            {
                $userc->droitDossier($row['id'], $login, $lecture, $ecriture, $suppression);
            }
        }
    }

    function recupererAcces($id_user)
    {
        $sql = "SELECT * FROM acces a inner join dossier d on a.id_dossier = d.id WHERE a.id_user = :id_user ORDER BY a.dateajout DESC";
        $db = config::getConnexion();
        try {
            $result = $db->prepare($sql);

            $result->bindValue(':id_user', $id_user);
            $result->execute();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererDroit($dossier, $id_user)
    {
        $sql = "SELECT * FROM acces a WHERE id_user = :id_user and id_dossier = :dossier";
        $db = config::getConnexion();
        try {
            $result = $db->prepare($sql);
            $result->bindValue(':id_user', $id_user);
            $result->bindValue(':dossier', $dossier);
            $result->execute();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function nombreUser($type)
    {
        $sql = "select count(*) as nbre from user where type = :type";
        $db = config::getConnexion();
        try {
            $user = $db->prepare($sql);
            $user->bindValue(':type', $type);
            $user->execute();
            foreach($user as $row)
            {
                return $row['nbre'];
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererUser_type($type)
    {
        //$sql = "SELECT * from utilisateur where email = :email";
        $sql = "select * from user where type=:type";
        $db = config::getConnexion();
        try {
            $user = $db->prepare($sql);

            $user->bindValue(':type', $type);
            $user->execute();

            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererUser($login)
    {
        //$sql = "SELECT * from utilisateur where email = :email";
        $sql = "select * from user where login=:login";
        $db = config::getConnexion();
        try {
            $user = $db->prepare($sql);

            $user->bindValue(':login', $login);
            $user->execute();

            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function verifierUser($login, $email)
    {
        //$sql = "SELECT * from utilisateur where email = :email";
        $sql = "select * from user where login=:login or email=:email";
        $db = config::getConnexion();
        try {
            $user = $db->prepare($sql);
            $user->bindValue(':login', $login);
            $user->bindValue(':email', $email);
            $user->execute();

            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererUserMdp($login, $mdp)
    {
        //$sql = "SELECT * from utilisateur where email = :email";
        $sql = "select * from user where login=:login and password=:mdp";
        $db = config::getConnexion();
        try {
            $user = $db->prepare($sql);
            $user->bindValue(':login', $login);
            $user->bindValue(':mdp', $mdp);
            $user->execute();

            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererIdUser($login)
    {
        $userc = new UserC();
        $user = $userc->recupererUser($login);
        foreach($user as $row)
        {
            return $row['id'];
        }
    }

    function editNom($nom)
    {
        $sql = "update user set nom = :nom where login = :login";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':nom', $nom);
            $req->bindValue(':login', $_SESSION['login']);
            $req->execute();
            $_SESSION['nom'] = $nom;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function editEmail($email)
    {
        $verif = "select email from user where email = :email";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($verif);

            $req->bindValue(':email', $email);
            $req->execute();
            if($req->rowCount() > 0) {
                return "invalid";
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }

        $sql = "update user set email = :email where login = :login";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':email', $email);
            $req->bindValue(':login', $_SESSION['login']);
            $req->execute();
            $_SESSION['email'] = $email;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function editPassword($AN_mdp, $mdp)
    {
        $verif = "select password from user where login = :login";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($verif);

            $req->bindValue(':login', $_SESSION['login']);
            $req->execute();
            foreach($req as $row){
                if($AN_mdp != $row['password'])
                    return "invalid";
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }

        $sql = "update user set password = :password where login = :login";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':password', $mdp);
            $req->bindValue(':login', $_SESSION['login']);
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
 
    function supprimerClient($login) {
        $sql="DELETE FROM client where login= :login";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':login',$login);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

        $sql="DELETE FROM utilisateur where email= :login";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':login',$login);
		try{
            $req->execute();
            header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererHuitUser()
    {
        $sql = "select * from user order by datei desc limit 8";
        $db = config::getConnexion();
        try {
            $user = $db->prepare($sql);
            $user->execute();
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererAllUser()
    {
        $sql = "select * from user";
        $db = config::getConnexion();
        try {
            $user = $db->prepare($sql);
            $user->execute();
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererMsg($sender, $receiver)
    {
        $sql = "select * from message m inner join user u on m.id_receiver=u.login where (id_sender=:id_sender and id_receiver=:id_receiver) or (id_sender=:id_receiver and id_receiver=:id_sender)";
        $db = config::getConnexion();
        try {
            $msg = $db->prepare($sql);
            $msg->bindValue(':id_receiver',$receiver);
            $msg->bindValue(':id_sender',$sender);
            $msg->execute();
            return $msg;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererAllMsg()
    {
        $sql = "select * from message m inner join user u on m.id_receiver=u.login";
        $db = config::getConnexion();
        try {
            $msg = $db->prepare($sql);
            $msg->execute();
            return $msg;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function addMessage($msg, $id_sender, $id_receiver)
    {
        $date = date("Y-m-d H:i:s");
        $sql = "insert into message (id, id_sender, id_receiver, msg, date_envoie) values (:id, :id_sender, :id_reveiver, :msg, :date_envoie)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(':id', "0");
            $req->bindValue(':id_sender', $id_sender);
            $req->bindValue(':id_reveiver', $id_receiver);
            $req->bindValue(':msg', $msg);
            $req->bindValue(':date_envoie', $date);

            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
