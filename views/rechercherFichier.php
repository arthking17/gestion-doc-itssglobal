<?PHP
session_start();

require_once('../config.php');

if(isset($_GET['search'])){
    $sql = "select * from  where nom = :nom LIMIT 10";
        $db = config::getConnexion();
        try {
            $search  = $db->prepare($sql);
            $search->bindValue(':nom', $_GET['search']%);
            $search->execute();
            return $search;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
}

?>