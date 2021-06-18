<?php


class Calculator
{
    //properties
    private int $idCustomer;
    private int $idProduct;
    private int $customerFixed;
    private int $customerVariable;
    private array $groupFixed;
    private int $sumFixedGroupDisc;
    private array $groupVariable;
    private int $maxVarGroupDisc;
    private int $price;
    private string $bestGroupDisc;
    private int $bestVarDisc;
    private float $finalPrice;

    //constructor
    public function __construct(int $idCustomer, int $idProduct)
    {
        $this->idCustomer = $idCustomer;
        $this->idProduct = $idProduct;
    }

    //Method to load in all the discounts the customer gets
    public function getDisc()
    {
        if (isset($this->idCustomer)) {
            //loading in the data from the customers
            $loader2 = new CustomerLoader();
            $allCustomers = $loader2->getAllCustomers();

            //loading in the data from the customer groups
            $loader3 = new CustomerGroupLoader();
            $allCustomerGroups = $loader3->getAllCustomerGroups();

            //search customer by id
            $customer = $loader2->getCustomerById($this->idCustomer);

            //get the customer fixed and variable discount
            $customerGroup = $customer->getGroupId();
            $this->customerFixed = $customer->getFixedDiscount();
            $this->customerVariable = $customer->getVariableDiscount();

            //search group by id
            $group = $loader3->getGroupById((int)$customerGroup);

            //get the fixed and variable group discount
            $this->groupFixed = array($group->getFixedDiscount());
            $this->groupVariable = array($group->getVariableDiscount());
            $groupParent = $group->getParentId();

            //getting all the fixed and variable group discount from all the parent id's
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

    //Method to get the price for the product
    public function getPrice()
    {
        $loader = new ProductLoader();
        $allProducts = $loader->getAllProducts();

        if (isset($this->idProduct)) {
            $product = $loader->getProductById((int)$_POST["product"]);

            $this->price = $product->getPrice();
        }
    }

    //Method for doing the calculation with the Discounts and the Price
    public function calculatorFunc()
    {
        //using the price and discount method
        $this->getDisc();
        $this->getPrice();

        //getting the maximum variable group disc
        $this->maxVarGroupDisc = max($this->groupVariable);
        //getting the sum of all the fixed group disc
        $this->sumFixedGroupDisc = array_sum($this->groupFixed);

        //checking which gives more benefit, fixed of variable disc
        if ($this->sumFixedGroupDisc > $this->price / 100 * ($this->maxVarGroupDisc / 100)) {
            $this->bestGroupDisc = "The fixed group discount has given you the most discount.";
        } else {
            $this->bestGroupDisc = "The variable group discount has given you the most discount.";
        }

        //checking which is better the variable customer discount or the highest variable group disc
        if ($this->maxVarGroupDisc > $this->customerVariable) {

            $this->bestVarDisc = $this->maxVarGroupDisc;
        } else {
            $this->bestVarDisc = $this->customerVariable;
        }

        //finale price calculation
        $this->finalPrice = (($this->price - ($this->customerFixed * 100) - ($this->sumFixedGroupDisc * 100)) * (1 - $this->bestVarDisc / 100)) / 100;
        $this->finalPrice = round($this->finalPrice, 2);
        if ($this->finalPrice < 0) {
            $this->finalPrice = 0;
        }
    }

    //getters
    public function getIdCustomer(): int
    {
        return $this->idCustomer;
    }

    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    public function getCustomerFixed(): int
    {
        return $this->customerFixed;
    }

    public function getCustomerVariable(): int
    {
        return $this->customerVariable;
    }

    public function getGroupFixed(): array
    {
        return $this->groupFixed;
    }

    public function getSumFixedGroupDisc(): int
    {
        return $this->sumFixedGroupDisc;
    }

    public function getGroupVariable(): array
    {
        return $this->groupVariable;
    }

    public function getmaxVarGroupDisc(): int
    {
        return $this->maxVarGroupDisc;
    }

    public function getPrice2(): int
    {
        return $this->price;
    }

    public function getBestGroupDisc(): string
    {
        return $this->bestGroupDisc;
    }

    public function getBestVarDisc(): int
    {
        return $this->bestVarDisc;
    }

    public function getFinalPrice(): float
    {
        return $this->finalPrice;
    }

}
