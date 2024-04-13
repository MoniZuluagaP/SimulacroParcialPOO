<?php

include_once ("Cliente.php");
include_once ("Moto.php");
include_once ("Venta.php");
include_once ("Empresa.php");

$objCliente1 = new Cliente("Monica","Zuluaga","no","dni",95051120);
$objCliente2 = new Cliente("Pedro","Sanchez","no","dni",32541236);
$obMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$obMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$obMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

$empresa = new empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2], [$obMoto1, $obMoto2, $obMoto3], []);
echo "INFO DE LA EMPRESA\n***************\n";
echo $empresa;

$empresa->registrarVenta([11,12,13], $objCliente2); //Intentando registrar venta de3 motos (1 no disponible) a un cliente activo
echo "Ventas de la empresa:\n-------------------------------";
echo$empresa->imprimirColVent();

$empresa->registrarVenta([0], $objCliente2); //Intentando registrar venta de 1 moto (que no existe en la empresa)
echo "Ventas de la empresa:\n-------------------------------";
echo $empresa->imprimirColVent();

$empresa->registrarVenta([2], $objCliente2);//Intentando registrar venta de 1 moto (que no existe en la empresa)
echo "Ventas de la empresa:\n-------------------------------";
echo $empresa->imprimirColVent();

$empresa->registrarVenta([11,11,11], $objCliente1); //Intentando registrar venta de 3 motos disponibles a un cliente activo
echo "Ventas de la empresa:\n-------------------------------";
echo $empresa->imprimirColVent();

$objCliente1->setBaja("si");
$empresa->registrarVenta([12], $objCliente1); //Intentando registrar venta de 1 moto disponible a un cliente que pasó a estar inactivo
echo "Ventas de la empresa:\n-------------------------------";
echo $empresa->imprimirColVent();

$obMoto3->setActiva(true);
$empresa->registrarVenta([13],$objCliente1); //Intentando registrar venta de 1 moto que cambio su estado a disponible, por un cliente dado de baja
echo "Ventas de la empresa:\n-------------------------------";
echo $empresa->imprimirColVent();

$empresa->registrarVenta([13],$objCliente2); //Intentando registrar venta de 1 moto que cambio su estado a disponible, por un cliente activo
echo "Ventas de la empresa:\n-------------------------------";
echo $empresa->imprimirColVent();

echo "INFO DE LA EMPRESA DESPUES DE LAS VENTAS\n***************\n";
echo $empresa;