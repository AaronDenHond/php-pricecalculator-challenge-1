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
        /*

                if (isset($_POST["customer"])) {
                    $customer = $loader2->getCustomerById((int)$_POST["customer"]);

                    $customerName = $customer->getFirstName();
                    $customerLastName = $customer->getLastName();
                    $customerGroup = $customer->getGroupId();
                    $customerFixed = $customer->getFixedDiscount();
                    $customerVariable = $customer->getVariableDiscount();

                    $group = $loader3->getGroupById((int)$customerGroup);
                    $groupFixed = array($group->getFixedDiscount());
                    $groupVariable = array($group->getVariableDiscount());
                    $groupParent = $group->getParentId();

                    while ($groupParent > 0) {
                        $group = $loader3->getGroupById((int)$groupParent);
                        $fix = $group->getFixedDiscount();
                        if (isset($fix)) {
                            array_push($groupFixed, $group->getFixedDiscount());
                        }
                        $var = $group->getVariableDiscount();
                        if (isset($var)) {
                            array_push($groupVariable, $group->getVariableDiscount());
                        }
                        $groupParent = $group->getParentId();
                    }

                    echo "Name:<br>";
                    echo $customerName . " " . $customerLastName;
                    echo '<br><br>';
                    echo "FixedDiscount:<br>";
                    echo $customerFixed;
                    echo '<br><br>';
                    echo "VariableDiscount:<br>";
                    echo $customerVariable;
                    echo '<br><br>';
                    echo "FixedGroupDiscounts: <br>";
                    var_dump($groupFixed);
                    echo '<br><br>';
                    echo "VariableGroupDiscounts: <br>";
                    var_dump($groupVariable);
                    echo '<br>';
                    echo '<br>';

                }


                if(isset($_POST['product'])) {
                    $product = $loader->getProductById((int)$_POST["product"]);
                    $productId = $product->getId();
                    $productName = $product->getName();
                    $productPrice = $product->getPrice();

                    var_dump($product);
                    echo '<br>';
                    echo $productId;
                    echo '<br>';
                    echo $productName;
                    echo '<br>';
                    var_dump($productPrice);
                    echo '<br>';


                }*/
        if (isset($_POST["customer"]) and isset($_POST['product'])) {
            $test = new Calculator((int)$_POST["customer"], (int)$_POST["product"]);
            $test->calculatorFunc();
            echo "<br>";
            echo "<br>";
            echo 'customerid: <br> ' .  $test->getIdCustomer();
            echo "<br>";
            echo 'productid: <br>'. $test->getIdProduct();
            echo "<br>";
            echo 'customerFixed: <br>' . $test->getCustomerFixed();
            echo "<br>";
            echo  'customerVariable: <br>'. $test->getCustomerVariable();
            echo "<br>";
            print_r ($test->getGroupFixed());
            echo  "<br>";
            echo 'sumFixedGroups:<br>'. $test->getSumFixedGroupDisc();
            echo   "<br>";
            echo 'groupVar <br> ';
            print_r($test->getGroupVariable());
            echo "<br>";
            echo 'MaxVarGroups: <br>' . $test->getMaxVarGroupDisc();
            echo "<br>";
            echo 'Price:<br> ' . $test->getPrice2();
            echo "<br>";
            echo "<br>";
            echo'customerVar: <br>' . $test->getCustomerVariable();
            echo "<br>";
            echo 'groupVar <br> ';
            print_r($test->getGroupVariable());
            echo "<br>";  
            echo 'bestVarDisc: <br>'. $test->getBestVarDisc();
            echo "<br>";  
            echo "<br>";
            echo 'FinalPrice:<br> ' . $test->getFinalPrice();
            echo "<br>";
            echo "<br>";
            echo $test->getBestGroupDisc();
            echo "<br>";
            echo "<br>";


        


        }
        require 'View/store.php';
    }
}
