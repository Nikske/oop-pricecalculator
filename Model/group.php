<?php

declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class group
{

    // Properties
    private $id;
    private $name;
    private $variable_discount;
    private $group_id;


    // Methods
    public function __construct(int $id, string $name, int $variable_discount, int $group_id) {
        $this->id = $id;
        $this->name = $name;
        $this->variable_discount = $variable_discount;
        $this->group_id = $group_id;
    }

    public function getId() : int {
        return $this->id;
    }
    public function getName() : string {
        return $this->name;
    }
    public function getVariable_discount() : int {
        return $this->variable_discount;
    }
    public function getGroup_id() : int {
        return $this->group_id;
    }
}