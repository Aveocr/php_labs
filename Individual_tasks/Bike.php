<?php
class Bicycle extends Product {
    protected int $gears;
    protected string $frameMaterial;
    protected float $weight;

    public function __construct(string $name, float $price, string $brand, int $year, 
                               int $gears, string $frameMaterial, float $weight) {
        parent::__construct($name, $price, $brand, $year);
        $this->gears = $gears;
        $this->frameMaterial = $frameMaterial;
        $this->weight = $weight;
    }

    // Геттеры
    public function getGears(): int {
        return $this->gears;
    }

    public function getFrameMaterial(): string {
        return $this->frameMaterial;
    }

    public function getWeight(): float {
        return $this->weight;
    }

    // Метод для расчета цены с учетом возраста
    public function getActualPrice(): float {
        $age = $this->getAge();
        $depreciation = min(0.8, $age * 0.05); // Максимальное обесценивание 80%
        return $this->price * (1 - $depreciation);
    }

    // Переопределение метода вывода информации
    public function getInfo(): string {
        return parent::getInfo() . 
               ", Передач: {$this->gears}, Материал рамы: {$this->frameMaterial}, Вес: {$this->weight} кг";
    }
} ?>