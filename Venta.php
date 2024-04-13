
<?php
/*1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.*/
class Venta
{
    private $numVen;
    private $fechVen;
    private $objClien;
    private $objColMot;
    private $precVenta;

    public function __construct($numeroVent, $fechaVent, Cliente $cliente, $colMotosVenta, $preFinal){
        $this->numVen = $numeroVent;
        $this->fechVen = $fechaVent;
        $this->objClien = $cliente;
        $this->objColMot = $colMotosVenta;
        $this->precVenta = $preFinal;
    }
    public function setNumVen($numeroV){
        $this->numVen = $numeroV;
    }
    public function setFechaVen($fechaV){
        $this->fechVen = $fechaV;
    }
    public function setCliente(Cliente $cliente){
        $this->objClien = $cliente;
    }
    public function setColMotosV($motVen){
        $this->objColMot = $motVen;
    }
    public function setPrecioVenta($preMot){
        $this->precVenta = $preMot;
    }
    public function getNumVen(){
        return $this->numVen;
    }
    public function getFechaVen(){
        return $this->fechVen;
    }
    public function getCliente(){
        return $this->objClien;
    }
    public function getColMotosV(){
        return $this->objColMot;
    }
    public function getPrecioM(){
        return $this->precVenta;
    }
    public function imprimirColMot(){
        $mot = $this->getColMotosV();
        $stringMotos = "";
        foreach($mot as $moto){
            $stringMotos = $stringMotos.$moto;
        }
        return $stringMotos;
    }
    public function __toString(){
        return "\n* número de venta: ".$this->getNumVen()."\nFecha de venta: ".$this->getFechaVen()."\nCliente: ".$this->getCliente()."\n".$this->imprimirColMot()."\nPrecio final de la venta: ".$this->getPrecioM()."\n\n";
    }
    public function incorporarMoto(Moto $objMoto){
        $ParaVenta = $objMoto->getActiva();
        $motosVenta = $this->getColMotosV();
        if ($ParaVenta){
        array_push($motosVenta, $objMoto);
        $this->setPrecioVenta($objMoto->darPrecioVenta());
        $this->setColMotosV($motosVenta);
        }
    }
}
