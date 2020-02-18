<?php
declare(strict_types = 1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);


class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {

        $customers =[];

        $customerLoader = new userLoader();
        $customerData = $customerLoader->getCustomers();

        foreach ($customerData as $customer) {
            array_push($customers, new User($customer{'id'}, $customer{'name'}, $customer{'group_id'}));
        }
        var_dump($customers);


        //load the view
        require 'View/homepage.php';
    }
}