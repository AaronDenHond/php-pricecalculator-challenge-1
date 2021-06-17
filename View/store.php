<?php require 'includes/header.php' ?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>
        <h1>Store Page Front</h1>
        <form action="" method="POST">
            <label for="product">Choose a product :</label>
            <select name='product' id='product'>

                <?php foreach ($allProducts as $product) {
                    echo "<option value='{$product->getId()}'>{$product->getName()}: €".($product->getPrice()/100)."</option>";
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
        <br>

            <?php
            if (isset($calculator)) {

                echo '<div><h4>Price:</h4>';
                echo '<p>The final price is: €' . ($calculator->getFinalPrice()) . '</p>';
                echo '<p>The original price was: €' . ($calculator->getPrice2() / 100) . '</p></div>';

                echo "<br>";

                echo '<div><h4>The customer discounts:</h4>';
                echo '<p>Fixed customer discount: €' . ($calculator->getCustomerFixed()) .'</p>';
                echo '<p>Variable customer discount ' . $calculator->getCustomerVariable() . '%</p>';
                echo '<p>Fixed group discount total: €' . ($calculator->getSumFixedGroupDisc()) .'</p>';
                echo '<p>Highest variable group discount ' . $calculator->getBestVarDisc() . '%</p>';
                echo "<br>";
                echo $calculator->getBestGroupDisc().'</div>';
                echo "<br>";
                echo "<br>";


                }
            ?>

    </section>
    <br>
<?php require 'includes/footer.php' ?>