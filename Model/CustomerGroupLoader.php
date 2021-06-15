<?php


class CustomerGroupLoader
{
    private array $customerGroups;

    public function __construct()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM products');
        $handle->execute();
        $selectedCustomerGroups = $handle->fetchAll();

        foreach ($selectedCustomerGroups as $group) {
            $this->customerGroups[] = new CustomerGroup((int)$group['id'], $group['name'], (int)$group['parent_id'], (int)$group['fixed_discount'], (int)$group['variable_discount']);
        }

    }

    public function getAllCustomerGroups(): array
    {
        return $this->customerGroups;
    }

}