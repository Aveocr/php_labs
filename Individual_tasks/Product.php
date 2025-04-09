<?php
class Product {
    protected string $name;
    protected float $price;
    protected string $brand;
    protected int $year;

    public function __construct(string $name, float $price, string $brand, int $year) {
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
        $this->year = $year;
    }

    // Геттеры
    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getBrand(): string {
        return $this->brand;
    }

    public function getYear(): int {
        return $this->year;
    }

    // Метод для расчета возраста товара
    public function getAge(): int {
        return date('Y') - $this->year;
    }

    // Метод для вывода информации
    public function getInfo(): string {
        return "Товар: {$this->name}, Бренд: {$this->brand}, Цена: {$this->price} руб., Год выпуска: {$this->year}";
    }
}
?>