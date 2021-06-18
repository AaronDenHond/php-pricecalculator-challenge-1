<?php require 'includes/header.php' ?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>
        <h1>Store Page Front</h1>
        <br>
        <form action="" method="POST">
            <label for="product">Choose a product :</label>
            <select name='product' id='product'>

                <?php //This for each is going to make all the option in the selectbox for each product in the DB.
                foreach ($allProducts as $product) {
                    echo "<option value='{$product->getId()}'>{$product->getName()}: €" . ($product->getPrice() / 100) . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="customer">Customer name :</label>
            <select name='customer' id="customer">
                <?php //This for each is going to make all the option in the selectbox for each customer in the DB.
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
        <div class="container">
            <div class="row justify-content-md-center">
                <?php
                if (isset($calculator)) {
                    //displaying the order info
                    echo '<div class="col col-lg-5"><h4>Order:</h4>';
                    echo '<p>Customer: <strong>' . $customerPost->getFirstName() . ' ' . $customerPost->getLastName() . '</strong></p>';
                    echo '<p>Product: <strong>' . $productPost->getName() . '</strong></p></div>';

                    echo "<br>";
                    //displaying the pricing info
                    echo '<div class="col col-lg-5"><h4>Price:</h4>';
                    echo '<p>The final price is: <strong>€' . ($calculator->getFinalPrice()) . '</strong></p>';
                    echo '<p>The original price was: <strong>€' . ($calculator->getPrice2() / 100) . '</strong></p></div></div>';

                    echo "<br>";
                    //displaying the discount info
                    echo '<div class="row justify-content-md-center">';
                    echo '<div class="col col-lg-10"><h4>The customer discounts:</h4>';
                    echo '<p>Fixed customer discount: <strong>€' . ($calculator->getCustomerFixed()) . '</strong></p>';
                    echo '<p>Variable customer discount: <strong>' . $calculator->getCustomerVariable() . '%</strong></p>';
                    echo '<p>Fixed group discount total: <strong>€' . ($calculator->getSumFixedGroupDisc()) . '</strong></p>';
                    echo '<p>Highest variable group discount: <strong>' . $calculator->getBestVarDisc() . '%</strong></p>';
                    echo "<br>";
                    echo '<p>'.$calculator->getBestGroupDisc() . '<p></div></div>';

                    echo "<br>";



                }
                ?>
            </div>
        </div>
    </section>
    <br>
    <p><a href="index.php">Back to homepage</a></p>
<?php require 'includes/footer.php' ?>