<?php


class Product
{
    private string $name;
    private int $price;
    private int $quantity;


    public function __construct(string $name, int $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getCost(): int|float
    {
        return $this->price * $this->quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}