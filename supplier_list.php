<?php
declare(strict_types = 1);
require "supplier.php";

class SupplierList {
    // Attributes
    protected array $suppliers;
    // public static array $suppliers;
    
    // Constructor
    public function __construct()
    {
        //$this->suppliers = $this->initSuppliers();
        self::$suppliers = self::initSuppliers();
    }
    // Initialize : guess that this file must be substituted by QUERIES to a DATABASE
    public function initSuppliers(){
        $suppliers = [];
        $suppliers[] = new Supplier ('ruben', 'su casa', '666555444', 'ruben@gmail.com', [Kind::PV]);
        $suppliers[] = new Supplier ('frank', 'mi casa', '666444555', 'frank@gmail.com', [Kind::PV, Kind::THERMAL]);
        $suppliers[] = new Supplier ('Disribuciones Frankenstein', 'casa3', '666777888', 'frankenstein@gmail.com', [Kind::PV]);
        $suppliers[] = new Supplier ('Ben Stiller Supplies', 'casa4', '666456789', 'ben@gmail.com', [Kind::THERMAL]);
        $suppliers[] = new Supplier ('fRaNkY VALLIE', 'casa5', '678444555', 'vallie@gmail.com', [Kind::PV]);
        return  $suppliers;
    }
    // Getter
    public function getSupplierList() : array {
        return $this->suppliers;
    }
    /*
    public static function getSupplierList() : array {
        return self::$suppliers;
    }
    */

    // Setter
    public function setSupplierList(array $suppliers) {
        $this->suppliers = $suppliers;
    }
    // Add Supplier
    public function addSupplier(Supplier $supplier) : string {
        if(in_array($supplier, $this->suppliers)){return "REQUEST DENIED. Client already \"active\". Please, take care not to duplicate reegisters.";}
        else{$this->suppliers[] = $supplier; return "The following supplier is now ACTIVE :" . PHP_EOL . $supplier->__toString();}
    }
    // Remove Supplier
    public function deleteSupplier(Supplier $supplier) : string {    
        // https://www.w3schools.com/php/func_array_diff.asp  
        if(in_array($supplier, $this->suppliers)){$this->suppliers = array_diff($this->suppliers,[$supplier]); return "The following supplier has been removed from \"active\" :" . PHP_EOL . $supplier->__toString();}
        else{return "REQUEST DENIED. The supplier was not found as \"active\" in our system.";}
    }
    // Search Supplier by kind of solar plate
    public function searchKind(Kind $kind) : string {
        $reply = "";
        foreach($this->suppliers as $supplier) {
            if(in_array($kind, $supplier->getKind())){$reply = $reply . $supplier->__toString() . PHP_EOL;}
            // No existe "else" porque no contemplamos que sea posible la inexistencia de proveedores para los productos comercializados
        }
        return $reply;
    }
    // Search Supplier using name substring
    public function searchSupplier(string $name) {
        // https://www.php.net/manual/en/function.str-contains.php
        $reply = "";
        foreach($this->suppliers as $supplier) {
            if(str_contains(strtolower($supplier->getName()), strtolower($name))){$reply = $reply . $supplier->__toString() . PHP_EOL;}
            //else{return "The supplier was not found in our records.";}
        }
        if($reply == ""){$reply = "The supplier was not found in our records." . PHP_EOL;}
        return $reply;
    }
}
?>