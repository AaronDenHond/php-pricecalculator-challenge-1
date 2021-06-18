<?php


class CustomerLoader
{
    //properties
    private array $customers;

    //constructor
    public function __construct()
    {
        //send query to DB and puts its all in $selectedCustomers
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM customer');
        $handle->execute();
        $selectedCustomers = $handle->fetchAll();

        //makes a new Customer for each row in the table and puts it in an array
        foreach ($selectedCustomers as $customer) {
            $this->customers[] = new Customer((int)$customer['id'], $customer['firstname'], $customer['lastname'], (int)$customer['group_id'], (int)$customer['fixed_discount'], (int)$customer['variable_discount']);
        }
    }

    //getter
    public function getAllCustomers(): array
    {
        return $this->customers;
    }

    //method to search the array by Id and returns all the properties for customer by the given id
    public function getCustomerById(int $id)
    {
        foreach ($this->customers as $customer) {
            if ($customer->getId() === $id) {
                return $customer;
            }
        }
    }

}