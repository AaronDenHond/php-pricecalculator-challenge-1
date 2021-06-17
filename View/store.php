<?php require 'includes/header.php' ?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>
        <h1>Store Page Front</h1>
        <form action="" method="POST">
            <label for="product">Choose a product :</label>
            <select name='product' id='product'>

                <?php foreach ($allProducts as $product) {
                    echo "<option value='{$product->getId()}'>{$product->getName()} / Price : {$product->getPrice()}</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="customer">Customer name :</label>
            <select name='customer' id="customer">
                <?php
                foreach ($allCustomers as $customer) {
                    echo "<option value='{$customer->getId()}'>{$customer->getFirstName()} {$customer->getLastName()}</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <button type="submit" name="submit">Submit choice</button>
        </form>
<?php
if (isset($calculator)) {


    echo 'customerFixed: <br>' . $calculator->getCustomerFixed();
    echo "<br>";
    echo  'customerVariable: <br>'. $calculator->getCustomerVariable();
    echo  "<br>";
    echo 'sumFixedGroups:<br>'. $calculator->getSumFixedGroupDisc();
    echo   "<br>";
    echo 'groupVar <br> ';

    echo "<br>";
    echo 'MaxVarGroups: <br>' . $calculator->getMaxVarGroupDisc();
    echo "<br>";
    echo 'Price:<br> ' . $calculator->getPrice2();
    echo "<br>";
    echo "<br>";
    echo'customerVar: <br>' . $calculator->getCustomerVariable();
    echo "<br>";
    echo 'groupVar <br> ';

    echo "<br>";
    echo 'bestVarDisc: <br>'. $calculator->getBestVarDisc();
    echo "<br>";
    echo "<br>";
    echo 'FinalPrice:<br> ' . $calculator->getFinalPrice();
    echo "<br>";
    echo "<br>";
    echo $calculator->getBestGroupDisc();
    echo "<br>";
    echo "<br>";





}
?>
       
    </section>
    <br>
<?php require 'includes/footer.php' ?>