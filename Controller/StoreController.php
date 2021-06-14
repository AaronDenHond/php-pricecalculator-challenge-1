<?php
declare(strict_types=1);

class StoreController
{
    public function render(array $GET, array $POST){



        require 'View/store.php';
    }
}