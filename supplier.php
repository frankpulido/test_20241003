<?php
declare(strict_types=1);
require "enumkind.php";

class Supplier{
    // Attributes
    protected $name;
    protected $address;
    protected $phone;
    protected $email;
    protected $kind;

    // Constructor
    public function __construct(string $name, string $address, string $phone, string $email, array $kind)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->kind = $kind;
    }

    // Getter
    public function getName() {
        return $this->name;
    }
    
    public function getKind() {
        return $this->kind;
    }
    
    // to String
    public function __toString()
    {
        return "Supplier name : $this->name." . PHP_EOL . "Address : $this->address." . PHP_EOL . "Phone : $this->phone." . PHP_EOL . "email : $this->email." . PHP_EOL;
    }

    /*
    DESECHAMOS LA IDEA DE TRABAJAR CON STRINGS, HACEMOS "IN_ARRAY()" DIRECTAMENTE CON OBJETOS
    Crear array con tipos
    public function arrayKind() : array {
        $arrayKind = $this->kind;
        $enumStrings = [];
        foreach($arrayKind as $kind) {
            $enumStrings[] = $kind->name;
        }
        return $enumStrings;
    }
    */

    
    /*
    public function searchKind($kind) : string {
        if(in_array($kind, $this->kind)){return $this->__toString();}
    }

    // Search supplier using substring
    public function searchSupplier(string $name) {
        if(str_contains(strtolower($this->name), strtolower($name))){return $this->__toString();}
        else{return "";}
    }
    */
}
?>