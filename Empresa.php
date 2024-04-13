<?php
/*1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente*/
class Empresa
{
    private $denomEmp;
    private $dirEmpe;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($nomEmp, $direEmp,$cliEmp, $motosEmp, $ventEmp){
        $this->denomEmp = $nomEmp;
        $this->dirEmpe = $direEmp;
        $this->colClientes = $cliEmp;
        $this->colMotos = $motosEmp;
        $this->colVentas = $ventEmp;
    }
    public function setDenom($nomEmp){
        $this->denomEmp = $nomEmp;
    }
    public function setDir($direEmp){
        $this->dirEmpe = $direEmp;
    }
    public function setClientes($cliEmp){
        $this->colClientes = $cliEmp;
    }
    public function setMotos($motosEmp){
        $this->colMotos = $motosEmp;
    }
    public function setVentas($ventEmp){
        $this->colVentas = $ventEmp;
    }
    public function getDenom(){
        return $this->denomEmp;
    }
    public function getDir(){
        return $this->dirEmpe;
    }
    public function getClientes(){
        return $this->colClientes;
    }
    public function getMotos(){
        return $this->colMotos;
    }
    public function getVentas(){
        return $this->colVentas;
    }
    public function imprimirColCli(){
        $cl = $this->getClientes();
        $stringClientes = "";
        foreach($cl as $cliente){
            $stringClientes =$stringClientes.$cliente."\n";
        }
        return $stringClientes;
    }
    public function imprimirColMot(){
        $mot = $this->getMotos();
        $stringMotos = "";
        foreach($mot as $moto){
            $stringMotos = $stringMotos.$moto;
        }
        return $stringMotos;
    }
    public function imprimirColVent(){
        $ventas = $this->getVentas();
        $stringVentas = "";
        foreach($ventas as $venta){
            $stringVentas = $stringVentas.$venta;
        }
        return $stringVentas;
    }
    public function __toString()
    {
        return "Empresa:".$this->getDenom()."\nDireccion:".$this->getDir()."\n\nClientes:\n".$this->imprimirColCli()."\nMotos:\n".$this->imprimirColMot().
            "\nVentas:\n".$this->imprimirColVent()."\n\n";
    }
    public function retornarMoto($codigoMoto){
        $listaMotos = $this->getMotos();
        $cantMot = count($listaMotos);
        $i = 0;
        $encontrada = false;
        $moto = null;
        while ($i<$cantMot && !$encontrada){
            if ($codigoMoto == $listaMotos[$i]->getCod()){
                $encontrada = true;
            }
            $i++;
        }
        if ($encontrada){
            $moto = $listaMotos[$i-1];
        }
        return $moto;
    }
    public function registrarVenta($colCodigosMoto, Cliente $objCliente){
        $cantCod = count($colCodigosMoto);
        $colMotosVenta = [];
        $numeroVent = 0;
        $fechaVent = date("Y");
        $estCliente = $objCliente->getBaja();
        $cliente = $objCliente;
        $importeTotal = 0;
        $colVentas = $this->getVentas();
        $objVenta = new Venta($numeroVent, $fechaVent,$cliente, $colMotosVenta, $importeTotal);

        if ($estCliente=="no"){
            for ($i = 0 ; $i<$cantCod; $i++ ){
                $motoEncontrada = $this->retornarMoto($colCodigosMoto[$i]);
                if ($motoEncontrada && $motoEncontrada->getActiva()){
                    $numeroVent = count($this->getVentas())+1;
                    $objVenta->setNumVen($numeroVent);
                    $objVenta->incorporarMoto($motoEncontrada);
                    $colMotosVenta = $objVenta->getColMotosV();
                    $importeTotal += $objVenta->getPrecioM();
                }
            }
            if ($importeTotal>0){
                $objVenta = new Venta($numeroVent, $fechaVent,$cliente, $colMotosVenta, $importeTotal);
                array_push($colVentas, $objVenta);
                $this->setVentas($colVentas);
            }
        }
        return $importeTotal;
    }

/*    public function retornarVentasXCliente($tipo,$numDoc){
        venACliente = [];
        $motVend = $this->getVentas();
        for

    }*/

}