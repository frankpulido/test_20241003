<?php
declare(strict_types = 1);
require "enumkind.php";

class Plate {
protected string $brand;
protected Kind $kind;
protected float $price;
protected float $power;
protected float $voltage;

public function __construct(string $brand, Kind $kind, float $price, float $power, float $voltage)
{
    // Attributes
    $this->brand = $brand;
    $this->kind = $kind;
    $this->price = $price;
    $this->power = $power;
    $this->voltage = $voltage;
}

// Getters
public function getBrand() : string {
    return $this->brand;
}
public function getKind() {
    return $this->kind->name;
}
public function getPrice() : float {
    return $this->price;
}
public function getPower() : float {
    return $this->power;
}
public function getVoltage() : float {
    return $this->voltage;
}

// Setters
public function setBrand(string $brand) {
    $this->brand = $brand;
}
public function setKind(Kind $kind) {
    $this->kind = $kind;
}
public function setPrice(int $price) {
    $this->price = $price;
}
public function setPower(int $power) {
    $this->power = $power;
}
public function setVoltage(int $voltage) {
    $this->voltage = $voltage;
}

// toString
public function __toString() {
    return "Placa " . $this->kind->name . " marca $this->brand (Potencia $this->power W / Voltaje $this->voltage V). Precio : $this->price €.";
}

}
?>