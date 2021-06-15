<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>
    <h1>Store Page Front Whatever</h1>
    <?php foreach ($allProducts as $product){
        echo $product->getName() ." ";
    }
    ?>
    <br><br>
    <?php
    foreach ($allCustomers as $customer){
        echo $customer->getFirstName() ." ";
    }
    ?>
    <br><br>
    <?php
    foreach ($allCustomerGroups as $group){
        echo $group->getName() ." ";
    }
    ?>
</section>
<?php require 'includes/footer.php'?>