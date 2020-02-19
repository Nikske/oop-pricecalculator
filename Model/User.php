<?php
declare(strict_types=1);


class User {

    // Properties
    private $id;
    private $name;
    private $groupId;
    private $nestedGroups;

    // Methods
    public function __construct(int $id, string $name, int $groupId) {
        $this->id = $id;
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
    public function setGroups() {

    }

    /*public getDiscount(prijs)

    public function getMostvalue(prijs)
    {
        return group
    }*/
}