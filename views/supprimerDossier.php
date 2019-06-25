<?PHP
session_start();
include "../entities/dossier.php";
include "../cores/dossierC.php";

if (isset($_GET['dossier'])){
    $dossierC1 = new DossierC();
    $dossierC1->supprimerDossier($_GET['dossier']);
    header("Location:gestionFichier.php?dossier=".$_SESSION['iddossier']);
} 
else{
	echo "vérifier les champs";
}
?>