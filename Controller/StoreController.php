<?php
declare(strict_types=1);

class StoreController
{


    public function render(array $GET, array $POST)
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM customer');

        $handle->execute();
        $selectedUser = $handle->fetchAll();
       // var_dump($selectedUser);

        foreach ($selectedUser as $customer) {
            $customers[] = new Customer((int)$customer['id'], $customer['firstname'], $customer['lastname'], (int)$customer['group_id'], (int)$customer['fixed_discount'], (int)$customer['variable_discount']);
        }
       var_dump(Customer::getTotal());
        for ($i = 0; $i <= Customer::getTotal(); $i++) {
            echo $i;
        }



        require 'View/store.php';
    }
}
