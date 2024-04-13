

<?php
/*0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.*/
class Cliente
{
    private $nomClie;
    private $apeClie;
    private $dadoBaja;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDocumento, $numeroDocumento){
        $this->nomClie = $nombre;
        $this->apeClie = $apellido;
        $this->dadoBaja = $dadoDeBaja;
        $this->tipoDoc = $tipoDocumento;
        $this->numDoc = $numeroDocumento;
    }
    public function setNombre($nom){
        $this->nomClie = $nom;
    }
    public function setApellido($ape){
        $this->apeClie = $ape;
    }
    public function setBaja($baja){
        $this->dadoBaja = $baja;
    }
    public function setTipoDoc($tdoc){
        $this->tipoDoc = $tdoc;
    }
    public function setNumDoc($numDoc){
        $this->numDoc = $numDoc;
    }
    public function getNombre(){
        return $this->nomClie;
    }
    public function getApellido(){
        return $this->apeClie;
    }
    public function getBaja(){
        return $this->dadoBaja;
    }
    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function getNumDoc(){
        return $this->numDoc;
    }
    public function __toString()
    {
        return "* Nombre: ".$this->getNombre()."\nApellido: ".$this->getApellido()."\nDado de baja: ".$this->getBaja()."\nTipo doc: ".$this->getTipoDoc()."\nNumero Doc: ".$this->getNumDoc();
    }
}