<?php



require_once 'Product.php';

class Cart
{
    /** @var Product[]  */
    private array $products = [];

    public function add(Product $product)
    {
        $this->products[] = $product;
    }

    public function remove(string $productName)
    {
        foreach ($this->products as $pIndex => $product) {
            if ($product->getName() === $productName) {
                unset($this->products[$pIndex]);
            }
        }
    }


    public function getTotalCost(): int|float
    {
        $totalCost = 0;

        foreach ($this->products as $product) {
            $totalCost += $product->getCost();
        }

        return $totalCost;
    }

    public function getTotalQuantity(): int|float
    {
        $totalQuantity = 0;

        foreach ($this->products as $product) {
            $totalQuantity += $product->getQuantity();
        }

        return $totalQuantity;
    }

    public function getAvgPrice(): int|float
    {
        return $this->getTotalCost() / $this->getTotalQuantity();
    }
}