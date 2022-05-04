<?php
class categorie{
    private $id=null;
    private $nom=null;


function __construct($id,$nom)
{$this->id=$id;
$this->nom=$nom;}

function getid(){return $this->id;}
function getnom(){return $this->nom;}
function setid(int $id){$this->id=$id;}
function setnom(string $nom){$this->nom=$nom;}    
}//fin class
?>