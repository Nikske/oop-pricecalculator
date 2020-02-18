<?php
declare(strict_types = 1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);


class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {

        // Customers
        $customers =[];
        $customerLoader = new userLoader();
        $customerData = $customerLoader->getCustomers();

        foreach ($customerData as $customer) {
            array_push($customers, new User($customer{'id'}, $customer{'name'}, $customer{'group_id'}));
        }

        $products =[];
        $pLoader = new productLoader();
        $productData = $pLoader ->getProducts();

        foreach ($productData as $product) {
            array_push($products, new product($product{'id'}, $product{'name'}, $product{'description'}, $product{'price'}));
        }

        $groups = [];
        $gLoader = new groupLoader();
        $groupData = $gLoader->getGroups();

        foreach ($groupData as $group) {
            if (!isset($group{'variable_discount'})) {
                $group{'variable_discount'} = 0;
            } elseif (!isset($group{'fixed_discount'})) {
                $group{'fixed_discount'} = 0;
            }
            if (!isset($group{'group_id'})) {
                $group{'group_id'} = 550;
            }
            array_push($groups, new group($group{'id'}, $group{'name'}, $group{'variable_discount'}, $group{'fixed_discount'}, $group{'group_id'}));
        }
        //load the view
        require 'View/homepage.php';
    }
}