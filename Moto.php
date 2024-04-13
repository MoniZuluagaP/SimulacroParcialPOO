

<?php
/*1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto. */
class Moto
{
    private $codMoto;
    private $costoMoto;
    private $anioFabMoto;
    private $desMoto;
    private $porcIncAnio;
    private $motoAct;

    public function __construct($codigo, $costo, $anioFab, $descripcion, $incAnual, $activa){
        $this->codMoto = $codigo;
        $this->costoMoto = $costo;
        $this->anioFabMoto = $anioFab;
        $this->desMoto = $descripcion;
        $this->porcIncAnio = $incAnual;
        $this->motoAct = $activa;
    }
    public function setCod($codigo){
        $this->codMoto = $codigo;
    }
    public function setCosto($costo){
        $this->costoMoto = $costo;
    }
    public function setAnioFab($anioFab){
        $this->anioFabMoto = $anioFab;
    }
    public function setdescMoto($desc){
        $this->desMoto = $desc;
    }
    public function setIncremento($incAn){
        $this->porcIncAnio = $incAn;
    }
    public function setActiva($act){
        $this->motoAct = $act;
    }
    public function getCod(){
        return $this->codMoto;
    }
    public function getCosto(){
        return $this->costoMoto;
    }
    public function getAnioFab(){
        return $this->anioFabMoto;
    }
    public function getdescMoto(){
        return $this->desMoto;
    }
    public function getIncremento(){
        return $this->porcIncAnio;
    }
    public function getActiva(){
        return $this->motoAct;
    }
    public function __toString()
    {
        return "* Código moto: ".$this->getCod()."\nCosto:".$this->getCosto()."\nAño de fabricación:".$this->getAnioFab()."\nDescripción:".$this->getdescMoto()."\nPorcentaje de incremento anual:".$this->getIncremento()."%\nDisponible para venta:".$this->getActiva()."\n";
    }
    public function darPrecioVenta(){
        $_compra = $this->getCosto();
        $anio_act = date("Y");
        $anio = $anio_act - $this->anioFabMoto;
        $por_inc_anual = $this->porcIncAnio;
        $dispVenta = $this->motoAct;

        $_venta = $_compra + $_compra * ($anio * $por_inc_anual/100);
        return $_venta;
    }
}