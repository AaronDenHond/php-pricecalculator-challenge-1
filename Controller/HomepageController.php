<?php
declare(strict_types=1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //this is just example code, you can remove the line below
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM customer WHERE id=:id');
        $handle->bindValue(':id', 1);
        $handle->execute();
        $selectedUser = $handle->fetchAll();
        
        $firstname = $selectedUser[0]["firstname"];
        $lastname = $selectedUser[0]["lastname"];

        
        $user = new User($firstname . " " . $lastname);

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}