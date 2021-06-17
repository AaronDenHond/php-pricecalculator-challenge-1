<?php
declare(strict_types=1);

class StoreController
{


    public function render(array $GET, array $POST)
    {
        $loader = new ProductLoader();
        $allProducts = $loader->getAllProducts();

        $loader2 = new CustomerLoader();
        $allCustomers = $loader2->getAllCustomers();

/*        $loader3 = new CustomerGroupLoader();
        $allCustomerGroups = $loader3->getAllCustomerGroups();*/

        if (isset($POST["customer"]) and isset($POST['product'])) {
            $calculator = new Calculator((int)$POST["customer"], (int)$POST["product"]);
            $calculator->calculatorFunc();
        }
        require 'View/store.php';
    }
}
