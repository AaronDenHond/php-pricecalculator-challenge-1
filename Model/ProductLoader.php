<?php


class ProductLoader
{
    //properties
    private array $products;

    //constructor
    public function __construct()
    {
        //send query to DB and puts its all in $selectedProducts
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM product');
        $handle->execute();
        $selectedProducts = $handle->fetchAll();

        //makes a new Product for each row in the table and puts it in an array
        foreach ($selectedProducts as $product) {
            $this->products[] = new Product((int)$product['id'], $product['name'], (int)$product['price']);
            //make products array, make new product and push it to it.
        }
    }

    //getter
    public function getAllProducts(): array
    {
        return $this->products;
    }

    //method to search the array by Id and returns all the properties for product by the given id
    public function getProductById(int $id)
    {
        foreach ($this->products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
    }
}