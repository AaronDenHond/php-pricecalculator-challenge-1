<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>
    <h1>Store Page Front Whatever</h1>
    <label for="products">Select product:</label>
    <select name="products" id="products">
    <?php foreach ($allProducts as $product){
        echo "<option>" . $product->getName() . "</option>";
    }
    ?>
    </select>
    <br><br>
    <label for="customers">Select customer:</label>
    <select name="customers" id="customers">
        <?php foreach ($allCustomers as $customer){
            echo "<option>" . $customer->getFirstName() ." ". $customer->getLastName() . "</option>";
        }
        ?>
    </select>


    <!--<br><br>
    <?php
/*    foreach ($allCustomers as $customer){
        echo $customer->getFirstName() ." ";
    }
    */?>
    <br><br>
    --><?php
/*    foreach ($allCustomerGroups as $group){
        echo $group->getName() ." ";
    }
    */?>
</section>
<?php require 'includes/footer.php'?>