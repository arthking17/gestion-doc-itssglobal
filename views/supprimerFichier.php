<?PHP
session_start();
include "../entities/fichier.php";
include "../cores/fichierC.php";

if (isset($_GET['fichier']) and isset($_SESSION['iddossier'])){
    $fichierC1 = new FichierC();
    $fichierC1->supprimerfichier($_GET['fichier']);
    header("Location:gestionFichier.php?dossier=".$_SESSION['iddossier']);
} 
else{
	echo "vérifier les champs";
}
?>