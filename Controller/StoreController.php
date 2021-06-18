<?php
declare(strict_types=1);

class StoreController
{
    public function render(array $GET, array $POST)
    {
        //loads in all the products in $allProducts
        $loader = new ProductLoader();
        $allProducts = $loader->getAllProducts();

        //loads in all the customers in $allCustomers
        $loader2 = new CustomerLoader();
        $allCustomers = $loader2->getAllCustomers();


        //this if makes sure we dont get errors on first load of the store page
        if (isset($POST["customer"]) and isset($POST['product'])) {
            //makes a new calculation with the parameters customerId and productId, this is taken from the store page.
            $calculator = new Calculator((int)$POST["customer"], (int)$POST["product"]);
            $calculator->calculatorFunc();
            //gets the customer info by id input
            $customerPost = $loader2->getCustomerById((int)$POST["customer"]);
            //gets the product info by id input
            $productPost = $loader->getProductById((int)$POST['product']);

        }
        require 'View/store.php';
    }
}
