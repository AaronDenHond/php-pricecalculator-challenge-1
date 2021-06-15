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

        $loader3 = new CustomerGroupLoader();
        $allCustomerGroups = $loader3->getAllCustomerGroups();


        echo '<h4>$_GET</h4>';
        var_dump($_GET);
        echo '<h4>$_POST</h4>';
        var_dump($_POST);
        echo '<br>';
        var_dump($_POST["product"]);
        echo '<br>';
        var_dump($_POST["customer"]);

        require 'View/store.php';
    }
}
