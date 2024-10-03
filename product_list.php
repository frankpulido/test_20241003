<?php
declare(strict_types = 1);
require "solar_plates.php";

class ProductList {
    // Attributes
    protected array $productList;
    
    // Constructor
    public function __construct(){
        $this->productList = $this->initList();
    }

    // Getter
    public function getProductList() : array {
        return $this->productList;
    }

    // Setter
    public function setProductList(array $productList) {
        $this->productList = $productList;
    }

    // Initialize
    public function initList() {
        $init = [
            new Plate("Qcells", Kind::PV, 210.75, 445, 29.54),
            new Plate("Silfab Solar", Kind::PV, 229.50, 500, 38.80),
            new Plate("Junkers", Kind::THERMAL, 1434.32, 350, 20),
            new Plate("Hermann Saunier Duval", Kind::THERMAL, 1573.33, 375, 25)
        ];
        return $init;
    }

    // Show List
    public function showList() : string {
        $reply = "";
        $utility = $this->getProductList();
        foreach($utility as $product){
            $reply = $reply . PHP_EOL . $product->__toString();
        }
        return $reply;
    }

    // Add product
    public function addPlate(Plate $new) {
        $utility = $this->getProductList();
        $utility[] = $new;
        $this->setProductList($utility);
    }

    // Average Price
    public function avgPrice() : float {
        $utility = $this->getProductList();
        $prices = [];
        $avg = 0;
        foreach($utility as $product) {
            $prices [] = $product->getPrice();
        }
        $avg =  round(array_sum($prices) / count($utility), 2);
        return $avg;
    }

    // Filter by power no less than
    public function gtePower(float $minPower) : string {
        $filter = [];
        $utility = $this->getProductList();
        foreach($utility as $product) {
            if($product->getPower() >= $minPower) {$filter[] = $product;}
        }
        if (count($filter) == 0) {return "Todas las placas en inventario tienen una potencia menor a la indicada";}
        else {
            $reply = "";
            foreach($filter as $matchingFilter){
                $reply = $reply . $matchingFilter->__toString() . PHP_EOL;
            }
            return $reply;
        }
    }
}
?>