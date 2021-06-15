<?php


class CustomerLoader
{
    private array $customers;

    public function __construct()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM customer');
        $handle->execute();
        $selectedCustomers = $handle->fetchAll();

        foreach ($selectedCustomers as $product) {
            $this->customers[] = new Customer((int)$product['id'], $product['firstname'], $product['lastname'], (int)$product['group_id'], (int)$product['fixed_discount'], (int)$product['variable_discount']);
        }

    }

    public function getAllCustomers(): array
    {
        return $this->customers;
    }

}