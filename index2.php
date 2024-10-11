<?php
declare(strict_types = 1);
require "supplier_list.php";
// distribuidoras de placa : name, address, phone, email, array(tipos)
// dado el tipo de placa indicar distribuidoras que la comercializan
// dado string devolver fábricas cuyo nombre contenga el string (search supplier)

$suppliersList = new SupplierList();
//$suppliersList2 = SupplierList::getSupplierList();

$option = -1;
$product_search;
$supplier_search;
$kind;
$reply;

do {
    echo PHP_EOL;
    echo "Users menu :" . PHP_EOL . "1. Search supplier for a specific product." . PHP_EOL . "2. Search supplier using sub-string."  . PHP_EOL . "0. Exit" . PHP_EOL;
    $option = (int) readline("Choose option : ");
    switch ($option) {
        case 0 :
            echo PHP_EOL;
            echo "Exit menu. So long!.";
            echo PHP_EOL;
            break;
        case 1:
            echo PHP_EOL;
            $product_search = (int) readline("For PV plates choose [1]" . PHP_EOL . "For THERMIC plates choose [2]." . PHP_EOL . "Your choice : ");
            echo PHP_EOL;
            if($product_search == 1){$reply = $suppliersList->searchKind(Kind::PV);}
            elseif($product_search == 2){$reply = $suppliersList->searchKind(Kind::THERMAL);}
            else {$reply = "Your choice is not valid" . PHP_EOL;}
            // No contemplo el caso de que el producto no tenga ningún proveedor. En Tabla PRODUCTOS la columna proveedor es VARCHAR NOT NULL
            echo $reply;
            break;
        case 2:
            echo PHP_EOL;
            $supplier_search = readline("Please, indicate name of supplier to look up : ");
            echo PHP_EOL;
            echo $suppliersList->searchSupplier($supplier_search);
            //foreach($suppliers as $supplier){$supplier->searchSupplier($supplier_search);}
            break;
        default :
            echo PHP_EOL;
            echo "Please, choose a valid menu option [0-1-2]." . PHP_EOL;
            break;
    }
} while ($option != 0);

?>