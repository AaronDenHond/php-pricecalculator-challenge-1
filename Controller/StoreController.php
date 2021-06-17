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
