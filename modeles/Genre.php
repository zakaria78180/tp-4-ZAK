<?php
class Genre {

    /**
    * numero du genre
    * 
    * @var int
    */
    private $num;

    /**
    * libelle du genre
    * 
    * @var string
    */
    private $libelle;

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
    public function getLibelle() : string
    {
    return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle( string $libelle) : self
    {
    $this->libelle = $libelle;

    return $this;
    }

    /**
     * Retourne l'ensemble des genres
     * 
     * @return Genre[] tableau d'objet genres
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("Select * from genre");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve un genre par son genre
     * 
     * @param integer $id numéro dd genre
     * @return Genre objet genre trouvé
     */
    public static function findById(int $id) :Genre 
    {
        $req=MonPdo::getInstance()->prepare("Select * from genre where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        $req->bindParam(':id' , $id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat; 
    }

    /**
     * Permet d'ajouter un genre
     *
     * @param Genre $genre genre à ajouter
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(Genre $genre) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into genre(libelle) values(:libelle)");
        $req->bindParam(':libelle' , $genre->getLibelle());
        $nb=$req->execute();
        return $nb; 
    }

    /**
     * Permet de modifier un genre
     *
     * @param Genre $genre continent a modifier
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(Genre $genre) :int 
    {
        $req=MonPdo::getInstance()->prepare("update genre set libelle= :libelle where num= :id");
        $req->bindParam(':id' , $genre->getNum());
        $req->bindParam(':libelle' , $genre->getLibelle());
        $nb=$req->execute();
        return $nb; 

    }

    /**
     * Permet de supprimer un genre
     *
     * @param Genre $genre
     * @return integer
     */
    public static function delete(Genre $genre) :int
    {
        $req=MonPdo::getInstance()->prepare("delete from genre where num= :id");
        $req->bindParam(':id' , $genre->getNum());
        $nb=$req->execute();
        return $nb; 
    }


}

?>