<?php

class City {
    public $name;
    public $foundation;
    public $population;

    public function __construct($name, $foundation, $population) {
        $this->name = $name;
        $this->foundation = $foundation; // Исправлено: foundation вместо fodation
        $this->population = $population;
    }
}

$city_1 = new City('New York', 1812, 1955944);

$prop = ['name', 'foundation', 'population'];

foreach ($prop as $value) { // Исправлено: перебор массива $prop
    echo $city_1->$value . "\n"; // Исправлено: $city_1 вместо $city1
}

?>