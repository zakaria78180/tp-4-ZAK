<?php
class Nationalite {

    /**
    * numero de la nationalite
    * 
    * @var int
    */
    private $num;

    /**
    * libelle de la nationalite
    * 
    * @var string
    */
    private $libelle;

    /**
     * num continent (clé étrangère) relié à num de continent
     *
     * @var int
     */
    private $numContinent;

    /**
    * Get the value of num
    */ 
    public function getNum() 
    {
    return $this->num;
    }

    /**
     * lit le libelle
     *
     * @return string
     */
    public function setLibelle() :string
    {
    return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setNum( string $libelle) : self
    {
    $this->libelle = $libelle;

    return $this;
    }

    /**
     * Renvoie l'objet continent associé
     *
     * @return Continent
     */
    public function getContinent() : Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * Ecrit le num continent
     *
     * @param Continent $continent
     * @return self
     */
    public function setContinent(Continent $continent) : self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }
    /**
     * Retourne l'ensemble des nationalite
     * 
     * @return Nationalite[] tableau d'objet nationalite
     */
    public static function findAll(?string $libelle=null, ?string $nationalites=null) :array
    {
        $req=MonPdo::getInstance()->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve une nationalite par son num
     * 
     * @param integer $id numéro dd nationalite
     * @return Nationalite objet nationalite trouvé
     */
    public static function findById(int $id) :Nationalite 
    {
        $req=MonPdo::getInstance()->prepare("Select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->bindParam(':id' , $id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat; 
    }

    /**
     * Permet d'ajouter une nationalite
     *
     * @param Nationalite $nationalite nationalite à ajouter
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle,numContinent) values(:libelle, :numContinent)");
        $req->bindParam(':libelle' , $nationalite->setLibelle());
        $req->bindParam(':numContinent' , $nationalite->getContinent());
        $nb=$req->execute();
        return $nb; 
    }

    /**
     * Permet de modifier une nationalite
     *
     * @param Nationalite $nationalite nationalite a modifier
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(Nationalite $nationalite) :int 
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle, numContinent= :numContinent where num= :id");
        $num=$nationalite->getNum();
        $libelle= $nationalite->setlibelle();
        $req->bindParam(':id', $num);
        $req->bindParam(':libelle' , $libelle);
        $req->bindParam(':numContinent' , $nationalite->getContinent()->getNum());
        $nb=$req->execute();
        return $nb; 

    }

    /**
     * Permet de supprimer une nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function delete(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
        $req->bindParam(':id' , $nationalite->getNum());
        $nb=$req->execute();
        return $nb; 
    }
}

?>