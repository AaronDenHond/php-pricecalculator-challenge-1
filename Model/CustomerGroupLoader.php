<?php


class CustomerGroupLoader
{
    //properties
    private array $customerGroups;

    //constructor
    public function __construct()
    {
        //send query to DB and puts its all in $selectedCustomerGroups
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM customer_group');
        $handle->execute();
        $selectedCustomerGroups = $handle->fetchAll();

        //makes a new CustomerGroup for each row in the table and puts it in an array
        foreach ($selectedCustomerGroups as $group) {
            $this->customerGroups[] = new CustomerGroup((int)$group['id'], $group['name'], (int)$group['parent_id'], (int)$group['fixed_discount'], (int)$group['variable_discount']);
        }
    }

    //getter
    public function getAllCustomerGroups(): array
    {
        return $this->customerGroups;
    }

    //method to search the array by Id and returns all the properties for customer group by the given id
    public function getGroupById(int $id)
    {
        foreach ($this->customerGroups as $group) {
            if ($group->getId() === $id) {
                return $group;
            }
        }
    }
}