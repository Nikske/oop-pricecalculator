<?php
declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class productLoader {

    public function getProducts(): array {
        $productData = json_decode(file_get_contents('json/products.json'), true);
        return $productData;
    }
}
?>