<?php require 'includes/header.php' ?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>
        <h1>Store Page Front</h1>
<<<<<<< HEAD
        <form  method="POST">
=======
        <form action="" method="POST">
>>>>>>> a52e3dce85de24dffd2f3ae98a9e54f1ff7ee8c0
            <label for="product">Choose a product :</label>
            <select name='product' id='product'>

                <?php foreach ($allProducts as $product) {
                    echo "<option value='{$product->getName()}'>{$product->getName()} / Price : {$product->getPrice()}</option>";
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