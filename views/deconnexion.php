<?PHP
    session_start ();
    session_unset ();
    session_destroy ();
    header ('location: pages/examples/login.html');
?>