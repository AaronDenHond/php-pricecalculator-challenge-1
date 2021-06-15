<?php require 'includes/header.php' ?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>
        <h1>Store Page Front</h1>
        <form action="" method="GET">
            <label for="product">Choose a product :</label>
            <select name='product' id='product'>

                <?php foreach ($allProducts as $product) {
                    echo "<option>{$product->getName()} / Price : {$product->getPrice()}</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="customer">Customer name :</label>
            <select name='customer' id="customer">
                <?php
                foreach ($allCustomers as $customer) {
                    echo "<option>{$customer->getFirstName()} {$customer->getLastName()}</option>";
                }
                ?>
            </select>
            <br><br>
            <?php
            foreach ($allCustomerGroups as $group) {
            }
            ?>
            <button type="submit" name="submit">Submit choice</button>
        </form>
    </section>
    <br>
<?php require 'includes/footer.php' ?>