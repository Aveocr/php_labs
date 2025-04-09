<?php
class MountainBike extends Bicycle {
    protected bool $hasSuspension;
    protected float $wheelDiameter;

    public function __construct(string $name, float $price, string $brand, int $year, 
                               int $gears, string $frameMaterial, float $weight,
                               bool $hasSuspension, float $wheelDiameter) {
        parent::__construct($name, $price, $brand, $year, $gears, $frameMaterial, $weight);
        $this->hasSuspension = $hasSuspension;
        $this->wheelDiameter = $wheelDiameter;
    }

    // Геттеры
    public function hasSuspension(): bool {
        return $this->hasSuspension;
    }

    public function getWheelDiameter(): float {
        return $this->wheelDiameter;
    }

    // Переопределение метода расчета цены
    public function getActualPrice(): float {
        $basePrice = parent::getActualPrice();
        // Горные велосипеды теряют цену медленнее
        return $basePrice * 1.1;
    }

    // Переопределение метода вывода информации
    public function getInfo(): string {
        return parent::getInfo() . 
               ", Подвеска: " . ($this->hasSuspension ? "есть" : "нет") . 
               ", Диаметр колес: {$this->wheelDiameter} дюймов";
    }
}
?>