<?php
class produit 
{
    private $code=null;
    private $nom=null;
    private $prix=null;
    private $qualite=null;
    private $stock=null;
    private $img=null;
    private $id=null;

function __construct($code,$nom,$prix,$qualite,$stock,$img,$id)
    {
        $this->code=$code;
        $this->nom=$nom;
        $this->prix=$prix;
        $this->qualite=$qualite;
        $this->stock=$stock;
        $this->img=$img;
        $this->id=$id;
    }

function getcode(){return $this->code;}
    function getnom(){return $this->nom;}
    function getprix(){return $this->prix;}
    function getqualite(){return $this->qualite;}
    function getstock(){return $this->stock;}
    function getimage(){return $this->img;}
    function getid(){return $this->id;}

    //setters
    function setcode(int $code){$this->code=$code;}
    function setnom(string $nom){$this->nom=$nom;}
    function setprix(int $prix){$this->prix=$prix;}
    function setqualite(int $qualite){$this->qualite=$qualite;}
    function setstock(int $stock){$this->stock=$stock;}
    function setimg(string $img){$this->img=$img;}
    function setid(int $id){$this->id=$id;}

}
?>