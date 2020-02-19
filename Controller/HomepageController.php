<?php
declare(strict_types = 1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);


class HomepageController {
    public function init() {
        $loader = new Loader;
        $customerData =  $loader->loadCustomers();
        $productData = $loader->loadProducts();
        $groupData = $loader->loadGroups();

        $customers = [];
        foreach ($customerData as $customer) {
            array_push($customers, new User($customer{'id'}, $customer{'name'}, $customer{'group_id'}));
        }
        $_SESSION['customers'] = $customers;

        $products = [];
        foreach ($productData as $product) {
            array_push($products, new product($product{'id'}, $product{'name'}, $product{'description'}, $product{'price'}));
        }
        $_SESSION['products'] = $products;

        $groups = [];
        foreach ($groupData as $group) {
            array_push($groups, new Group($group{'id'}, $group{'name'}, $group{'fixed_discount'}, $group{'variable_discount'}, $group{'group_id'}));
        }


    }
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {
        if (empty($_SESSION)) {
            $this->init();
        }

        function whatIsHappening() {
            echo '<h2>$_POST</h2>';
            var_dump($_POST);
            echo '<h2>$_SESSION</h2>';
            var_dump($_SESSION);
        }
        /*

        if (isset($_POST['inputCustomers'])) {
            $customerSearchId = $_POST['inputCustomers'];
        } else {
            $customerSearchId = "";
        }

        $customerGroups = [];

        while ($customerSearchId !== null) {
            foreach($groupData as $group) {
                if ($group{'id'} == $customerSearchId) {
                    array_push($customerGroups, $group);
                    if (isset($group{'group_id'})) {
                        $customerSearchId = $group{'group_id'};
                    } else {
                        $customerSearchId = null;
                    }
                }
            }
        }
        var_dump($customerGroups);
        $varDiscounts = [];
        $fixDiscounts = [];
        foreach ($customerGroups as $group) {
            if (!isset($group{'variable_discount'})) {
                $group{'variable_discount'} = 0;
            } elseif (!isset($group{'fixed_discount'})) {
                $group{'fixed_discount'} = 0;
            }
            array_push($varDiscounts, $group{'variable_discount'});
            array_push($fixDiscounts, $group{'fixed_discount'});
        }
        $varDiscounts = max($varDiscounts);
        $fixDiscounts = array_sum($fixDiscounts); */

        //load the view
        require 'View/homepage.php';
    }

}