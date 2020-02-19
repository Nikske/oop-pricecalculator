<?php


class Loader {

    private $customerData;
    private $productData;
    private $groupData;

    public function loadCustomers() : array {
        $this->customerData = json_decode(file_get_contents('json/customers.json'), true);
        return $this->customerData;
    }
    public function loadProducts() : array {
    $this->productData = json_decode(file_get_contents('json/products.json'), true);
    return $this->productData;
    }
    public function loadGroups(): array {
        $this->groupData = json_decode(file_get_contents('json/groups.json'), true);
        return $this->groupData;
    }
}