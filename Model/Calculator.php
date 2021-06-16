<?php


class Calculator
{
    private int $idCustomer;
    private int $idProduct;
    private int $customerFixed;
    private int $customerVariable;
    private array $groupFixed;
    private int $sumFixedGroupDisc;
    private array $groupVariable;
    private int $maxGroupDisc;
    private int $price;
    private string $bestGroupDisc;


    public function __construct(int $idCustomer, int $idProduct)
    {
        $this->idCustomer = $idCustomer;
        $this->idProduct = $idProduct;
    }

    public function getDisc()
    {
        if (isset($this->idCustomer)) {
            $loader2 = new CustomerLoader();
            $allCustomers = $loader2->getAllCustomers();

            $loader3 = new CustomerGroupLoader();
            $allCustomerGroups = $loader3->getAllCustomerGroups();

            $customer = $loader2->getCustomerById($this->idCustomer);

            $customerGroup = $customer->getGroupId();
            $this->customerFixed = $customer->getFixedDiscount();
            $this->customerVariable = $customer->getVariableDiscount();

            $group = $loader3->getGroupById((int)$customerGroup);

            $this->groupFixed = array($group->getFixedDiscount());
            $this->groupVariable = array($group->getVariableDiscount());
            $groupParent = $group->getParentId();

            while ($groupParent > 0) {
                $group = $loader3->getGroupById((int)$groupParent);
                $fix = $group->getFixedDiscount();
                if (isset($fix)) {
                    array_push($this->groupFixed, $group->getFixedDiscount());
                }
                $var = $group->getVariableDiscount();
                if (isset($var)) {
                    array_push($this->groupVariable, $group->getVariableDiscount());
                }
                $groupParent = $group->getParentId();
            }

        }
    }

    public function getPrice()
    {
        $loader = new ProductLoader();
        $allProducts = $loader->getAllProducts();

        if (isset($this->idProduct)) {
            $product = $loader->getProductById((int)$_POST["product"]);

            $this->price = $product->getPrice();
        }
    }

    public function calculatorFunc()
    {
        $this->getDisc();
        $this->getPrice();

        $this->maxGroupDisc = max($this->groupVariable);
        $this->sumFixedGroupDisc = array_sum($this->groupFixed);

        if ($this->sumFixedGroupDisc > $this->price * ($this->maxGroupDisc / 100)) {
            $this->bestGroupDisc = "The fixed group discount has given you the most discount";
        } else {
            $this->bestGroupDisc = "The variable group discount has given you the most discount";
        }


    }

    /**
     * @return int
     */
    public function getIdCustomer(): int
    {
        return $this->idCustomer;
    }

    /**
     * @return int
     */
    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    /**
     * @return int
     */
    public function getCustomerFixed(): int
    {
        return $this->customerFixed;
    }

    /**
     * @return int
     */
    public function getCustomerVariable(): int
    {
        return $this->customerVariable;
    }

    /**
     * @return array
     */
    public function getGroupFixed(): array
    {
        return $this->groupFixed;
    }

    /**
     * @return int
     */
    public function getSumFixedGroupDisc(): int
    {
        return $this->sumFixedGroupDisc;
    }

    /**
     * @return array
     */
    public function getGroupVariable(): array
    {
        return $this->groupVariable;
    }

    /**
     * @return int
     */
    public function getMaxGroupDisc(): int
    {
        return $this->maxGroupDisc;
    }
    public function getPrice2(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getBestGroupDisc(): string
    {
        return $this->bestGroupDisc;
    }

}