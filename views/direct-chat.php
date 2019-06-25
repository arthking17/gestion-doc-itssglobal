<?PHP
session_start();
include_once "../cores/userC.php";
if(isset($_POST['message']) and isset($_POST['send'])){
    $userc = new UserC();
    $userc->addMessage($_POST['message'], $_SESSION['login'], $_SESSION['receiver']);
    header('location: chat.php?receiver='.$_SESSION['receiver']);
}else {
    echo "verifier tous les champs";
}
?> 