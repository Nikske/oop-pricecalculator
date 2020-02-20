<?php
declare(strict_types = 1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);


class HomepageController {
    public function post() {

        if (!isset($_POST['inputCustomers']) && !isset($_POST['inputProducts'])) {
            $_POST['inputCustomers'] =1;
            $_POST['inputProducts'] =1;
        }else{
            $_POST['inputCustomers'];
            $_POST['inputProducts'];
        }
    }
    // Runs if none of the data is loaded yet, ie when there's no session
    public function init() {
        $loader = new Loader;
        $customerData =  $loader->loadCustomers();
        $productData = $loader->loadProducts();
        $groupData = $loader->loadGroups();

        // Push json data into objects
        $customers = [];
        foreach ($customerData as $customer) {
            array_push($customers, new User($customer{'id'}, $customer{'name'}, $customer{'group_id'}));
        }

        $products = [];
        foreach ($productData as $product) {
            array_push($products, new product($product{'id'}, $product{'name'}, $product{'description'}, $product{'price'}));
        }

        foreach ($customers as $customer){
            // Initialising checks
            $nextGroup = $customer->getGroupId();
            $endOfList = false;
            // As long there is a next group, keep going
            while ($endOfList === false){
                foreach ($groupData as $group){
                    // If the costumer's group ID matches the group's ID, add it to that user
                    if ($nextGroup === $group{'id'}){
                        $customer->setGroups($group);
                        if (isset($group{'group_id'})){
                            $nextGroup=$group{'group_id'};
                            break;
                        } else {
                            $endOfList = true;
                            break;
                        }
                    }
                }
            }
        }
        // Storing in sessions
        $_SESSION['customers'] = $customers;
        $_SESSION['products'] = $products;
    }
    public function calcDiscount($POST) {
        $inputGroups = $_SESSION['customers'][$_POST['inputCustomers']]->getNestedGroups();
        $inputPrice = $_SESSION['products'][$_POST['inputProducts']]->getPrice();

        $fixed = [];
        foreach ($inputGroups as $discount) {
            if (isset($discount{'fixed_discount'})) {
                array_push($fixed, $discount{'fixed_discount'});
            }
            return array_sum($fixed);
        }

        $variable = [];
        foreach ($inputPrice as $discount) {
            if (isset($discount{'variable_discount'})) {
                array_push($variable, $discount{'variable_discount'});
            }
            return max($variable);
        }
    }
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {
        if (empty($_SESSION)) {
            $this->init();
        }
        if (!empty($_POST)) {
            $this->calcDiscount($POST);
        }
        $this->post();



        function whatIsHappening() {
            echo '<h2>$_POST</h2>';
            var_dump($_POST);
            echo '<h2>$_SESSION</h2>';
            var_dump($_SESSION);


        }
        // Old but we might need the concept or some of it later so it's still here, gathering dust.
        /* if (isset($_POST['inputCustomers'])) {
            $customerSearchId = $_POST['inputCustomers'];
        } else {
            $customerSearchId = "";
        } */

        //load the view
        require 'View/homepage.php';
    }

}