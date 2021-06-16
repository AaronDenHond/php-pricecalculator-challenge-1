<?php


class ProductLoader
{
    private array $products;

    public function __construct()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM product');
        $handle->execute();
        $selectedProducts = $handle->fetchAll();

        foreach ($selectedProducts as $product) {
            $this->products[] = new Product((int)$product['id'], $product['name'], (int)$product['price']);
        }

    }

    public function getAllProducts(): array
    {
        return $this->products;
    }
    public function getProductById(int $id) {
        foreach($this->products as $product) {
        if($product->getId() === $id) {
            return $product;
        }
    }
}
}