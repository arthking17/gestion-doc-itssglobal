<?PHP
class Dossier
{
    private $nom;
    private $sur_dossier;
    function __construct($nom, $sur_dossier)
    {
        $this->nom = $nom;
        $this->sur_dossier = $sur_dossier;
    }

    function getNom()
    {
        return $this->nom;
    }

    function getSur_dossier()
    {
        return $this->sur_dossier;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
    }

    function setSur_dossier($sur_dossier)
    {
        $this->sur_dossier = $sur_dossier;
    }
}
 