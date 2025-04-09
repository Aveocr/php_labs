<?php


require_once 'Product.php';


$product1 = new Product();


$product2 = $product1;

var_dump($product1 === $product2); // must be true because has ref to the same object