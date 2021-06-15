<?php
declare(strict_types=1);

class StoreController
{


    public function render(array $GET, array $POST)
    {
       $loader = new ProductLoader();
       $loader->getAllProducts();

       $loader2 = new CustomerLoader();
       $loader2->getAllCustomers();

       $loader3 = new CustomerGroupLoader();
       $loader3->getAllCustomerGroups();

        require 'View/store.php';
    }
}
