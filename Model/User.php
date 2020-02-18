<?php
declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class User {

    // Properties
    private $id;
    private $name;
    private $groupId;

    // Methods
    public function __construct(int $id, string $name, int $groupId) {
        $this->name = $name;
        $this->groupId = $groupId;
    }

    public function getId() : int {
        return $this->id;
    }
    public function getName() : string {
        return $this->name;
    }
    public function getGroupId() : int {
        return $this->groupId;
    }
}