<?php
declare(strict_types = 1);
require "product_list.php";

/*
ENUNCIADO :
E-COMMERCE
2 tipos de placas solares : Fotovoltaicas y térmicas
https://www.ocu.org/vivienda-y-energia/paneles-fotovoltaicos/consejos/diferencias-entre-paneles-fotovoltaicos-y-termicos

Clase Placa : Construir 4 objetos
- marca
- térmicas / fotovoltaicas
- precio
- potencia
- voltaje

Se requiere
- Filtrar potencia >= $valor
- Precio medio

*****************
PV : https://www.ocu.org/vivienda-y-energia/paneles-fotovoltaicos/comparador
THERMAL : https://www.ocu.org/vivienda-y-energia/gas-luz/test/solar-termica/results
*/


$productList = new ProductList();
echo "Nuestra lista de Productos en la Categoría \"placas solares\"" . PHP_EOL;
echo $productList->showList();
echo PHP_EOL;

$option = -1;
$minPower = 0;
$kind = Kind::PV;

do {
    echo PHP_EOL;
    echo "Menú de usuario :" . PHP_EOL . "[1] Mostrar listado." . PHP_EOL . "[2] Mostrar precio medio." . PHP_EOL . "[3] Mostrar productos de potencia mínima requerida por el cliente." . PHP_EOL . "[4] Añadir producto al listado." . PHP_EOL . "[0] Salir del sistema" . PHP_EOL;
    echo PHP_EOL;
    $option = (int) readline("Indique su elección (0-4) : ");
    echo PHP_EOL;
    switch ($option) {
        case 0 :
            echo "Se cierra sesión de usuario" . PHP_EOL;
            break;
        case 1 :
            echo $productList->showList();
            break;
        case 2 :
            echo "Precio medio de nuestras placas solares : " . $productList->avgPrice() . " €.";
            break;
        case 3 :
            $minPower = (float) readline("Indiqué la potencia mínima requerida : ");
            echo $productList->gtePower($minPower);
            break;
        case 4 :
            echo "Ha elegido dar de alta un nuevo producto. Indique sus características a continuación : " . PHP_EOL;
            $brand = readline("Indiqué la marca de la placa solar : ");
            echo PHP_EOL;
            echo "Existen 2 tipos de placas : [1] fotovoltaicas y [2] térmicas" . PHP_EOL;
            $bridge = (int) readline("Indiqué el tipo de la placa solar (1 o 2): ");
            if($bridge == 1) {$kind = Kind::PV;} else {$kind = Kind::THERMAL;}
            echo PHP_EOL;
            $price = (float) readline("Indiqué el precio de la placa solar : ");
            echo PHP_EOL;
            $power = (float) readline("Indiqué la potencia (kW) de la placa solar : ");
            echo PHP_EOL;
            $voltage = (float) readline("Indiqué el voltaje (V) de la placa solar : ");
            echo PHP_EOL;
            $newPlate = new Plate($brand, $kind, $price, $power, $voltage);
            $productList->addPlate($newPlate);
            break;
        default :
            echo "Debe seleccionar una opción válida" . PHP_EOL;
    }
    echo PHP_EOL;
} while ($option != 0);
?>