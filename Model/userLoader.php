<?php
declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class userLoader {

    public function getCustomers(): array {
        $costumerData = json_decode(file_get_contents('json/customers.json'), true);
        return $costumerData;
    }
}
?>