<?PHP
class Fichier
{
    private $id;
    private $nom;
    private $url;
    private $dossier;
    function __construct($id, $nom, $url, $dossier)
    {
        $this->dossier = $dossier;
        $this->nom = $nom;
        $this->url = $url;
        $this->id = $id;
    }

    function getId()
    {
        return $this->id;
    }

    function getNom()
    {
        return $this->nom;
    }

    function getUrl()
    {
        return $this->url;
    }

    function getDossier()
    {
        return $this->dossier;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
    }

    function setUrl($url)
    {
        $this->url = $url;
    }

    function setDossier($dossier)
    {
        $this->dossier = $dossier;
    }
}
 