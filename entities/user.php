<?PHP
class User
{
    private $login;
    private $email;
    private $password;
    private $nom;
    function __construct($login, $email, $nom, $password)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->nom = $nom;
    }

    function getLogin()
    {
        return $this->login;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getNom()
    {
        return $this->nom;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setLogin($login)
    {
        $this->login = $login;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
    }
}
 