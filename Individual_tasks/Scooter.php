<?php
class Scooter extends Product {
    protected bool $isElectric;
    protected int $maxSpeed;
    protected int $batteryLife; // в минутах (для электрических)

    public function __construct(string $name, float $price, string $brand, int $year,
                               bool $isElectric, int $maxSpeed, int $batteryLife = 0) {
        parent::__construct($name, $price, $brand, $year);
        $this->isElectric = $isElectric;
        $this->maxSpeed = $maxSpeed;
        $this->batteryLife = $isElectric ? $batteryLife : 0;
    }

    // Геттеры
    public function isElectric(): bool {
        return $this->isElectric;
    }

    public function getMaxSpeed(): int {
        return $this->maxSpeed;
    }

    public function getBatteryLife(): int {
        return $this->batteryLife;
    }

    // Метод для расчета цены с учетом типа
    public function getActualPrice(): float {
        $age = $this->getAge();
        $depreciation = $this->isElectric 
            ? min(0.9, $age * 0.1)  // Электрические быстрее теряют цену
            : min(0.7, $age * 0.07); // Обычные медленнее
        
        return $this->price * (1 - $depreciation);
    }

    // Метод вывода информации
    public function getInfo(): string {
        $info = parent::getInfo() . 
               ", Тип: " . ($this->isElectric ? "электрический" : "обычный") . 
               ", Макс. скорость: {$this->maxSpeed} км/ч";
        
        if ($this->isElectric) {
            $info .= ", Время работы: {$this->batteryLife} мин";
        }
        
        return $info;
    }
}
?>